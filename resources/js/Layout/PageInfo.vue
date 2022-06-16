<template>
    <div class="row pageinfo" v-if="pageTitle">
        <div class="col-md-6 ps-4 py-2 d-flex align-items-center">
            <h4 class="page-title mb-0" style="flex: 1">
                <Link v-if="back" :href="back" style="color: #248EAE">
                    <i class="fa fa-arrow-left"></i>
                </Link>

                <i v-if="pageIcon" :class="[pageIcon, 'ms-2']"></i>

                {{ pageTitle }}
            </h4>
        </div>
        <div class="col-md-6 py-1 d-flex align-items-center justify-content-end">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
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
