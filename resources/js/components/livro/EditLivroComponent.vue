// EditComponent.vue

<template>
  <div>
    <h1>Edit Livro</h1>
    <form @submit.prevent="updateLivro">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nome Livro:</label>
            <input type="text" class="form-control" v-model="livro.nome">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label> Subtitulo:</label>
              <input type="text" class="form-control" v-model="livro.subtitulo">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label> Autor:</label>
              <input type="text" class="form-control" v-model="livro.autor">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label> Ano Lançamento:</label>
              <input type="data" class="form-control" v-model="livro.ano_lancamento">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          livro: {}
        }
      },
      created() {
        let uri = `http://127.0.0.1:8000/api/livros/editLivro/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.livro = response.data;
        });
      },
      methods: {
        updateLivro() {
          let uri = `http://127.0.0.1:8000/api/livro/update/${this.$route.params.id}`;
          this.axios.post(uri, this.livro).then((response) => {
            this.$router.push({name: 'livros'});
          });
        }
      }
    }
</script>