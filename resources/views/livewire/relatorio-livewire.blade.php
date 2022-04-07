<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Relatório
    </h2>
</x-slot>

<div class="row align-items-center">
    <div class="col-md-4" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <label class="form-label"><strong>Escolha a Empresa</strong></label>
                <select class="form-select" aria-label="Default select example" wire:model="empresaId">
                    <option selected>selecione...</option>
                    @foreach ($empresas as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if($empresaId != '')
    <div class="col-md-4" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <label class="form-label">
                    <strong>Escolha a Associada</strong>
                </label>
                <select class="form-select" aria-label="Default select example" wire:model="associadaId">
                    <option selected>selecione...</option>
                    @foreach ($associadas as $associada)
                    <option value="{{$associada->id}}">{{$associada->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @endif

    @if($associadaId != '')
    <div class="col-md-4" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <label class="form-label">
                    <strong>Escolha a competência</strong>
                </label>
                <input type="month" class="form-control" wire:model="competencia">
            </div>
        </div>
    </div>
    @endif

    @if(count($conciliacoesImportadasSaida) > 0)
    <div class="col-md-12" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Títulos de saída sem retorno - {{count($conciliacoesImportadasSaida)}}</h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table text-start">
                            <thead>
                                <tr>
                                    <th scope="col">Filial</th>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Conta</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Competencia</th>
                                    <th scope="col">Estab.</th>
                                    <th scope="col">Cod. Desc.</th>
                                    <th scope="col">Prazo</th>
                                    <th scope="col">Opr.</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-12" style="height:280px; overflow:auto;">
                        <table class="table text-start">
                            <tbody>
                                @foreach ($conciliacoesImportadasSaida as $conciliacoesSaida)
                                <tr>
                                    <th scope="col">{{$conciliacoesSaida->servidor->filial->code}}</th>
                                    <th scope="col">{{$conciliacoesSaida->servidor->registration}}</th>
                                    <th scope="col">{{$conciliacoesSaida->servidor->name}}</th>
                                    <th scope="col">{{$conciliacoesSaida->servidor->CPF}}</th>
                                    <th scope="col">{{$conciliacoesSaida->servidor->account}}</th>
                                    <th scope="col">{{$conciliacoesSaida->value}}</th>
                                    <th scope="col">{{$conciliacoesSaida->competencia}}</th>
                                    <th scope="col">{{$conciliacoesSaida->estabelecimento}}</th>
                                    <th scope="col">{{$conciliacoesSaida->cod_desconto}}</th>
                                    <th scope="col">{{$conciliacoesSaida->prazo_total}}</th>
                                    <th scope="col">{{$conciliacoesSaida->operacao}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if(count($conciliacoesImportadasRetorno) > 0)
    <div class="col-md-12" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Títulos de retorno sem saída - {{count($conciliacoesImportadasRetorno)}}</h4>
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                    <div class="col-md-12" style="height:280px; overflow:auto;">
                        <table class="table text-start">
                            <thead>
                                <tr>
                                    <th scope="col">Filial</th>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Conta</th>
                                    <th scope="col">Desc. Prev</th>
                                    <th scope="col">Desc. Real.</th>
                                    <th scope="col">Competencia</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($conciliacoesImportadasRetorno as $conciliacoesRetorno)
                            <tr>
                                <th scope="col">{{$conciliacoesRetorno->servidor->filial->code}}</th>
                                <th scope="col">{{$conciliacoesRetorno->servidor->registration}}</th>
                                <th scope="col">{{$conciliacoesRetorno->servidor->name}}</th>
                                <th scope="col">{{$conciliacoesRetorno->servidor->CPF}}</th>
                                <th scope="col">{{$conciliacoesRetorno->servidor->account}}</th>
                                <th scope="col">{{$conciliacoesRetorno->desconto_previsto}}</th>
                                <th scope="col">{{$conciliacoesRetorno->desconto_realizado}}</th>
                                <th scope="col">{{$conciliacoesRetorno->competencia}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(count($conciliacao) > 0)
    <div class="col-md-12" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Títulos conciliados - {{count($conciliacao)}}</h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table text-start">
                            <thead>
                                <tr>
                                    <th scope="col">Filial</th>
                                    <th scope="col">Matricula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Conta</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-12" style="height:280px; overflow:auto;">
                        <table class="table text-start">
                            <tbody>
                                @foreach ($conciliacao as $conciliacao)
                                <tr>
                                    <th scope="col">{{$conciliacao->tituloSaida->servidor->filial->code}}</th>
                                    <th scope="col">{{$conciliacao->tituloSaida->servidor->registration}}</th>
                                    <th scope="col">{{$conciliacao->tituloSaida->servidor->name}}</th>
                                    <th scope="col">{{$conciliacao->tituloSaida->servidor->CPF}}</th>
                                    <th scope="col">{{$conciliacao->tituloSaida->servidor->account}}</th>
                                    <th scope="col">{{$conciliacao->saldo}}</th>
                                    <th scope="col">{{$conciliacao->motivo}}</th>
                                    <th scope="col">{{$conciliacao->status}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--wire:loading-->
    <div class="load" wire:loading>
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-light m-5" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>