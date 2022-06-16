<template>
    <span>
        <i :class="icon" @click="$emit('updateOrderBy', column, direction)"></i>
    </span>
</template>

<script>
export default {
    name: "OrderBy",
    props: {
        column: String,
        direction: String,
        icon: String
    },
    emits: ['updateOrderBy']
}
</script>

<style scoped>
.active {
    color: #E99002;
}
span {
    cursor: pointer;
}
</style>