<template>
    <div class="row" v-if="pageTitle">
        <div class="col-md-12 well cab_interno">
            <div style="display: flex;">
                <h3 class="page-title" style="flex: 1">

                    <a v-if="back" :href="back" style="text-decoration: none">
                        <i class="fa fa-arrow-left x-bigger"></i>
                    </a>

                    <Link v-if="inertiaBack" :href="inertiaBack">
                        <i class="fa fa-arrow-left x-bigger"></i>
                    </Link>

                    <i v-if="pageIcon" :class=pageIcon></i>
                    {{ pageTitle }}
                </h3>
            </div>
        </div>
    </div>
</template>

<script>
    import {Link} from "@inertiajs/inertia-vue3";

    export default {
        name: "PageInfo",
        components: {
            Link
        },
        props: [
            'pageTitle',
            'pageIcon',
            'back',
            'inertiaBack',
        ]
    }
</script>

<style scoped>

</style>