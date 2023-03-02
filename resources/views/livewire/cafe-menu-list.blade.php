<div>
  {{-- Categories Bar --}}
  @if (! $modes['productCategoryProductList'])
  <div class="">

    @if (false)
    <span class="mr-3" role="button" wire:click="enterMode('showFullMenuList')" wire:key="{{ rand() }}" style="text-decoration: underline;">
      Show all
    </span>
    @endif

    @if ($products == null || count($products) == 0)
    @foreach ($productCategories as $productCategory)
      <span class="mr-3" role="button" wire:click="selectCategory('{{ $productCategory->product_category_id }}')" wire:key="{{ rand() }}" style="text-decoration: underline;">
        {{ $productCategory->name }}
      </span>
    @endforeach
    @endif
  </div>
  @endif

  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <div class="row">
        @if ($products != null && count($products) > 0)
          <div class="table-responsive border bg-white">
            <table class="table table-hover">

              <thead>
                <tr>
                  <th colspan="2">
                    Item
                  </th>
                  <th>
                    Stock
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($products as $product)
                  <tr>
              <td style="width: 50px;">
                <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
              </td>
                    <td>
                      {{ $product->name }}
                    </td>
                    <td>
                      @if ($product->stock_applicable == 'yes')
                        {{ $product->stock_count }}
                        {{ $product->inventory_unit }}
                      @else
                        <div class="text-muted" style="font-size: 0.7rem;">
                          <i class="fas fa-exclamation-circle mr-1"></i>
                        </div>
                      @endif
                    </td>
                    <td>
                      @php echo number_format( $product->selling_price ); @endphp
                    </td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-cog text-secondary"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <button class="dropdown-item" wire:click="$emit('displayProduct', {{ $product->product_id }})">
                            <i class="fas fa-file text-primary mr-2"></i>
                            View
                          </button>
                          <button class="dropdown-item" wire:click="$emit('updateProduct', {{ $product->product_id }})">
                            <i class="fas fa-pencil-alt text-primary mr-2"></i>
                            Update
                          </button>

                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
    </div>
  @endif
</div>
