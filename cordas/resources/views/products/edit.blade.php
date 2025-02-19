<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Produto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-off-white p-6 shadow rounded">
                <a href="{{ route('products') }}" class="flex items-center bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white w-fit mb-4">
                    <img src="{{ asset('assets/back-icon.svg') }}" alt="Voltar" class="w-5 h-5 mr-2">
                    Voltar
                </a>

                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="name">Nome:</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="border p-2 w-full mb-2">

                    <label for="price">Preço:</label>
                    <input type="text" id="price" name="price" value="{{ $product->price }}" class="border p-2 w-full mb-2">

                    <label for="description">Descrição:</label>
                    <textarea name="description" class="border p-2 w-full mb-2">{{ $product->description }}</textarea>

                    <label for="url">URL:</label>
                    <input type="text" name="url" value="{{ $product->url }}" class="border p-2 w-full mb-2">

                    <label for="image">Imagem:</label>
                    <input type="file" name="image" class="border p-2 w-full mb-2">

                    <button type="submit" class="bg-skin-color text-brown-eyes hover:bg-off-white px-4 py-2 rounded">Salvar</button>
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
            value = (value / 100).toFixed(2); // Converte para decimal com 2 casas
            event.target.value = value.replace(".", ","); // Exibe como moeda (se necessário)
        });

        // Antes de enviar o formulário, converta para o formato correto
        document.querySelector("form").addEventListener("submit", function() {
            priceInput.value = priceInput.value.replace(",", "."); // Troca vírgula por ponto
        });
    });
</script>
