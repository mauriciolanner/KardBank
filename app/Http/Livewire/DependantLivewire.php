<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subsidiary;
use App\Models\Dependant;

class DependantLivewire extends Component
{
    //variaveis do sistema
    public $subsidiaryId = 0;
    public $new = false;
    //variavei da entidade
    public $registration = '';
    public $account = '';
    public $name = '';
    public $CPF = '';
    //variavei da entidade fim

    public function render()
    {
        if ($this->subsidiaryId == 0) {
            return route('Empresa');
            session()->flash('error', 'Não tem uma empresa selecionada, seleciona uma empresa para continuar');
        }

        if ($this->new)
            return view(
                'livewire.new-dependant-livewire',
                [
                    'subsidiary' => Subsidiary::where('id', $this->subsidiaryId)->first(),
                ]
            );

        return view(
            'livewire.dependant-livewire',
            [
                'dependants' => Dependant::where('subsidiary_id', $this->subsidiaryId)->paginate(10),
                'subsidiary' => Subsidiary::where('id', $this->subsidiaryId)->first()
            ]
        );
    }

    public function resetInputs()
    {
        $this->registration = '';
        $this->account = '';
        $this->name = '';
        $this->CPF = '';
    }

    public function store()
    {
        $validateData = $this->validate([
            'registration' => 'required',
            'account' => 'required',
            'name' => 'required',
            'CPF' => 'max:255'
        ]);

        Dependant::create([
            'registration' => $this->registration,
            'account' => $this->account,
            'name' => $this->name,
            'CPF' => $this->CPF,
            'subsidiary_id' => $this->subsidiaryId
        ]);

        session()->flash('success', 'Servidor criado com sucesso');

        $this->resetInputs();
        $this->new = false;
    }

    public function mount($id)
    {
        $this->subsidiaryId = $id;
    }

    public function newDependant()
    {
        if ($this->new == false)
            $this->new = true;
        else
            $this->new = false;
    }
}
