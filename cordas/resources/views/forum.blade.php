<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fórum') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-off-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Formulário de Criação de Post -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Qual a sua dúvida?</h3>
                    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
                            <input type="text" id="title" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo:</label>
                            <textarea id="content" name="content" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>
                        <button type="submit" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300">
                            Enviar
                        </button>
                    </form>
                </div>

                <!-- Lista de Posts -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Posts Recentes</h3>
                    <ul class="space-y-4">
                        @foreach ($posts as $post)
                            <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                                <h4 class="text-lg font-semibold text-gray-800">
                                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a>
                                </h4>
                                <p class="mt-2 text-gray-600">{{ $post->content }}</p> <!-- Exibe o conteúdo do post -->

                                <!-- Exibir Comentários -->
                                <h5 class="text-md font-semibold mt-4">Comentários:</h5>
                                <ul class="space-y-2">
                                    @foreach ($post->comments as $comment)
                                        <li class="text-gray-600">{{ $comment->content }} - <em>por {{ $comment->user->name }}</em></li>
                                    @endforeach
                                </ul>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
