<h1>Lista de Contato</h1>

@if(count($lista) > 0)
<ul>
    @foreach($lista as $item)
    <li>{{ $item->nome }} - {{ $item->telefone }} - <a href="delete/{{ $item->id }}">[x]</a></li>
    @endforeach
</ul>
@else
<h4>Não há itens</h4>
@endif

<hr>

<h4>Novo Contato</h4>
<form method="post">
    {{ csrf_field() }}
    Nome: <br>
    <input type="text" name="nome"><br><br>
    Telefone: <br>
    <input type="text" name="telefone"><br><br>
    <input type="submit" value="Adicionar">
</form>