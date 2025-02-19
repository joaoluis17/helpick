<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aqui você encontra as melhores promoções no mundo musical!</h3>

            <div class="bg-off-white p-6 shadow rounded">
                <a href="{{ route('products.create')}}" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white ">Adicionar Produto</a>
                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @foreach($products as $product)
                    <div class="border-b py-4">
                        <h4 class="text-xl font-semibold">{{ $product->name }}</h4>
                        <h5 class="text-xl font-semibold">{{ $product->price }}</h5>
                        <p>{{ $product->description }}</p>
                        <a href="{{ $product->url }}" target="_blank" class="text-brown-eyes hover:text-skin-color">Ver mais</a>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-4 w-40 h-40 object-cover">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
