<div class="my-3 bg-white border">
  <h2 class="h5 m-3">
    Product specifications
  </h2>

    {{-- Toolbar --}}
    @if ($modes['updateProductAddProductSpecificationMode'])
    @else
      <div class="p-2 bg-white border">
          <button class="btn btn-light" wire:click="enterMode('updateProductAddProductSpecificationMode')">
            <i class="fas fa-plus-circle mr-1"></i>
            Add specification
          </button>
          <button class="btn btn-light mr-3" wire:click="enterMode('updateProductAddProductSpecificationHeadingMode')">
            <i class="fas fa-plus-circle mr-1"></i>
            Add specification heading
          </button>
          @include ('partials.dashboard.spinner-button')
      </div>
    @endif

  <!-- Flash message div -->
  @if (session()->has('addSpecMessage'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('addSpecMessage') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  @if ($modes['updateProductAddProductSpecificationHeadingMode'])
    @livewire ('product.dashboard.product-edit-add-product-specification-heading', ['product' => $product,])
  @endif

  @if ($modes['updateProductAddProductSpecificationMode'])
    @livewire ('product.dashboard.product-edit-add-product-specification', ['product' => $product,])
  @endif

  @if (count($product->productSpecificationHeadings) > 0)
    <div class="mb-5">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productSpecificationHeadings as $productSpecificationHeading)
            <tr class="">
              <th class="bg-primary text-white border-dark" colspan="3" style="width: 200px;">
                {{ $productSpecificationHeading->specification_heading }}
              </th>
            </tr>
            @foreach ($productSpecificationHeading->productSpecifications as $productSpecification)
              <tr class="">
                <th class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                    @else
                      {{ $productSpecification->spec_heading}}
                      <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productSpecification->spec_heading}}
                    <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </th>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationValue'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                    @else
                      {{ $productSpecification->spec_value }}
                      <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productSpecification->spec_value }}
                    <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </td>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['deleteProductSpecificationMode'])
                    @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                        Cancel
                      </button>
                    @else
                      <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  @else
                    <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          @endforeach
        </table>
      </div>
    </div>
  @endif

  @if (count($product->productSpecifications) > 0)
    <div class="mb-5">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productSpecifications as $productSpecification)
            @if ($productSpecification->product_specification_heading_id == null)
              <tr class="">
                <th class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                    @else
                      {{ $productSpecification->spec_heading}}
                      <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productSpecification->spec_heading}}
                    <button class="btn btn-light" wire:click="updateProductSpecificationKeyword({{ $productSpecification }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </th>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationValue'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                    @else
                      {{ $productSpecification->spec_value }}
                      <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productSpecification->spec_value }}
                    <button class="btn btn-light" wire:click="updateProductSpecificationValue({{ $productSpecification }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </td>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['deleteProductSpecificationMode'])
                    @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                        Cancel
                      </button>
                    @else
                      <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  @else
                    <button class="btn btn-light" wire:click="deleteProductSpecification({{ $productSpecification }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endif
          @endforeach
        </table>
      </div>
    </div>
  @endif

</div>
