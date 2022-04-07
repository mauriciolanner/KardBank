<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Associated;
use App\Models\Conciliation;
use App\Models\TitleOut;
use App\Models\TitleReturn;

class RelatorioLivewire extends Component
{
    public $empresaId = '';
    public $associadaId = '';
    public $arquivoSaida;
    public $competencia = '';
    public $arquivoRetorno;
    public $conciliacoesImportadasSaida = [];
    public $conciliacoesImportadasRetorno = [];
    public $conciliacao = [];

    public function render()
    {
        if ($this->competencia != '') {
            $this->conciliacoesImportadasSaida = TitleOut::where('competencia', $this->competencia)->where('associada', $this->associadaId)->where('status_con', 0)->get();
            $this->conciliacoesImportadasRetorno = TitleReturn::where('competencia', $this->competencia)->where('associada', $this->associadaId)->where('status_con', 0)->get();
            $this->conciliacao = Conciliation::where('competencia', $this->competencia)->where('associada', $this->associadaId)->get();
        }

        return view(
            'livewire.relatorio-livewire',
            [
                'empresas' => Company::get(),
                'empresaId' => $this->empresaId,
                'associadas' => Associated::where('company_id', $this->empresaId)->get(),
                'conciliacoesImportadasSaida' => $this->conciliacoesImportadasSaida,
                'conciliacoesImportadasRetorno' => $this->conciliacoesImportadasRetorno,
                'conciliacao' => $this->conciliacao
            ]
        );
    }
}
