// LivroComponent.vue

<template>
  <div>
      <h1>Livros</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createLivro' }" class="btn btn-primary">Adicionar Livro</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Subtitulo</th>
                <th>Item Autor</th>
                <th>Item Ano Lançamento</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="livro in livros" :key="livro.id">
                    <td>{{ livro.id }}</td>
                    <td>{{ livro.nome }}</td>
                    <td>{{ livro.subtitulo }}</td>
                    <td>{{ livro.autor }}</td>
                    <td>{{ livro.ano_lancamento }}</td>
                    <!-- <td><router-link :to="{}" class="btn btn-primary">Edit</router-link></td> -->
                    <!-- <td><button class="btn btn-danger">Delete</button></td> -->
                    <td><router-link :to="{name: 'editLivro', params: { id: livro.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteLivro(livro.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
        
  </div>
</template>

<script>
  export default {
      data() {
        return {
          livros: [],
          pagination: []
        }
      },
      created() {
      let uri = 'http://127.0.0.1:8000/api/livros';
        this.axios.get(uri).then(response => {
        this.livros = response.data.data;
      });
    },
    methods: {
        deleteLivro(id)
        {
            let uri = `http://127.0.0.1:8000/livro/delete/${id}`;
            this.axios.delete(uri).then(response => {
                this.livros.splice(this.livros.indexOf(id), 1);
            });
        }
    }
  }
</script>