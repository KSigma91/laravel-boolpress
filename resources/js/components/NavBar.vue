<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                    <ul class="navbar-nav d-flex gap-3">
                        <li v-for="(navItem, index) in navItems" :key="index"
                         class="nav-item">
                            <router-link :to="{name: navItem.routeName}" class="nav-link active">
                                <small>{{ navItem.label }}</small>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'NavBar',
    data() {
        return {
            navItems: [
                {
                    label: 'Home',
                    routeName: 'home'
                },
                {
                    label: 'Blog',
                    routeName: 'blog'
                },
                {
                    label: 'About',
                    routeName: 'about'
                },
                {
                    label: 'Contacts',
                    routeName: 'contacts'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
