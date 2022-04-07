<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Conciliar
    </h2>
</x-slot>

<div class="row align-items-center">
    <div class="col-md-12">
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
    <div class="col-md-12" style="margin-top: 15px">
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
    <div class="col-md-12" style="margin-top: 15px">
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
    <div class="col-md-6" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                Existem {{count($conciliacoesImportadasSaida)}} títulos de saída
            </div>
        </div>
    </div>
    @endif

    @if(count($conciliacoesImportadasRetorno) > 0)
    <div class="col-md-6" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                Existem {{count($conciliacoesImportadasRetorno)}} títulos de retorno
            </div>
        </div>
    </div>
    @endif

    <div class="col-md-12" style="margin-top: 15px">
        @if(count($conciliacoesImportadasRetorno) > 0 && count($conciliacoesImportadasSaida))
        <button class="btn btn-options shadow" wire:click="conciliar" style="width: 100%">conciliar agora</button>
        @endif
    </div>

    @if(count($conciliacao) > 0)
    <div class="col-md-12" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <h4>Títulos conciliados</h4>

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