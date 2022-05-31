<div>
  <div class="p-0" style="">

    {{-- Show in bigger screens --}}
    <div class="bg-info-rm mb-4 d-none d-md-block">
      <button class="btn btn-success-rm m-0 border shadow-sm bg-white" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        Previous
      </button>

      <button class="btn btn-danger-rm m-0 border shadow-sm bg-white" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        Next
      </button>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>



      @if (! $modes['displaySaleInvoice'])
      <div class="shadow-sm-rm float-right" style="width: 500px;">
        <div class="card">
          <div class="card-body p-0 bg-success-rm text-white-rm">
            <div class="p-4">
              <h2 class="font-weight-bold" style="font-size: 2rem;">
                <span class="mr-2">
                  Rs
                </span>
                @php echo number_format( $totalSaleAmount ); @endphp
              </h2>
            </div>
          </div>
        </div>
      </div>
      @endif

      <div class="clearfix">
      </div>

    </div>

    <div class="d-none d-md-block my-3 text-secondary" style="font-size: 1.3rem;">
      <i class="fas fa-calendar mr-2"></i>
      {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
      &nbsp;&nbsp;
      {{ Carbon\Carbon::parse($daybookDate)->format('l') }}

      <input type="date" wire:model.defer="daybookDate" class="ml-5">
      <button class="btn btn-success" wire:click="render">
        Go
      </button>
    </div>

    {{-- Show in smaller screens --}}
    <div class="bg-info-rm mb-4 d-md-none">
      <button class="btn btn-success m-0" style="font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        @if (false)
        Previous
        @endif
      </button>

      <button class="btn btn-danger m-0" style="font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        @if (false)
        Next
        @endif
      </button>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <span class="ml-3 text-secondary" style="font-size: 1rem;">
          Loading...
        </span>
      </button>


      <div class="py-2">
        <button class="btn btn-success mr-2" style="font-size: 1.5rem;" wire:click="">
          <i class="fas fa-calendar mr-3"></i>
          {{ $daybookDate }}
        </button>

        <button class="btn btn-danger m-0" style="font-size: 1.5rem;" wire:click="">
          <i class="fas fa-calendar mr-3"></i>
          {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
        </button>
      </div>

      <div class="shadow-sm-rm" style="width: 500px;">
        <div class="card">
          <div class="card-body p-0 bg-success text-white">
            <div class="p-4">
              <h2 class="font-weight-bold" style="font-size: 2rem;">
                <i class="fas fa-rupee-sign mr-3"></i>
                @php echo number_format( $totalSaleAmount ); @endphp
              </h2>
            </div>
          </div>
        </div>
      </div>

    </div>

  @if (! $modes['displaySaleInvoice'])
    <div class="row">
      <div class="col-md-12">
        @if ( true {{--$saleInvoices != null && count($saleInvoices) > 0--}})
          <div class="table-responsive">
            <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
              <thead>
                <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                  <th style="width: 100px;">Bill no</th>
                  <th style="width: 200px;">Time</th>
                  <th style="width: 200px;">Table</th>
                  <th>Customer</th>
                  <th style="width: 200px;">Payment Status</th>
                  <th style="width: 200px;">Pending Amount</th>
                  <th style="width: 200px;">Total</th>
                </tr>
              </thead>
              <tbody class="bg-white" style="font-size: 1.3rem;">
                @foreach ($saleInvoices as $saleInvoice)
                  <tr class="" role="button" wire:click="displaySaleInvoice({{ $saleInvoice }})">
                    <td class="text-secondary-rm"
                        style="font-size: 1rem;"
                        wire:click=""
                        role="button">
                      <span class="text-primary">
                      {{ $saleInvoice->sale_invoice_id }}
                      </span>
                    </td>
                    <td class="" style="font-size: 1rem;">
                      @if (false)
                      <div>
                        {{ $saleInvoice->sale_invoice_date }}
                      </div>
                      @endif
                      <div>
                        {{ $saleInvoice->created_at->format('H:i A') }}
                      </div>
                    </td>
                    <td class="">
                      @if ($saleInvoice->seatTableBooking)
                      {{ $saleInvoice->seatTableBooking->seatTable->name }}
                      @else
                        Takeaway
                      @endif
                    </td>
                    <td>
                      @if ($saleInvoice->customer)
                        <i class="fas fa-circle text-success mr-3"></i>
                        {{ $saleInvoice->customer->name }}
                      @else
                        <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                        <span class="text-secondary" style="font-size: 1rem;">
                          Unknown
                        </span>
                      @endif
                    </td>
                    <td>
                      @if ( $saleInvoice->payment_status == 'paid')
                      <span class="badge badge-pill badge-success">
                      Paid
                      </span>
                      @elseif ( $saleInvoice->payment_status == 'partially_paid')
                      <span class="badge badge-pill badge-warning">
                      Partial
                      </span>
                      @elseif ( $saleInvoice->payment_status == 'pending')
                      <span class="badge badge-pill badge-danger">
                        Pending
                      </span>
                      @else
                      <span class="badge badge-pill badge-secondary">
                        {{ $saleInvoice->payment_status }}
                      </span>
                      @endif

                      @foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment)
                      <span class="badge badge-pill ml-3">
                        {{ $saleInvoicePayment->saleInvoicePaymentType->name }}
                      </span>
                      @endforeach
                    </td>
                    <td>
                      {{ $saleInvoice->getPendingAmount() }}
                    </td>
                    <td class="font-weight-bold">
                      @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr class="bg-success-rm text-white-rm" style="font-size: 1.5rem; {{--background-image: linear-gradient(to right, white, #abc);--}}">
                  <td class="font-weight-bold text-right" colspan="6">
                    Total
                  </td>
                  <td class="font-weight-bold">
                    @php echo number_format( $totalSaleAmount ); @endphp
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div>
            {{ $saleInvoices->links() }}
          </div>
        @else
          <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
            No sales.
          </div>
        @endif
        
        <div class="row mt-5">
          @foreach ($paymentByType as $key => $val)
            <div class="col-md-2 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <h2 class="mb-5 text-dark font-weight-bold">
                    {{ $key }}
                  </h2>
                  <h3 class="text-secondary font-weight-bold">
                    Rs
                    @php echo number_format( $val ); @endphp
                  </h3>
                </div>
              </div>
            </div>
          @endforeach

          {{-- Pending Amount --}}
          <div class="col-md-2">
            <div class="card shadow">
              <div class="card-body">
                <h2 class="mb-5 text-danger font-weight-bold">
                  Pending
                </h2>
                <h3 class="text-secondary font-weight-bold">
                  Rs
                  @php echo number_format( $netPendingAmount ); @endphp
                </h3>
              </div>
            </div>
          </div>

        </div>

        {{-- Daybook item count div --}}
        <div class="my-4">
          <div class="w-50">
            @if (count($todayItems) > 0)
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="font-size: 1.3rem;">
                  <thead>
                    <tr class="bg-success-rm text-white-rm">
                      <th>
                        Item
                      </th>
                      <th>
                        Quantity
                      </th>
                    </tr>
                  </thead>

                  <tbody class="bg-white">
                      @foreach ($todayItems as $item)
                        <tr>
                          <td>
                            {{ $item['product']->name }}
                          </td>
                          <td>
                            {{ $item['quantity'] }}
                          </td>
                        <tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>
        </div>


      </div>
      <div class="col-md-6">
      </div>
    </div>
  @else
    @livewire ('daybook-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif
</div>
