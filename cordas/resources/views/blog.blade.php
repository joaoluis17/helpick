<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Lista de Trabalhos --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Conheça a sua nova banda preferida</h3>

            <div class="bg-white p-6 shadow rounded">
                @forelse ($jobs as $job)
                    <div class="mb-4 border-b pb-4">
                        <h4 class="font-semibold text-lg">{{ $job->name }}</h4>
                        <p class="text-sm text-gray-600">Contato: {{ $job->email }}</p>
                        <p class="mt-2">{{ $job->description }}</p>
                        @if ($job->portfolio)
                            <p class="mt-2">
                                <a href="{{ $job->portfolio }}" class="text-blue-500" target="_blank">Ver Portfólio</a>
                            </p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-600">Nenhum trabalho divulgado ainda.</p>
                @endforelse
            </div>

            {{-- Formulário de Envio --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Divulgue aqui o seu trabalho!</h3>

            <form action="{{ route('blog.store') }}" method="POST" class="mb-8 bg-off-white p-6 shadow rounded">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Seu Nome</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="portfolio" class="block text-sm font-medium text-gray-700">Portfólio (opcional)</label>
                    <input type="url" name="portfolio" id="portfolio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div>
                    <button type="submit" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 hover:bg-off-white">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
