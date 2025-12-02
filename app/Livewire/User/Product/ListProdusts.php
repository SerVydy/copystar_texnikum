<?php

namespace App\Livewire\User\Product;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ListProdusts extends Component
{

    use WithPagination;

    public int $limit = 10;

    public array $list_paginate = [10,15,25,50];

    public string $search = '';

    public string $orderByField = 'id';

    public string $orderByDirection = 'desc';

    public array $fields = ['id','name'];

    public string $field = '';


    #[Computed()]
    public function changeField()
    {
        if($this->orderByField == $this->field)
        {
            $this->orderByDirection = $this->orderByDirection == 'desc' ? 'asc' : 'desc';
        }

        $this->orderByField = $this->field;
    }


    public function changeLimit()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->search)
            {
            $this->resetPage();
        }
        $products = Product::
            where('name','like','%'.$this->search.'%')
            ->orderBy($this->orderByField, $this->orderByDirection)
            ->paginate($this->limit);
        return view('livewire.user.product.list-produsts', compact('products'));
    }
}
