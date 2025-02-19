<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-off-white p-6 shadow rounded">
                <a href="{{ route('products') }}" class="flex items-center bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white w-fit mb-4">
                    <img src="{{ asset('assets/back-icon.svg') }}" alt="Voltar" class="w-5 h-5 mr-2">
                    Voltar
                </a>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold text-gray-700">Nome do Produto</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-semibold text-gray-700">Preço</label>
                        <input type="text" id="price" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-semibold text-gray-700">Descrição</label>
                        <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="url" class="block text-sm font-semibold text-gray-700">Link do Produto</label>
                        <input type="url" id="url" name="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-semibold text-gray-700">Imagem</label>
                        <input type="file" id="image" name="image" class="mt-1 block rounded-md border-gray-300 shadow-sm cursor-pointer" required>
                    </div>

                    <button type="submit" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white">Cadastrar Produto</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const priceInput = document.getElementById("price");

        priceInput.addEventListener("input", function(event) {
            let value = event.target.value.replace(/\D/g, ""); // Remove tudo que não for número
            value = (value / 100).toLocaleString("pt-BR", { style: "currency", currency: "BRL" }); // Formata para moeda brasileira
            event.target.value = value;
        });
    });
</script>
