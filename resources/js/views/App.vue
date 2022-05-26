<template>
  <div class="container">
      <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col" v-for="(post, index) in posts" :key="index">
          <div class="card h-100">
              <h2>{{post.title}}</h2>
              <small class="mb-4">{{`${post.name} - ${post.phone}`}}</small>
              <p>{{post.content}}</p>
          </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'App',
    data(){
        return {
            posts: []
        }
    },
    created(){
        Axios.get(`${window.location.origin}/api/posts`)
            .then(res => {
                console.log(res.data.posts.data)
                this.posts = res.data.posts.data;
            })
    }
}
</script>

<style>

</style>
