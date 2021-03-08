<template>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col">
                <h1>{{ header }} {{ subheader }}</h1>
                <titles-paginate :pages="pages"></titles-paginate>
                <titles-table></titles-table>
            </div>
        </div>
    </div>
</template>

<script>
import TitlesPaginate from "./components/TitlesPaginate";
import TitlesTable from "./components/TitlesTable";

export default {
    name: "Titles",
    components: {
        TitlesPaginate,
        TitlesTable,
    },
    data() {
        return {
            pages: null,
        }
    },
    computed: {
        table() {
            return this.$store.getters.getTable
        },
        header() {
            return this.$store.getters.getHeader
        },
        subheader() {
            return this.$store.getters.getSubHeader
        },
        channel() {
            return this.$store.getters.getChannel
        },
        pp() {
            return this.$store.getters.getPp
        }
    },
    methods: {
        startTitles() {
            axios.get(`/api/${this.table}/titles-start/${this.channel}/${this.pp}`).then(response => {
                this.pages = response.data[0]
                this.$store.commit('SET_TITLES', response.data[1])
            })
        },
    },
    beforeMount() {
        this.startTitles()
    },
    updated() {
        this.startTitles()
    },
}
</script>

<style scoped>

</style>
