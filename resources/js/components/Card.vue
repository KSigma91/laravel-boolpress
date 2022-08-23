<template>
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="card h-100 w-100 d-flex">
            <img :src="post.image" class="card-img-top" :alt="post.title">
            <div class="card-body d-flex flex-column justify-content-between">
                <h4 class="card-title" style="color: #2A2A31">
                    <strong>{{ post.title }}</strong>
                </h4>
                <p class="card-text" style="color: #666666">
                    <small>{{ post.excerpt }}</small><br><br>
                    <small style="font-style: italic; color: #666666" class="mb-2">
                        By {{ post.user.name }}
                    </small>
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
