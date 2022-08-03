<template>
    <div>
        <h2 class="mb-4">
            Boolpress
        </h2>
        <div class="row g-3">
            <Card v-for="post in posts" :key="post.id" class="col-sm-6 col-md-4" :post="post"/>
        </div>
    </div>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    name: 'PageBlog',
    components: {
        Card
    },
    data() {
        return {
            baseUrl: window.location.origin,
            posts: []
        }
    },

    created() {
        axios.get('/api/posts')
            .then(response => {
                this.posts = response.data.response.data;
                console.log(response);
            })
            .catch(error => console.log('Error'));
    }
}
</script>

<style lang="scss" scoped>
    @import 'bootstrap/scss/bootstrap';
</style>
