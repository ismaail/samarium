<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoreExpenseDisplay extends Component
{
    public $expense;

    public $modes = [
        'showPayments' => false,
    ];

    public function render()
    {
        return view('livewire.core-expense-display');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }
}
