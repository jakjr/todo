<template>
    <ul class="sub-menu" :style="[isOpen ? {'display':'block !important'} : {'display' : 'none !important'}]">

        <li v-for="submenu in menu.items" :class="{ 'open active': isActive(submenu) }">
            <Link v-if=submenu.inertiajs :href=submenu.link>
                <i :class=submenu.icon></i>
                <span class="title">{{ submenu.title }}</span>
            </Link>

            <a v-else :href=submenu.link>
                <i :class=submenu.icon></i>
                <span class="title">{{ submenu.title }}</span>
            </a>
        </li>
    </ul>


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
        },
        methods: {
            isActive(menu) {

                if (this.$page.url.startsWith(menu.link)) {
                    return true;
                }

                return false;
            }
        }

    }

</script>