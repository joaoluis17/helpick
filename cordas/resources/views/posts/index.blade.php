<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
<h1>Lista de Posts</h1>
<a href="{{ route('posts.create') }}" class="bg-blue-500 text-white rounded p-2">Criar Novo Post</a>
<ul>
    @foreach ($posts as $post)
        <li>{{ $post->title }}</li> <!-- Exibindo apenas o título por enquanto -->
    @endforeach
</ul>
</body>
</html>
