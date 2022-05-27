<template>
  <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col" v-for="(post, index) in posts" :key="index">
            <div class="card h-100">
                <h2>{{post.title}}</h2>
                <small class="mb-4">{{`${post.name} - ${post.phone}`}}</small>
                <p>{{post.content}}</p>
                <router-link :to="{name: 'show', params : {slug: post.slug}}">Go to show</router-link>
            </div>
          </div>
      </div>
</template>

<script>
export default {
    name: 'Index',
    data(){
        return {
            posts: []
        }
    },
    created(){
        Axios.get(`${window.location.origin}/api/posts`)
            .then(res => {
                this.posts = res.data.posts.data;
            })
    }
}
</script>

<style>

</style>
