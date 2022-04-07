<?php

namespace App\Http\Livewire;

use App\Models\Associated;
use App\Models\Contract;
use Livewire\Component;

class AssociedLivewire extends Component
{
    //variaveis do sistema
    public $contractId = 0;
    public $new = false;
    //variavei da entidade
    public $code = '';
    public $name = '';
    public $cnpj = '';
    //variavei da entidade fim

    public function render()
    {
        if ($this->contractId == 0) {
            return route('Empresa');
            session()->flash('error', 'Não tem uma empresa selecionada, seleciona uma empresa para continuar');
        }

        if ($this->new)
            return view(
                'livewire.new-associed-livewire',
                [
                    'contract' => Contract::where('id', $this->contractId)->first(),
                ]
            );

        return view(
            'livewire.associed-livewire',
            [
                'contract' => Contract::where('id', $this->contractId)->first(),
                'associateds' => Associated::where('contract_id', $this->contractId)->paginate(10),
            ]
        );
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->cnpj = '';
        $this->code = '';
    }


    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required',
            'cnpj' => 'max:255',
            'code' => 'required'
        ]);

        $teste = Associated::create([
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'code' => $this->code,
            'contract_id' => $this->contractId
        ]);

        session()->flash('success', 'Associada criada com sucesso');

        $this->resetInputs();
        $this->new = false;
    }

    public function mount($id)
    {
        $this->contractId = $id;
    }

    public function newAssociated()
    {
        if ($this->new == false)
            $this->new = true;
        else
            $this->new = false;
    }
}
