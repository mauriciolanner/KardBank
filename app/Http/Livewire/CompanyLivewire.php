<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Associated;
use Livewire\WithPagination;

class CompanyLivewire extends Component
{
    //variavei do sistema
    public $new = false;
    public $associated = 0;
    //variavei da entidade company
    public $name = '';
    public $cnpj = '';
    public $code = '';
    //variavei da entidade fim

    public function render()
    {
        if ($this->new)
            return view('livewire.new-company-livewire');

        return view(
            'livewire.company-livewire',
            [
                'company' => Company::paginate(10),
                'new' => $this->new
            ]
        );
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->cnpj = '';
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
            'cnpj' => 'max:255',
            'code' => 'required'
        ]);

        Company::create($validateData);

        session()->flash('success', 'Empresa criada com sucesso');

        $this->resetInputs();
        $this->new = false;
    }

    public function associatedsRender($id)
    {
        $this->associated = $id;
    }
}
