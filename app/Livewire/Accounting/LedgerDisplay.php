<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use App\LedgerEntry;

class LedgerDisplay extends Component
{
    public $abAccount;

    public $ledgerEntries;

    public function render(): View
    {
        $this->ledgerEntries = $this->abAccount->ledgerEntries;

        return view('livewire.accounting.ledger-display');
    }
}
