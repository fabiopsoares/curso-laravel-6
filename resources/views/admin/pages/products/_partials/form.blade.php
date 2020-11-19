@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <input type="text" class="form-group" name="name" id="name" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" class="form-group" name="price" id="price" placeholder="Preço:" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" class="form-group" name="description" id="description" placeholder="Descrição" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" class="form-group" name="image id="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
