<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Associated;
use App\Models\Subsidiary;
use App\Models\Dependant;
use App\Models\TitleOut;
use App\Models\TitleReturn;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ImportarLivewire extends Component
{
    use WithFileUploads;

    public $empresaId = '';
    public $associadaId = '';
    public $arquivoSaida;
    public $arquivoRetorno;
    public $consiliacoesImportadasSaida = [];
    public $consiliacoesImportadasRetorno = [];

    public function render()
    {
        return view(
            'livewire.importar-livewire',
            [
                'empresas' => Company::get(),
                'empresaId' => $this->empresaId,
                'associadas' => Associated::where('company_id', $this->empresaId)->get(),
                'consiliacoesImportadasSaida' => $this->consiliacoesImportadasSaida,
                'consiliacoesImportadasRetorno' => $this->consiliacoesImportadasRetorno
            ]
        );
    }

    public function uploadOut()
    {
        $this->validate([
            'arquivoSaida' => 'required|file',
        ]);

        //upload do arquivo
        $this->arquivoSaida->storeAs('tempFiles', 'TEMP_arquivoSaida.txt');
        $file = fopen(Storage::path('tempFiles/TEMP_arquivoSaida.txt'), 'r');
        $itens = [];

        while (!feof($file)) {
            $linha = fgets($file);
            array_push($itens, [
                'matricula' => trim(substr($linha, 0, 10)),
                'CPF' => trim(substr($linha, 10, 11)),
                'nome' => trim(substr($linha, 21, 50)),
                'estabelecimento' => trim(substr($linha, 71, 3)),
                'orgao' => trim(substr($linha, 74, 3)),
                'desconto' => trim(substr($linha, 78, 4)),
                'parcela' => trim(substr($linha, 82, 10)),
                'prazo_total' => trim(substr($linha, 92, 3)),
                'competencia' => trim(substr($linha, 95, 6)),
                'operacao' => trim(substr($linha, 101, 1))
            ]);
        }

        foreach ($itens as $item) {
            //recupera a copetencia
            $mesCompetencia = $item['competencia'][0] . $item['competencia'][1];
            $anoCompetencia = $item['competencia'][2] . $item['competencia'][3] . $item['competencia'][4] . $item['competencia'][5];
            $competenciaFinal = $anoCompetencia . '-' . $mesCompetencia;

            //busca o orgão
            $findOrgao = Subsidiary::where('code', $item['orgao'])->first();
            if ($findOrgao == null) {
                $findOrgao = Subsidiary::create([
                    'code' => $item['orgao'],
                    'name' => $item['orgao'] . ' Sem cadastro completo',
                    'associated_id' => $this->associadaId
                ]);
            }

            //busca o servidor
            $findServidor = Dependant::where('registration', $item['matricula'])->first();
            if ($findServidor == null) {
                $findServidor = Dependant::create([
                    'registration' => $item['matricula'],
                    'account' => 'sem conta cadastrada',
                    'name' => $item['nome'],
                    'CPF' => $item['CPF'],
                    'subsidiary_id' => $findOrgao->id
                ]);
            }

            //Verifica se ja não foi cadastrado
            $tituloSaida = TitleOut::where('competencia', $competenciaFinal)->where('dependant_id', $findServidor->id)->first();

            if ($tituloSaida == null) {
                $tituloSaida = TitleOut::create([
                    'value' => $item['parcela'],
                    'estabelecimento' => $item['estabelecimento'],
                    'orgao' => $item['orgao'],
                    'cod_desconto' => $item['desconto'],
                    'prazo_total' => $item['prazo_total'],
                    'competencia' => $competenciaFinal,
                    'associada' => $this->associadaId,
                    'operacao' => $item['operacao'],
                    'dependant_id' => $findServidor->id
                ]);
            }

            array_push($this->consiliacoesImportadasSaida, $item);
        }
    }

    public function uploadReturn()
    {
        $this->validate([
            'arquivoRetorno' => 'required|file',
        ]);

        //upload do arquivo
        $this->arquivoRetorno->storeAs('tempFiles', 'TEMP_arquivoRetorno.txt');
        $file = fopen(Storage::path('tempFiles/TEMP_arquivoRetorno.txt'), 'r');
        $itens = [];

        while (!feof($file)) {
            $linha = fgets($file);
            array_push($itens, [
                'matricula' => trim(substr($linha, 0, 10)),
                'CPF' => trim(substr($linha, 10, 11)),
                'nome' => trim(substr($linha, 21, 50)),
                'estabelecimento' => trim(substr($linha, 71, 3)),
                'orgao' => trim(substr($linha, 74, 3)),
                'desconto' => trim(substr($linha, 78, 4)),
                'parcela' => trim(substr($linha, 82, 10)),
                'parcela_realizada' => trim(substr($linha, 92, 10)),
                'perioro' => trim(substr($linha, 102, 8)),
                'status' => trim(substr($linha, 150, 1))
            ]);
        }

        foreach ($itens as $item) {
            //recupera a copetencia
            $diaCompetencia = $item['perioro'][0] . $item['perioro'][1];
            $mesCompetencia = $item['perioro'][2] . $item['perioro'][3];
            $anoCompetencia = $item['perioro'][4] . $item['perioro'][5] . $item['perioro'][6] . $item['perioro'][7];
            $competenciaFinal = $anoCompetencia . '-' . $mesCompetencia;

            //busca o orgão
            $findOrgao = Subsidiary::where('code', $item['orgao'])->first();
            if ($findOrgao == null) {
                $findOrgao = Subsidiary::create([
                    'code' => $item['orgao'],
                    'name' => $item['orgao'] . ' Sem cadastro completo',
                    'associated_id' => $this->associadaId
                ]);
            }

            //busca o servidor
            $findServidor = Dependant::where('registration', $item['matricula'])->first();
            if ($findServidor == null) {
                $findServidor = Dependant::create([
                    'registration' => $item['matricula'],
                    'account' => 'sem conta cadastrada',
                    'name' => $item['nome'],
                    'CPF' => $item['CPF'],
                    'subsidiary_id' => $findOrgao->id
                ]);
            }

            //Verifica se ja não foi cadastrado
            $tituloSaida = TitleReturn::where('competencia', $competenciaFinal)->where('dependant_id', $findServidor->id)->first();

            if ($tituloSaida == null) {
                $tituloSaida = TitleReturn::create([
                    'desconto_previsto' => $item['parcela'],
                    'desconto_realizado' => $item['parcela_realizada'],
                    'estabelecimento' => $item['estabelecimento'],
                    'orgao' => $item['orgao'],
                    'cod_desconto' => $item['desconto'],
                    'associada' => $this->associadaId,
                    'periodo' => $anoCompetencia . '-' . $mesCompetencia . '-' . $diaCompetencia,
                    'competencia' => $competenciaFinal,
                    'dependant_id' => $findServidor->id
                ]);
            }
            array_push($this->consiliacoesImportadasRetorno, $item);
        }
    }
}
