<template>

<!--    <nav v-if="links.links > 3" aria-label="Page navigation">-->
        <ul class="pagination">
            <li v-for="link in links.links" :class="{ 'active': link.active, 'disabled': !link.url }" class="page-item">
                <Link
                    :href="link.url"
                    class="page-link"
                    v-html="link.label"/>
            </li>
        </ul>
<!--    </nav>-->

</template>

<script>

import {Link} from '@inertiajs/inertia-vue3'

export default {

    components: {
        Link
    },

    props: {
        links: Object,
    },
}
</script>
