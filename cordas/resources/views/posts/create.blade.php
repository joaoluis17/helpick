<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
</head>
<body>
<h1>Criar Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Conteúdo:</label>
    <textarea id="content" name="content" required></textarea>

    <button type="submit">Criar</button>
</form>
</body>
</html>
