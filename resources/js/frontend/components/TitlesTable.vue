<template>
    <table v-if="titles" class="table table-striped frontend-table">
        <thead>
        <tr>
            <th scope="col">Títulos</th>
            <th scope="col">Ano</th>
            <th v-if="table ==='movies'" scope="col">Tempo</th>
            <th scope="col">Rating</th>
            <th scope="col">Categoria 1</th>
            <th scope="col">Categoria 2</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="title in titles" :key="title.id">
            <td><a class="table-link" href="#" @click="toPage(title)">{{ title.title }}</a></td>
            <td>{{ title.year }}</td>
            <td v-if="table ==='movies'">{{ title.time | strTime }}</td>
            <td>
                <i v-for="r in title.rating" class="fas fa-star text-orange"></i>
                <i v-for="r in (5 - title.rating)" class="far fa-star text-orange"></i>
            <td>{{ title.category_1 }}</td>
            <td>{{ title.category_2 }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "TitlesTable",
    computed: {
        table() {
            return this.$store.getters.getTable
        },
        titles() {
            return this.$store.getters.getTitles
        }
    },
    methods: {
        toPage(title) {

        }
    }
}
</script>

<style scoped>
.table-striped > tbody > tr:nth-child(odd) > td,
.table-striped > tbody > tr:nth-child(odd) > th {
    background-color: #e7f7ff;
}
</style>
