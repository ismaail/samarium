<div>
  <div class="mb-3 text-secondary">
    Home > {{ $productCategory->name }}
  </div>

  <div class="my-3 mb-4 text-scondary">
    Displaying
    {{ count($productCategory->products) }}
    out of
    {{ count($productCategory->products) }}
    products
  </div>

  {{-- Show in smaller screens --}}
  <div class="d-md-none">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          @foreach ($productCategory->products as $product)
            <tr wire:key="{{ $loop->index }}">
              <td>
                @if ($product->image_path)
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 75px; height: 75px;">
                @else
                  <div class="h-100 d-flex justify-content-center">
                    <div class="d-flex flex-columns justify-content-center">
                    </div>
                  </div>
                  <i class="fas fa-check-circle fa-2x"></i>
                @endif
              </td>
              <td>
                <div class="mb-3">
                  <a href="{{ route('website-product-view', [$product->product_id, $product->name]) }}">
                    {{ $product->name }}
                  </a>
                </div>
                <div>
                  Rs
                  {{ $product->selling_price }}
                </div>
              </td>
              <td>
                <button href="" class="btn text-danger border-danger"
                    wire:click="addItemToCartB({{ $product->product_id }})"
                    wire:key="{{ $loop->index }}">
                  <i class="fas fa-shopping-cart"></i>
                  Cart
                </button>
              </td>
            </tr>
          @endforeach
        <tbody>
      </table>
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="d-none d-md-block">
    @if (count($productCategory->products) > 0)
      <div class="row" wire:key="{{ rand() }}">
        @foreach ($productCategory->products as $product)
          <div class="col-md-3 mb-4">
            @livewire ('website-product-list-display', ['product' => $product,])
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary" style="font-size: 1.3rem;">
        No products
      </div>
    @endif
  </div>

  </div>
</div>
