<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Sale;
use App\SaleInvoice;
use App\SeatTableBooking;

class DaybookComponent extends Component
{
    public $daybookDate;
    public $saleInvoices;

    public $totalAmount;
    public $totalCashAmount;
    public $totalCreditAmount;

    public $seatTableBookings;
    public $totalBookingAmount;

    public function mount()
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render()
    {
        $this->saleInvoices = SaleInvoice::where('sale_invoice_date', $this->daybookDate)->get();

        $this->seatTableBookings = SeatTableBooking::where('booking_date', $this->daybookDate)->get();

        $this->totalAmount = $this->getTotalAmount();
        $this->totalCashAmount = $this->getTotalCashAmount();
        $this->totalCreditAmount = $this->getTotalCreditAmount();
        $this->totalBookingAmount = $this->getTotalBookingAmount();

        return view('livewire.daybook-component');
    }

    public function setPreviousDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
    }

    public function setNextDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
    }

    public function getTotalAmount()
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalCashAmount()
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPaidAmount();
        }

        return $total;
    }

    public function getTotalCreditAmount()
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPendingAmount();
        }

        return $total;
    }

    public function getTotalBookingAmount()
    {
        $total = 0;

        foreach($this->seatTableBookings as $booking) {
            $total += $booking->getTotalAmount();
        }

        return $total;
    }
}
