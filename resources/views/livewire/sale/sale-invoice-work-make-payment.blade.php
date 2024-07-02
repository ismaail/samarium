<div>


  <div class="card bg-light">
    <div class="card-body p-0 py-3">
  
      <div class="table-responsive mb-0 bg-white">
        <table class="table mb-0">
          <tbody>
  
            <tr style="height: 50px;">
              <td class="w-50 p-0 h-100 font-weight-bold border-0 pt-2" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                <span class="ml-4">
                  Subtotal
                </span>
              </td>
              <td class="p-0 h-100 font-weight-bold pl-3 pt-2 border-0" style="{{-- font-size: calc(1rem + 0.2vw); --}}">
                @php echo number_format( $this->total ); @endphp
              </td>
            </tr>
  
            {{-- Deal with non-taxes additions first --}}
            @foreach ($saleInvoiceAdditions as $key => $val)
  
            @if (strtolower($key) == 'vat')
              @continue
            @else
            <tr style="{{-- height: 40px; --}}" class="border-0">
              <td class="w-50 pl-0 pt-2 font-weight-bold border-0" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                {{-- Hard code for discount . Temp. Todo permanent design/fix --}} 
                @if (strtolower($key) == 'discount')
                  <div class="ml-4">
                    {{ $key }}
                    @if (! $modes['paid'])
                    <select
                        class="bg-white border border-secondary badge-pill"
                        wire:model="discount_percentage"
                        wire:change="calculateDiscount">
                      <option value="--">--</option>
                      <option value="5">5 %</option>
                      <option value="10">10 %</option>
                      <option value="15">15 %</option>
                      <option value="20">20 %</option>
                      <option value="25">25 %</option>
                      <option value="50">50 %</option>
                      <option value="manual">Manual</option>
                    </select>
                    @else
                      {{ $discount_percentage }} %
                    @endif
                  </div>
                @elseif (strtolower($key) == 'vat')
                  <div class="ml-4">
                    {{ $key }} (13 %)
                  </div>
                @else
                  <span class="ml-4">
                    {{ $key }}
                  </span>
                @endif
              </td>
              <td class="p-0 h-100 font-weight-bold border-0" style="{{-- font-size: calc(1rem + 0.2vw); --}}">
                @if (strtolower($key) == 'vat')
                  {{ $val }}
                @else
                  @if (strtolower($key) == 'Discount')
                    @if ($modes['manualDiscount'])
                      @if (! $modes['paid'])
                        <input class="w-100 h-100 font-weight-bold pl-3 border-0"
                            type="text" wire:model.debounce.500ms="saleInvoiceAdditions.{{ $key }}"
                            style="{{-- font-size: calc(1rem + 0.2vw); --}}"
                            wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
                      @else
                      <div class="w-100 h-100 font-weight-bold pl-3 border-0">
                        {{ $saleInvoiceAdditions[$key] }}
                      <div>
                      @endif
                    @else
                      <div class="w-100 h-100 font-weight-bold pl-3 pt-2 border-0">
                        {{ $saleInvoiceAdditions['Discount'] }}
                      </div>
                    @endif
                  @else
                    @if (! $modes['paid'])
                    <input class="w-100 h-100 font-weight-bold pl-3 border-0"
                        type="text" wire:model.debounce.500ms="saleInvoiceAdditions.{{ $key }}"
                        style="{{-- font-size: calc(1rem + 0.2vw); --}}"
                        wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
                    @else
                      <div class="w-100 h-100 font-weight-bold pl-3 border-0">
                        {{ $saleInvoiceAdditions[$key] }}
                      </div>
                    @endif
                  @endif
                @endif
              </td>
            </tr>
            @endif
            @endforeach
  
            {{-- Todo: Only vat? Any other taxes? --}}
            @if ($has_vat)
            <tr style="{{-- font-size: 1.3rem; height: 50px; --}}" class="border-bottom-m">
              <td class="w-50 p-0 h-100 font-weight-bold border-0 pt-2" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                <span class="ml-4">
                  Taxable amount
                </span>
              </td>
              <td class="p-0 h-100 font-weight-bold pl-3 pt-2 border-0" style="{{-- font-size: calc(1rem + 0.2vw); --}}">
                @php echo number_format( $this->taxable_amount ); @endphp
              </td>
            </tr>
            @endif
  
  
            {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
            @foreach ($saleInvoiceAdditions as $key => $val)
  
              {{-- Todo: Wont there be any other taxes other than vat? --}}
              @if (strtolower($key) != 'vat')
                @continue
              @else
              <tr style="height: 50px;">
                <td class="w-50 p-0 h-100 font-weight-bold border-0 pt-2" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                  @if (strtolower($key) == 'vat')
                    <div class="ml-4">
                      {{ $key }} (13 %)
                    </div>
                  @else
                    <span class="ml-4">
                      {{ $key }}
                    </span>
                  @endif
                </td>
                <td class="pl-3 h-100 font-weight-bold border-0" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                  @php echo number_format( $val ); @endphp
                </td>
              </tr>
              @endif
            @endforeach
  
            <tr style="{{-- font-size: 1.3rem; height: 50px; --}}">
              <td class="w-50 p-0 pt-2-rm font-weight-bold border-0 bg-info-rm" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
                <span class="ml-4 d-inline-block">
                  Total
                </span>
              </td>
              <td class="p-0 h-100 font-weight-bold pl-3 border-0 bg-warning-rm" style="{{-- font-size: calc(1rem + 0.2vw); --}} color: #080;">
                @php echo number_format( $this->grand_total ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
  
    </div>
  
  </div>

  @if (true)
  <div class="mt-2 p-3 bg-light border-rm">
    <div class="d-flex justify-content-between">
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h4 pl-2" style="{{-- font-size: calc(1.1rem + 0.2vw); --}}">
          Payment
        </h1>
      </div>
      <div>
        <div wire:loading>
          <span class="spinner-border text-white" role="status" style="{{-- font-size: 0.8rem; --}}">
          </span>
        </div>
      </div>
      @if (true)
      <div class="px-3 mb-2">
        @if ($modes['multiplePayments'])
          <button class="btn btn-sm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
            Single payment
          </button>
        @else
          <button class="btn btn-sm mr-3
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}"
              wire:click="enterMultiplePaymentsMode" style="{{-- font-size: calc(1rem + 0.2vw); --}}">
            <i class="fas fa-ellipsis-h"></i>
          </button>
        @endif
      </div>
      @endif
    </div>
  </div>
  @endif
  @if (! $modes['multiplePayments'])
  <div class="table-responsive mb-0" wire:key=" boomboom ">
    <table class="table table-bordered mb-0">
      <tbody>
  
        <tr style="height: 50px;" class="bg-light">
          <td class="w-50 p-0 pt-2 p-0 font-weight-bold border-0" style="{{-- font-size: calc(0.9rem + 0.2vw); --}}">
            <span class="ml-4 d-inline-block mt-2 mb-3" style="{{-- font-size: 1rem; --}}">
              @if (true)
              Tender Amount
              @endif
            </span>
            @error('tender_amount')
            <div class="pl-3" style="{{-- font-size: 0.8rem; --}}">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
          </td>
          <td class="p-0 h-100 font-weight-bold border-0">
            @if (! $modes['paid'])
            <input class="w-100 h-100 font-weight-bold border-0-rm pl-3"
                type="text"
                style="{{-- font-size: calc(1.2rem + 0.2vw); {{-- background-color: #afa; outline: none; --}} --}}"
                wire:model.defer="tender_amount" />
            @else
              <div class="w-100 h-100 font-weight-bold border-0 pl-3"
                  style="{{-- font-size: calc(1.2rem + 0.2vw); background-color: #afa; outline: none; --}}">
                {{ $tender_amount }}
              </div>
            @endif
          </td>
        </tr>
  
        <tr style="height: 50px;" class="bg-light">
          <td class="w-50 p-0 pt-2 font-weight-bold border-0" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
            <span class="ml-4">
              Payment type
            </span>
          </td>
          <td class="p-0 h-100 w-50 font-weight-bold border-0" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
            @if (! $modes['paid'])
            <select class="w-100 h-100 custom-control border-0 bg-light"
                style="outline: none;"
                wire:model.defer="sale_invoice_payment_type_id">
              <option>---</option>
  
              @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
                <option value="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}"
                    wire:key="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}">
                  {{ $saleInvoicePaymentType->name }}
                </option>
              @endforeach
            </select>
            @else
              {{ \App\SaleInvoicePaymentType::getNameFromId($sale_invoice_payment_type_id) }}
            @endif
          </td>
        </tr>
  
      </tbody>
    </table>
  </div>
  @else
  <div class="table-responsive mb-0" wire:key=" FOOBARAA ">
    <table class="table table-bordered mb-0">
      <tbody>
        @foreach ($multiPayments as $key => $val)
          <tr style="height: 50px;" wire:key="{{ $key }}">
            <td class="w-50 p-0 font-weight-bold" style="{{-- font-size: calc(0.6rem + 0.2vw); --}}">
              <span class="ml-4">
                {{ $key }}
              </span>
            </td>
            <td class="p-0 h-100 w-50 bg-warning font-weight-bold" style="{{-- font-size: calc(0.6rem + 0.2vw); --}}">
              <input type="text"
                  class="w-100 h-100 font-weight-bold" 
                  wire:model="multiPayments.{{ $key }}"
                  wire:keydown.enter="calculateTenderAmount"
                  wire:change="calculateTenderAmount"
              >
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <div class="table-responsive mb-0" wire:key=" FCBAYERN ">
    <table class="table table-bordered mb-0">
      <tbody>
        <tr class="border-0" style="height: 50px;" wire:key="{{ $key }}">
          <td class="w-50 p-0 font-weight-bold border-0" style="{{-- font-size: calc(0.6rem + 0.2vw); --}}">
            <span class="ml-4">
              Tender amount
            </span>
          </td>
          <td class="border-0" style="{{-- font-size: 2.5rem; --}}">
            {{ $tender_amount }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  @endif

  @if ($modes['paid'])
  <div class="table-responsive mb-0" wire:key=" BIZCUP ">
    <table class="table table-bordered mb-0">
      <tbody>
        <tr class="border-0" style="height: 50px;" wire:key="abcdedfg">
          <td class="w-50 p-0 pt-2 font-weight-bold border-0" style="{{-- font-size: calc(0.8rem + 0.2vw); --}}">
            <span class="ml-4">
              Return
            </span>
          </td>
          <td class="text-danger border-0" style="{{-- font-size: calc(1.2rem + 0.2vw); --}}">
            @if ($modes['paid'])
              {{ $returnAmount }}
            @else
              &nbsp;
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  @endif

  <div class="p-0 my-2">
    @if (! $modes['paid'])
    <button
        onclick="this.disabled=true;"
        class="btn
            {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            w-100 py-3"
        wire:click="store"
        style="{{-- font-size: calc(1rem + 0.2vw); --}}">
      <i class="fas fa-check-circle mr-3"></i>
      Confirm
    </button>
    @else
      <button
          onclick="this.disabled=true;"
          class="btn btn-lg btn-light py-4"
          wire:click="finishPayment"
          style="{{-- font-size: 1.3rem; --}}">
        FINISH
      </button>
      <button
          onclick="this.disabled=true;"
          class="btn btn-lg btn-light py-4"
          wire:click="finishPayment"
          style="{{-- font-size: 1.3rem; --}}">
        PRINT
      </button>
    @endif
  </div>


</div>
