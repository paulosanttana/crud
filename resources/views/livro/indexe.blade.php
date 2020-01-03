@extends('livro.template')

@section('content')
<section>
    <h2 class="mt-5">Novo Livro</h2>

    <div class="row">

        <div class="col-6">
            <p>
                <form action="#" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Digite nome do livro">
                    </div>
                    <div class="form-group">
                        <label for="subtitulo">Subtítulo</label>
                        <input type="text" class="form-control" id="subtitulo" placeholder="Digite subtítulo do livro">
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" placeholder="Autor do livro">
                    </div>
                    <div class="form-group">
                        <label for="ano_lancamento">Ano de Lançamento</label>
                        <input type="text" class="form-control" id="ano_lancamento"
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