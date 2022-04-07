<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Associated;
use Livewire\WithPagination;

class ContractLivewire extends Component
{
    //variavei do sistema
    public $new = false;
    public $associated = 0;
    //variavei da entidade company
    public $name = '';
    public $code = '';
    //variavei da entidade fim

    public function render()
    {
        if ($this->new)
            return view('livewire.new-contract-livewire');

        return view(
            'livewire.contract-livewire',
            [
                'company' => Contract::paginate(10),
                'new' => $this->new
            ]
        );
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->code = '';
    }

    public function newCompany()
    {
        if ($this->new == false)
            $this->new = true;
        else
            $this->new = false;
    }

    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        Contract::create($validateData);

        session()->flash('success', 'Contrato criado com sucesso');

        $this->resetInputs();
        $this->new = false;
    }

    public function associatedsRender($id)
    {
        $this->associated = $id;
    }
}
