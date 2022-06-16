<template>
    <nav class="navbar navbar-dark navbar-theme-primary px-1 py-1 col-12 d-lg-none">
        <div class="d-flex gap-1 align-items-center">
            <a class="navbar-brand me-lg-5" href="/index.html">
                <img class="navbar-brand-dark" src="/assets/img/brand/light.svg" alt="Volt logo"/>
            </a>
            <div class="d-flex flex-column align-items-start">
                <div class="app_title1">{{ $volt.config.layout.app_title1 }}</div>
                <div class="app_title2">{{ $volt.config.layout.app_title2 }}</div>
                <div class="app_title3">{{ $volt.config.layout.app_title3 }}</div>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Nav"
    }
</script>

<style scoped>

</style>
