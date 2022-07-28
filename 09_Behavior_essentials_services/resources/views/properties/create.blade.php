<form action="{{ route('imoveis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Título do Imóvel</label><br>
    <input type="text" name="title" id="title"><br><br>

    <label for="rental_price">Preço de Locação</label><br>
    <input type="text" name="rental_price" id="rental_price"><br><br>

    <label for="cover">Imagem de destaque</label><br>
    <input type="file" name="cover" id="cover"><br><br>

    <button type="submit">Gravar imóvel</button>

</form>