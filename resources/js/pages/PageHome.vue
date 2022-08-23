<template>
    <div>
        <h1 class="mb-5">
            <big  style="color: #666666; font-size: 2em">
                Benvenuti in Boolpress
            </big>
        </h1>

        <div class="row g-2">
            <div v-for="post in posts" :key="post.slug"
            class="col-sm-6 col-md-6 col-lg-4 mt-2">
                <router-link :to="{name: 'show', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="img-fluid">
                </router-link>
            </div>
        </div>

        <div class="d-flex gap-1 w-50">
            <div v-for="post in posts" :key="post.slug"
            class="col-sm-6 col-md-6 col-lg-4 mt-5">
                <router-link :to="{name: 'show', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="img-fluid rounded-1">
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageHome',
    data() {
        return {
            posts: [],
        }
    },
    created() {
        axios.get('/api/posts/random')
            .then(response => {
                if (response.data.success) {
                    this.posts = response.data.result;
                }
            });
    }
}
</script>

<style lang="scss" scoped>

</style>
