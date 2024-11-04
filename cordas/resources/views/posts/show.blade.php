<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-off-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Exibe o conteúdo do post -->
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Conteúdo do Post:</h3>
                <p class="mt-2 text-gray-600">{{ $post->content }}</p>

                <!-- Se houver comentários, exibe-os -->
                <h5 class="text-md font-semibold mt-4">Comentários:</h5>
                <ul class="space-y-2">
                    @foreach ($post->comments as $comment)
                        <li class="text-gray-600">{{ $comment->content }} - <em>por {{ $comment->user->name }}</em></li>
                    @endforeach
                </ul>

                <!-- Formulário para adicionar um novo comentário -->
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-4">
                    @csrf
                    <label>
                        <textarea name="content" rows="2" required placeholder="Escreva seu comentário..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </label>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="bg-skin-color text-brown-eyes font-semibold py-2 px-4 rounded border-2 border-gray-300 mt-2">
                        Adicionar Comentário
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
