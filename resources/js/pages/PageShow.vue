<template>
    <Page404 v-if="error404" />
    <div v-else-if="post">
        Sono la show di {{ post }}

        <h2>
            {{ post.title }}
        </h2>
        <h3>
            {{ post.user.name }}
        </h3>
        <h3>
            {{ post.category.name }}
        </h3>
        <div class="list-tags">
            <div v-for="tag in post.tags" :key="tag.id"
            class="tag">
                {{ tag.name }}
            </div>
        </div>
        <img :src="post.image" :alt="post.title">
        <p>
            {{ post.content }}
        </p>
    </div>
</template>

<script>
import axios from 'axios'
import Page404 from './Page404.vue'

export default {
    name: 'PageShow',
    components: {
        Page404
    },
    props: {
        post: String
    },
    data() {
        return {
            error404: false,
            slug: null
        }
    },
    created() {
        axios.get('/api/posts/' + this.slug)
            .then(response => {
                if (response.data.response) {
                    this.post = response.data.response;
                } else {
                    this.error404 = true;
                }
            });
    }
}
</script>

<style lang="scss" scoped>

</style>
