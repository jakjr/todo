<template>

    <!-- Button trigger modal -->
    <button :class=buttonClass :data-bs-target="bsId" data-bs-toggle="modal" type="button">
        {{ value }}
    </button>

    <!-- Modal -->
    <div :id="id" aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">
                        <slot name="title"></slot>
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </slot>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Modal",
    props: {
        id: {
            type: String,
        },
        value: {
            type: String,
        },
        buttonClass: {
            type: String,
            default: 'btn btn-primary'
        }
    },
    computed: {
        bsId() {
            return '#' + this.id
        }
    }
}
</script>