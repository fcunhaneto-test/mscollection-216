<template>
    <router-view></router-view>
</template>

<script>
export default {
    name: "Index",
    props: {
        header: String,
        subheader: String,
        table: String,
    },
    created() {
        this.$store.commit('SET_TABLE', this.table)
        this.$store.commit('SET_HEADER', this.header)
        this.$store.commit('SET_SUB_HEADER', this.subheader)
        console.log('CHANNEL', this.$route.params.channel)
        this.$store.commit('SET_CHANNEL', this.$route.params.channel)
    }
}
</script>

<style scoped>

</style>
