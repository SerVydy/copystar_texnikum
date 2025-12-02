<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;

    public int $limit = 10;

    public array $list_paginate = [10,15,25,50];

    public string $search = '';

    public string $orderByField = 'ID';

    public string $orderByDirection = 'desc';

    public array $fields = ['ID','Name','Count','Price'];

        public function changeField($field)
    {
        if($this->orderByField == $field)
        {
            $this->orderByDirection = $this->orderByDirection == 'desc' ? 'asc' : 'desc';
        }

        $this->orderByField = $field;
    }

    public function deleteCategory(Product $product)
    {
        $product->delete();
    }

    public function changeLimit()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::
            whereLike('name','%' . strtolower($this->search) . '%')
                ->orderBy($this->orderByField, $this->orderByDirection)
                ->paginate($this->limit);
        return view('livewire.products.list-products', compact('products'));
    }
}
