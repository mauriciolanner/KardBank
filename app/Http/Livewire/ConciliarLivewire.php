<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Associated;
use App\Models\Conciliation;
use App\Models\TitleOut;
use App\Models\TitleReturn;
use Livewire\WithFileUploads;

class ConciliarLivewire extends Component
{
    use WithFileUploads;

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
        }

        return view(
            'livewire.conciliar-livewire',
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

    public function conciliar()
    {
        foreach ($this->conciliacoesImportadasRetorno as $itensRetorno) {
            $itemSaida = TitleOut::where('competencia', $this->competencia)->where('dependant_id', $itensRetorno->dependant_id)->where('status_con', 0)->first();

            if ($itemSaida != null) {
                $valorConcilia = $itensRetorno->desconto_realizado - $itemSaida->value;
                $status = '';

                if ($valorConcilia == 0.0)
                    $status = 1; //conciliado
                else if ($valorConcilia < 0.0)
                    $status = 2; //devendo
                else if ($valorConcilia > 0.0)
                    $status = 3; //com saldo

                $verificaSeConciliou = Conciliation::where('competencia', $this->competencia)
                    ->where('title_return_id', $itensRetorno->id)
                    ->where('title_out_id', $itemSaida->id)
                    ->first();

                if ($verificaSeConciliou == null) {
                    Conciliation::create([
                        'saldo' => $valorConcilia,
                        'motivo' => '',
                        'competencia' => $this->competencia,
                        'status' => $status,
                        'title_return_id' => $itensRetorno->id,
                        'title_out_id' => $itemSaida->id,
                        'associada' => $this->associadaId
                    ]);

                    $alteraStatusSaida = TitleOut::find($itemSaida->id);
                    $alteraStatusSaida->status_con = 1;
                    $alteraStatusSaida->save();

                    $alteraStatusSaida = TitleReturn::find($itensRetorno->id);
                    $alteraStatusSaida->status_con = 1;
                    $alteraStatusSaida->save();
                }
            }
        }

        $this->conciliacao = Conciliation::where('competencia', $this->competencia)->where('associada', $this->associadaId)->get();
    }
}
