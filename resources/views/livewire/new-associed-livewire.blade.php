<div class="col-md-12 card shadow bg-white p-3">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-principal" wire:click="newAssociated">Cancelar</button>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="contract_id" class="form-label">Contrato</label>
                    <input type="text" class="form-control @error('contract_id')  is-invalid @enderror" name="contract_id"
                        value="{{$contract->name}}" aria-describedby="idHelp" readonly>
                    @error('contract_id') <div id="contract_idHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="code" class="form-label">Codigo</label>
                    <input type="text" class="form-control @error('code')  is-invalid @enderror" name="code"
                        wire:model="code" aria-describedby="idHelp">
                    @error('code') <div id="codeHelp" class="form-text text-danger">{{ $message }}</div> @enderror
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
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control @error('cnpj')  is-invalid @enderror" name="cnpj"
                        wire:model="cnpj" aria-describedby="cnpjdHelp">
                    @error('cnpj') <div id="cnpjHelp" class="form-text text-danger">{{ $message }}</div> @enderror
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