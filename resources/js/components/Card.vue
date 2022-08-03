<template>
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="card h-100 w-100 d-flex">
            <img :src="post.image" class="card-img-top" :alt="post.title">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">
                    <strong>{{ post.title }}</strong>
                </h5>
                <p class="card-text">
                    <small>{{ post.excerpt }}</small>
                </p>
                <router-link :to="{name: 'show', params: {slug: post.slug}}" class="btn btn-outline-primary btn-sm w-50">
                    Read
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        post: Object
    }
}
</script>

<style lang="scss" scoped>

</style>
