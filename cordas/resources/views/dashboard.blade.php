<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-off-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                    <!-- Bloco do Fórum -->
                    <div class="relative bg-brown-eyes text-white p-6 rounded-lg shadow-md pb-16">
                        <h3 class="text-lg font-semibold">Fórum</h3>
                        <p class="mt-2">Entre no Fórum para discutir, aprender e compartilhar com outros músicos!</p>
                        <a href="{{ route('forum') }}"
                           class="absolute bottom-4 left-4 mt-4 inline-block bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300">
                            Entrar
                        </a>
                    </div>

                    <!-- Bloco de Artigos e Vídeos -->
                    <div class="relative bg-brown-eyes text-white p-6 rounded-lg shadow-md pb-16">
                        <h3 class="text-lg font-semibold">Artigos e Vídeos</h3>
                        <p class="mt-2">Explore conteúdos sobre música e descubra novos artistas e lançamentos.</p>
                        <a href="#"
                           class="absolute bottom-4 left-4 mt-4 inline-block bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300">
                            Ver Mais
                        </a>
                    </div>

                    <!-- Bloco de Produtos -->
                    <div class="relative bg-brown-eyes text-white p-6 rounded-lg shadow-md pb-16">
                        <h3 class="text-lg font-semibold">Produtos para Músicos</h3>
                        <p class="mt-2">Confira produtos selecionados para melhorar sua experiência musical.</p>
                        <a href="#"
                           class="absolute bottom-4 left-4 mt-4 inline-block bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300">
                            Ver Produtos
                        </a>
                    </div>

                    <!-- Bloco de Perfil do Usuário -->
                    <div class="relative bg-brown-eyes text-white p-6 rounded-lg shadow-md pb-16">
                        <h3 class="text-lg font-semibold">Perfil</h3>
                        <p class="mt-2">Acesse seu perfil e personalize sua experiência.</p>
                        <a href="{{ route('profile.edit') }}"
                           class="absolute bottom-4 left-4 mt-4 inline-block bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300">
                            Ver Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
