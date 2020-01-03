// CreatePost.vue

<template>
  <div>
    <h1>Adicionar Novo Livro</h1>
    <form @submit.prevent="addLivro">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" class="form-control" v-model="livro.nome" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Subtitulo:</label>
            <input type="text" class="form-control" v-model="livro.subtitulo" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Autor:</label>
            <input type="text" class="form-control" v-model="livro.autor" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Body:</label>
            <input type="date" class="form-control" v-model="livro.ano_lancamento" />
          </div>
        </div>
      </div>
      <br />
      <div class="form-group">
        <button class="btn btn-primary">Adicionar</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      livro: {}
    };
  },
  methods: {
    addLivro() {
      let uri = "http://127.0.0.1:8000/api/post/createLivro";
      this.axios.post(uri, this.livro).then(response => {
        this.$router.push({ name: "livros" });
      });
      // console.log(this.post);
    }
  }
};
</script>