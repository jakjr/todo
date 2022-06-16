<template>

    <Head>
        <title></title>
        <meta content="test..." head-key="description" type="description">
    </Head>

    <div class="container">

        <slot/>

    </div>

</template>

<script>
import {useToast} from "vue-toastification";
import {Inertia} from '@inertiajs/inertia'
import {Head} from '@inertiajs/inertia-vue3'

export default {

    setup() {
        const toast = useToast();
        return {toast}
    },
    watch: {
        '$page.props.flash.notification': {
            handler() {

                // Dismiss all opened toast immediately
                this.toast.clear();

                if (!this.$page.props.flash.notification) {
                    return;
                }

                this.$page.props.flash.notification.forEach((notification) => {
                    //console.log(notification);

                    this.toast(
                        String(notification.message), {
                            type: notification.level == 'danger' ? 'error' : notification.level// or "success", "error", "default", "info" and "warning"
                        }
                    );
                })
            },
            deep: true,
        },
    }
}
</script>
