<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Publicação</title>
</head>
<body>

    <form action="{{ route('createPubli') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="tipo_publi">Tipo de Publicação:</label>
        <select name="tipo_publi" id="tipo_publi" required>
            <option value="1">Filme</option>
            <option value="2">Livro</option>
            <option value="3">Jogo</option>
        </select>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="sinopse">Sinopse:</label>
        <textarea name="sinopse" id="sinopse" required></textarea>

        <label for="img">Imagem:</label>
        <input type="file" name="img" id="img" required accept="image/*">

        <label for="trailer">Iframe do Trailer</label>
        <input type="text" name="trailer" required>

        <button type="submit">cadastrar</button>
    </form>

</body>
</html>
