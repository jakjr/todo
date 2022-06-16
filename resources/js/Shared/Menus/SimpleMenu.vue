<template>

    <Link v-if=menu.inertiajs :href=menu.link>
        <i :class=menu.icon></i>
        <span class="title">{{ menu.title }}</span>
        <span v-if="menu.items" :class="['arrow', { open: isOpen }]">&nbsp;</span>
    </Link>

    <a v-else :href=menu.link>
        <i :class=menu.icon></i>
        <span class="title">{{ menu.title }}</span>
        <span v-if="menu.items" :class="['arrow', { open: isOpen }]">&nbsp;</span>
    </a>

</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3'

    export default {
        components: {
            Link,
        },
        props: {
            menu: Object,
            isOpen: Boolean
        }
    }

</script>