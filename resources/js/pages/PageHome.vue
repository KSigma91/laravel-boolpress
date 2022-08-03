<template>
    <div>
        <h1 class="mb-5">
            <big>
                Benvenuti in Boolpress
            </big>
        </h1>

        <div class="row g-3">
            <!-- <Card v-for="post in posts" :key="post.id" class="col-sm-6 col-md-4" :post="post"/> -->
            <div v-for="post in posts" :key="post.slug"
            class="col-sm-6 col-md-6 col-lg-4">
                <router-link :to="{name: 'show', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="img-fluid rounded-2">
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
