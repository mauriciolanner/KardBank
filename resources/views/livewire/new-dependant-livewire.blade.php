<div class="col-md-12 card shadow bg-white p-3">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-principal" wire:click="newDependant">Cancelar</button>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="contract_id" class="form-label">Contrato</label>
                    <input type="text" class="form-control @error('contract_id')  is-invalid @enderror"
                        name="contract_id" value="{{$subsidiary->associada->contrato->name}}" aria-describedby="idHelp"
                        readonly>
                    @error('contract_id') <div id="contract_idHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="associada_id" class="form-label">Associada</label>
                    <input type="text" class="form-control @error('associada_id')  is-invalid @enderror"
                        name="associada_id" value="{{$subsidiary->associada->name}}" aria-describedby="idHelp" readonly>
                    @error('associada_id') <div id="associada_idHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="filial_id" class="form-label">Filial</label>
                    <input type="text" class="form-control @error('filial_id')  is-invalid @enderror" name="filial_id"
                        value="{{$subsidiary->name}}" aria-describedby="idHelp" readonly>
                    @error('filial_id') <div id="filial_idHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="registration" class="form-label">Matricula</label>
                    <input type="text" class="form-control @error('registration')  is-invalid @enderror"
                        name="registration" wire:model="registration" aria-describedby="idHelp">
                    @error('registration') <div id="registrationHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name"
                        wire:model="name" aria-describedby="namedHelp">
                    @error('name') <div id="nameHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('CPF')  is-invalid @enderror" name="CPF"
                        wire:model="CPF" aria-describedby="CPFdHelp">
                    @error('CPF') <div id="CPFHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="account" class="form-label">Conta</label>
                    <input type="text" class="form-control @error('account')  is-invalid @enderror" name="account"
                        wire:model="account" aria-describedby="accountdHelp">
                    @error('account') <div id="accountHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </form>
    <button class="btn btn-principal" wire:click.prevent="store">cadastrar</button>
    <!--wire:loading-->
    <div class="load" wire:loading>
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-light m-5" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>