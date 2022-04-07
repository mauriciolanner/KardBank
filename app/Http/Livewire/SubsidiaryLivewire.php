<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Associated;
use App\Models\Subsidiary;

class SubsidiaryLivewire extends Component
{
    //variaveis do sistema
    public $associatedId = 0;
    public $new = false;
    //variavei da entidade
    public $code = '';
    public $name = '';
    public $cnpj = '';
    //variavei da entidade fim

    public function render()
    {
        if ($this->associatedId == 0) {
            // return route('Empresa');
            // session()->flash('error', 'Não tem uma empresa selecionada, seleciona uma empresa para continuar');
        }

        if ($this->new)
            return view(
                'livewire.new-subsidiary-livewire',
                [
                    'associated' => Associated::where('id', $this->associatedId)->first(),
                ]
            );

        return view(
            'livewire.subsidiary-livewire',
            [
                'associated' => Associated::where('id', $this->associatedId)->first(),
                'subsidiaries' => Subsidiary::where('associated_id', $this->associatedId)->paginate(10)
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

        Subsidiary::create([
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'code' => $this->code,
            'associated_id' => $this->associatedId
        ]);

        session()->flash('success', 'Filial criada com sucesso');

        $this->resetInputs();
        $this->new = false;
    }

    public function mount($id)
    {
        $this->associatedId = $id;
    }

    public function newSubsidiary()
    {
        if ($this->new == false)
            $this->new = true;
        else
            $this->new = false;
    }
}
