@extends('livro.template')

@section('content')
<h2 class="mt-5">Lista Livros</h2>
<table class="table table-striped table-hoved">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Subtítulo</th>
            <th>Autor</th>
            <th>Ano Lançamento</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{$livro->nome}}</td>
            <td>{{$livro->subtitulo}}</td>
            <td>{{$livro->autor}}</td>
            <td>{{ date('d/m/Y', strtotime($livro->ano_lancamento)) }}</td>
            <td>
                <form action="{{ route('livro.destroy', ['id' => $livro->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('livro.show', ['id' => $livro->id]) }}" class="btn btn-success">Editar</a>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<section>
    <div class="d-flex">
        {{ $livros->links()}} &nbsp; &nbsp; <p class="d-flex align-items-end">Página: {{ $livros->currentPage() }}</p>
    </div>
</section>

<section>


    <h2 class="mt-5">Novo Livro</h2>

    <div class="row">

        <div class="col-6">
            <p>
                <form action=" {{ route('livro.store') }}" method="post" autocomplete="off">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            placeholder="Digite nome do livro">
                    </div>
                    <div class="form-group">
                        <label for="subtitulo">Subtítulo</label>
                        <input type="text" class="form-control" id="subtitulo" name="subtitulo"
                            placeholder="Digite subtítulo do livro">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor do livro">
                    </div>
                    <div class="form-group">
                        <label for="ano_lancamento">Ano de Lançamento</label>
                        <input type="date" class="form-control" id="ano_lancamento" name="ano_lancamento"
                            placeholder="Ano de lançamento do livro">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </p>
        </div>

        <div class="col-6 align-self-center">
            <div id="imagemLivro">
                <p class="text-center">
                    <img src="img/livro3.jpg" alt="Meu livro" srcset="">
                </p>
            </div>
        </div>

    </div>
</section>
@endsection