<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex justify-between">
                    <select wire:model="limit" wire:change="changeLimit" class="border border-gray-300 py-1">
                        @foreach ($list_paginate as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <select wire:model.live="field" class="border border-gray-300 py-1">
                        @foreach ($fields as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Seach..."
                        class="border border-gray-300 p-1">
                </div>
            <div class="flex flex-wrap -m-4">
                @if (count($products) < 1)
                    Products not found
                @else
                @foreach ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="https://placehold.jp/420x260.png">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                {{ $product->category->name }}
                            </h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium">
                                {{ $product->name }}
                            </h2>
                            <p class="mt-1">
                                ${{ $product->price }}
                            </p>
                        </div>
                    </div>
                @endforeach

                @endif

            </div>
             {{ $products->links() }}
        </div>
    </section>
</div>
