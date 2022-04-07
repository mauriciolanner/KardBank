<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Empresas
    </h2>
</x-slot>

<div class="col-md-12 card shadow bg-white p-3">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="col-md-10">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="buscar" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-principal" style="width: 100%" wire:click="newCompany">Nova empresa </button>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col" class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company as $comp)
                    <tr>
                        <th scope="row">{{$comp->code}}</th>
                        <td>{{$comp->name}}</td>
                        <td>{{$comp->cnpj}}</td>
                        <td class="text-end">
                            <a href="/associadas/{{$comp->id}}" class="btn btn-options">
                                Selecionar <i class="bi bi-check-all"></i>
                            </a>
                            <button class="btn btn-editar"> <i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger"> <i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$company->links('vendor.livewire.bootstrap')}}
            </div>
        </div>
    </div>
    <!--wire:loading-->
    <div class="load" wire:loading>
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-light m-5" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>