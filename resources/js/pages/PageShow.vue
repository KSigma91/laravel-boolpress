<template>
    <Page404 v-if="error404" />
    <div v-else-if="post">
        <h2 style="font-style: italic; color: #00585B">
            {{ post.title }}
        </h2>
        <small>
            <span style="font-style: italic; color: #a7a7a7">{{ post.user.name }}</span>
        </small>
        <img :src="post.image" :alt="post.title" class="d-block img-fluid w-75 mt-2">
        <div class="list-tags">
            <div v-for="tag in post.tags" :key="tag.id"
            class="tag">
                <small style="font-size: 0.7em">
                    Category: <span style="font-style: italic">{{ post.category.name }} - </span>
                    Tag: <span style="font-style: italic">{{ tag.name }}</span>
                </small>

            </div>
        </div>

        <p class="mt-3 fs-5">
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
        slug: String
    },
    data() {
        return {
            error404: false,
            post: null
        }
    },
    created() {
        axios.get('/api/posts/' + this.slug)
            .then(response => {
                if (response.data.success) {
                    this.post = response.data.result;
                } else {
                    this.error404 = true;
                }
            });
    }
}
</script>

<style lang="scss" scoped>

</style>
