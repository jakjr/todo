<template>

</template>

<script>
    import FlashMessages from '@/Shared/FlashMessages'

    export default {
        components: {
            FlashMessages,
        },
        watch: {
            '$page.props.flash.notification': {
                handler() {

                    // Dismiss all opened toast immediately
                    ////this.$toast.clear();

                    // this.$toast.open('You did it!');

                    // if(!this.$page.props.flash.notification) {
                    //     return;
                    // }

                    // this.$page.props.flash.notification.forEach((notification) => {
                    //     // this.$toast.open({
                    //     //     message: notification.message,
                    //     //     type: notification.level
                    //     // });
                    // })
                },
                deep: true,
            },
        }
    }
</script>
