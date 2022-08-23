<template>
    <div>
        <h2 class="mb-4">
            Boolpress
        </h2>
        <div class="row g-3">
            <Card v-for="post in posts" :key="post.id" :post="post" class="col-sm-6 col-md-4" />
        </div>
        <nav aria-label="...">
            <ul class="pagination pagination-sm d-flex justify-content-center mt-4">
                <li class="page-item">
                    <span class="page-link">
                        Previous
                    </span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        1
                    </a>
                </li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        2
                    </span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        3
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        Next
                    </a>
                </li>
            </ul>
        </nav>
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
                //console.log(response);
            })
            .catch(error => console.log('Error'));
    }
}
</script>

<style lang="scss" scoped>
    @import 'bootstrap/scss/bootstrap';
</style>
