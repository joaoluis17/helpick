<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showModal: false, deleteUrl: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aqui você encontra as melhores promoções no mundo musical!</h3>

            <div class="bg-off-white p-6 shadow rounded">
                <a href="{{ route('products.create')}}" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white">
                    Adicionar Produto
                </a>

                @if(session('success'))
                    <div class="mb-4 mt-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Grid de Produtos -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                    @foreach($products as $product)
                        <div class="bg-white p-4 shadow rounded-lg text-center">
                            <h4 class="text-xl font-semibold">{{ $product->name }}</h4>
                            <h5 class="text-lg font-semibold text-gray-600">R$ {{ number_format($product->price, 2, ',', '.') }}</h5>
                            <p class="text-gray-700">{{ $product->description }}</p>
                            
                            <a href="{{ $product->url }}" target="_blank" class="text-brown-eyes hover:text-skin-color block mt-2">
                                Ver mais
                            </a>

                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="mt-4 w-full h-40 object-cover rounded">
                            @endif

                            <!-- Botões Editar e Excluir dentro do mesmo bloco -->
                            <div class="mt-4 flex justify-center space-x-4">
                                <a href="{{ route('products.edit', $product) }}" class="text-brown-eyes hover:text-skin-color">Editar</a>

                                <!-- Botão de Excluir que ativa o modal -->
                                <button @click="showModal = true; deleteUrl = '{{ route('products.destroy', $product) }}'" 
                                        class="text-red-700 hover:text-red-500">
                                    Excluir
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Fim da grid -->
            </div>
        </div>

        <!-- Modal de Confirmação -->
        <div x-show="showModal" @click.away="showModal = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                <!-- Botão de Fechar -->
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    &times;
                </button>

                <h2 class="text-xl font-semibold text-gray-800 mb-4">Você tem certeza?</h2>
                <p class="text-gray-600 mb-4">Esta ação não poderá ser desfeita.</p>

                <div class="flex justify-end space-x-4">
                    <button @click="showModal = false" class="bg-off-white px-4 py-2 rounded hover:bg-gray-400">
                        Cancelar
                    </button>
                    
                    <!-- Formulário de Exclusão -->
                    <form :action="deleteUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-skin-color text-brown-eyes font-semibold px-4 py-2 rounded hover:bg-red-500">
                            Confirmar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
