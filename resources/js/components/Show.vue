<template>
<div class="row">
    <h1 v-if="post">{{post.title}}</h1>
    <p v-if="post">{{post.content}}</p>
</div>
</template>

<script>

export default {
    name: 'Show',
    props: {
        slug: String
    },
    data(){
        return {
            post: null
        }
    },
    created() {
        Axios.get(`${window.location.origin}/api/posts/${this.slug}`)
            .then(res => this.post = res.data.post);
    }
}
</script>

<style>

</style>
