<template>
  <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-1">

      <div
        class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center py-2">

        <div class="d-flex align-items-center">
        </div>

        <div class="collapse-close d-md-none">
          <a aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"
            data-bs-target="#sidebarMenu"
            data-bs-toggle="collapse" href="#sidebarMenu">
            <i class="fa fa-times-circle fa-3x"></i>
          </a>
        </div>
      </div>

      <div class="pt-1 d-none d-md-block" style="height: 76px">
        <img :src=$volt.config.layout.logo>
      </div>

      <ul class="nav flex-column pt-3 pt-md-0">

        <li class="nav-item">
          <span class="sidebar-text" v-if="$volt.auth.user">{{ $volt.auth.user.name }}João Alfredo</span>
          <span class="sidebar-text">João Alfredo</span>
        </li>

        <li v-for="menu in menus" :class="['nav-item', { active: isActive(menu.id) }]">

          <Link v-if="!menu.subitems" :href="menu.url" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon me-3">
                            <i :class="menu.icon"></i>
                        </span>
            <span class="mt-1 ms-1 sidebar-text">
                            {{ menu.title }}
              <!-- {{ $page.component }} {{ menu.component }}-->
                        </span>
          </Link>

          <div v-else>
                        <span :aria-expanded="isSubmenuActive(menu.subitems) ? 'true' : 'false'" :class="{ collapsed: isSubmenuActive(menu.subitems)}" :data-bs-target="'#' + menu.id" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse">
                            <span>
                                <span class="sidebar-icon me-3">
                                    <i :class="menu.icon"></i>
                                </span>
                                <span class="sidebar-text">
                                    {{ menu.title }}
                                </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" fill-rule="evenodd">
                                    </path>
                                </svg>
                            </span>
                        </span>

            <div :id="menu.id" :class="{show: isSubmenuActive(menu.subitems)}" aria-expanded="false" class="multi-level collapse" role="list">
              <ul class="flex-column nav">
                <li v-for="subitem in menu.subitems" :class="['nav-item', { active: isActive(subitem.id) }]">
                  <Link :href="subitem.url" class="nav-link">
                                        <span class="mt-1 ms-1 sidebar-text">
                                            {{ subitem.title }}
                                        </span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>


        </li>


        <!--                <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">-->
        <!--                    <a href="/dashboard" class="nav-link">-->
        <!--                        <span class="sidebar-icon">-->
        <!--                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"-->
        <!--                                 xmlns="http://www.w3.org/2000/svg">-->
        <!--                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>-->
        <!--                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>-->
        <!--                            </svg>-->
        <!--                        </span>-->
        <!--                        <span class="sidebar-text">Dashboard</span>-->
        <!--                    </a>-->
        <!--                </li>-->


        <!--                                <li class="nav-item active">-->
        <!--                                    <span class="nav-link collapsed d-flex justify-content-between align-items-center"-->
        <!--                                          data-bs-toggle="collapse"-->
        <!--                                          data-bs-target="#submenu-laravel" aria-expanded="true">-->
        <!--                                        <span>-->
        <!--                                            <span class="sidebar-icon"><i class="fab fa-laravel me-2"-->
        <!--                                                                          style="color: #fb503b;"></i></span>-->
        <!--                                            <span class="sidebar-text" style="color: #fb503b;">Laravel Examples</span>-->
        <!--                                        </span>-->
        <!--                                        <span class="link-arrow">-->
        <!--                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"-->
        <!--                                                 xmlns="http://www.w3.org/2000/svg">-->
        <!--                                                <path fill-rule="evenodd"-->
        <!--                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"-->
        <!--                                                      clip-rule="evenodd">-->
        <!--                                                </path>-->
        <!--                                            </svg>-->
        <!--                                        </span>-->
        <!--                                    </span>-->

        <!--                                    <div class="multi-level collapse show" role="list" id="submenu-laravel" aria-expanded="false">-->
        <!--                                        <ul class="flex-column nav">-->
        <!--                                            <li class="nav-item {{ Request::segment(1) == 'profile' ? 'active' : '' }} active">-->
        <!--                                                <a href="/profile" class="nav-link">-->
        <!--                                                    <span class="sidebar-text">Profile</span>-->
        <!--                                                </a>-->
        <!--                                            </li>-->
        <!--                                            <li class="nav-item {{ Request::segment(1) == 'users' ? 'active' : '' }}">-->
        <!--                                                <a href="/users" class="nav-link">-->
        <!--                                                    <span class="sidebar-text">User management</span>-->
        <!--                                                </a>-->
        <!--                                            </li>-->
        <!--                                        </ul>-->
        <!--                                    </div>-->
        <!--                                </li>-->
      </ul>
    </div>
  </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  name: "Sidebar",
  components: {
    Link,
  },

  props: {
    activeItem: String
  },

  data: function () {
    return {
      menus: this.$volt.menu,
    }
  },

  methods: {
    isActive(id) {
      return id === this.activeItem;
    },

    isSubmenuActive(subitems) {
      let subitemsObj, activeItem;

      subitemsObj = JSON.parse(JSON.stringify(subitems));

      activeItem = this.activeItem

      return subitemsObj.some(function (item) {
        return item.id === activeItem
      });
    }
  }

}
</script>

<style scoped>

</style>
