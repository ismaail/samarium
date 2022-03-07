<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class CafeMenuProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $selling_price;
    public $stock_count = null;
    public $image;

    public function render()
    {
        return view('livewire.cafe-menu-product-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'selling_price' => 'required|integer',
            'stock_count' => 'nullable|integer',
            'image' => 'image',
        ]);

        $imagePath = $this->image->store('products', 'public');
        $validatedData['image_path'] = $imagePath;

        Product::create($validatedData);

        session()->flash('success', 'Product Added');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->selling_price = '';
        $this->image = null;
    }
}
