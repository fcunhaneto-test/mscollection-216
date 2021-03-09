<template>
    <div class="container-md mb-5">
        <div class="row justify-content-center">
            <div v-if="is_table" class="col">
                <h1>{{ header }} {{ subheader }}</h1>
                <titles-paginate :pages="pages"></titles-paginate>
                <titles-table @showTitle="showPage($event)"></titles-table>
            </div>

        </div>
        <title-show v-if="!is_table" :title="title" @viewTable="is_table = !is_table"></title-show>
    </div>
</template>

<script>
import TitlesPaginate from "./components/TitlesPaginate";
import TitlesTable from "./components/TitlesTable";
import TitleShow from "./components/TitleShow";

export default {
    name: "Titles",
    components: {
        TitlesPaginate,
        TitlesTable,
        TitleShow
    },
    data() {
        return {
            pages: null,
            is_table: true,
            title: null
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
        showPage(event) {
            this.is_table = false
            this.title = event
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
