<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Importar dados
    </h2>
</x-slot>

<div class="row align-items-center">
    <div class="col-md-12">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <label class="form-label"><strong>Escolha o contrato</strong></label>
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
                <div class="row">
                    <label for="formFile" class="form-label">
                        <strong>Arquivo de saída</strong>
                    </label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" wire:model="arquivoSaida">
                        @error('arquivoSaida') {{ $message }} @enderror
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-options" wire:click="uploadOut" style="width: 100%" type="button">
                            <div wire:loading wire:target="uploadOut">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($consiliacoesImportadasSaida) > 0)
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check2-circle"></i> Importação concluida.
                    </div>
                    <!--ul class="list-group list-group-flush text-left">
                    @foreach ($consiliacoesImportadasSaida as $item)
                    <li class="list-group-item text-left">
                        {{$item['orgao']}} - {{$item['nome']}} - {{$item['parcela']}} - {{$item['competencia']}}
                    </li>
                    @endforeach
                </ul-->
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12" style="margin-top: 15px">
        <div class="card shadow bg-light text-center">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    <label class="form-label">
                        <strong>Arquivo de retorno</strong>
                    </label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" wire:model="arquivoRetorno">
                        @error('arquivoRetorno') {{ $message }} @enderror
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-options" wire:click="uploadReturn" style="width: 100%" type="button">
                            <div wire:loading wire:target="uploadReturn">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($consiliacoesImportadasRetorno) > 0)
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check2-circle"></i> Importação concluida.
                    </div>
                    @endif
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