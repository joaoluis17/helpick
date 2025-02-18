<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aqui você encontra as melhores promoções no mundo musical!</h3>

            <div class="bg-white p-6 shadow rounded">
                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @foreach($products as $product)
                    <div class="border-b py-4">
                        <h4 class="text-xl font-semibold">{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <a href="{{ $product->url }}" target="_blank" class="text-blue-500">Ver mais</a>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-4 w-40 h-40 object-cover">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
