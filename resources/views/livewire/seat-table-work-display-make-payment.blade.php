<div class="card shadow">
  <div class="card-header bg-success text-white">
    <h1 class="" style="font-size: 1.5rem;">
      Make payment
    </h1>
  </div>
  <div class="card-body p-0">
    @if ($modes['customer'])
      <div class="p-3">
        <button class="btn btn-danger mr-3" wire:click="exitMode('customer')">
          No Customer
        </button>

        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>

      </div>

      <div class="table-responsive mb-0">
        <table class="table mb-0">
          <tbody>
            <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
              <td class="w-50 p-0 bg-info-rm font-weight-bold">
                <span class="ml-4">
                  Customer Name
                </span>
                @error('customer_name')
                <div>
                  <span class="text-danger">{{ $message }}</span>
                </div>
                @enderror
              </td>
              <td class="p-0 h-100 bg-warning font-weight-bold">
                <input class="w-100 h-100 font-weight-bold" type="text" wire:model.defer="customer_name" />
              </td>
            </tr>

            <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
                <span class="ml-4">
                  Customer Phone
                </span>
                @error('tender_amount')
                <div>
                  <span class="text-danger">{{ $message }}</span>
                </div>
                @enderror
              </td>
              <td class="p-0 h-100 font-weight-bold">
                <input class="w-100 h-100 font-weight-bold" type="text" wire:model="customer_phone" wire:keydown.enter="fetchCustomerData"/>
              </td>
            </tr>

            <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
                <span class="ml-4">
                  Customer Address
                </span>
                @error('tender_amount')
                <div>
                  <span class="text-danger">{{ $message }}</span>
                </div>
                @enderror
              </td>
              <td class="p-0 h-100 font-weight-bold">
                <input class="w-100 h-100 font-weight-bold" type="text" wire:model="customer_address" />
              </td>
            </tr>

            <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
              <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
                <span class="ml-4">
                  Customer PAN
                </span>
                @error('tender_amount')
                <div>
                  <span class="text-danger">{{ $message }}</span>
                </div>
                @enderror
              </td>
              <td class="p-0 h-100 font-weight-bold">
                <input class="w-100 h-100 font-weight-bold" type="text" wire:model="customer_pan" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    @else
      <div class="p-3">
        <button class="btn btn-success mr-3" wire:click="enterMode('customer')">
          Customer
        </button>

        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>
      </div>
    @endif

    <div class="table-responsive mb-0">
      <table class="table table-bordered mb-0">
        <tbody>


          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                TOTAL
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold pl-3 pt-2">
              {{ $this->total }}
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                Tender Amount
              </span>
              @error('tender_amount')
              <div>
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 font-weight-bold">
              <input class="w-100 h-100 font-weight-bold" type="text" wire:model.defer="tender_amount" />
            </td>
          </tr>


        </tbody>
      </table>
    </div>

    <div class="p-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>
      @if (! $modes['paid'])
      <button onclick="this.disabled=true;" class="btn btn-lg btn-success mr-3" wire:click="store" style="width: 130px; height: 70px; font-size: 1.3rem;">
        CONFIRM
      </button>

      <button onclick="this.disabled=true;" class="btn btn-lg btn-danger" wire:click="$emit('exitMakePaymentMode')" style="width: 120px; height: 70px; font-size: 1.3rem;">
        CANCEL
      </button>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
      @else
        <button onclick="this.disabled=true;" class="btn btn-lg btn-success mr-3" wire:click="finishPayment" style="width: 120px; height: 70px; font-size: 1.3rem;">
          FINISH
        </button>
        <button onclick="this.disabled=true;" lass="btn btn-lg btn-warning-rm mr-3" wire:click="finishPayment" style="width: 120px; height: 70px; font-size: 1.3rem; background-color: orange">
          PRINT
        </button>
        <button wire:loading class="btn">
          <span class="spinner-border text-info mr-3" role="status">
          </span>
        </button>
        <span class="float-right font-weight-bold mt-3 mr-3" style="font-size: 1.5rem;">
          RETURN &nbsp;&nbsp;&nbsp;&nbsp;
          {{ $returnAmount }}
        </span>
      @endif
    </div>
  </div>
</div>
