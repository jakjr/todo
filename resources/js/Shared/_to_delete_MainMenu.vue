<template>
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">

                <div class="sidebar-toggler-userinfo">
                    <div class="sidebar-toggler-name">
                        Nome do Usuário
                        <!--
                        {{ $page.props.auth.usuario.nome }}
                        <div><a style="color: #FFFFFF" href="http://agov.d/perfil">Gestor</a></div>
                        -->
                    </div>

                </div>

            </li>
        </ul>

        <ul class="page-sidebar-menu">
            <li v-for="menu in menus" :class="{ 'open active': isOpen(menu) }">

                <SimpleMenu :menu="menu" :isOpen=isOpen(menu)></SimpleMenu>

                <CompoundMenu v-if=menu.items :menu="menu" :isOpen=isOpen(menu)></CompoundMenu>

            </li>

        </ul>
    </div>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3'
    import SimpleMenu from '@/Shared/Menus/SimpleMenu'
    import CompoundMenu from '@/Shared/Menus/CompoundMenu';

    export default {
        components: {
            Link,
            SimpleMenu,
            CompoundMenu
        },
        data: function () {
            return {
                menus: this.$page.props.menus,
            }
        },
        methods: {
            isOpen(menu) {

                if (this.$page.url.startsWith(menu.link)) {
                    return true;
                }

                if (!menu.items) {
                    return false;
                }

                return menu.items.some(submenu => this.$page.url.startsWith(submenu.link));
            }
        }
    }

</script>