<template>
    <div class="row justify-content-center">
        <div class="col-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="media bg-dark text-white p-2">
                    <img v-if="title.poster" :src="'../images/poster/' + title.poster" width="150" height="203"
                         alt="poster do filme">
                    <img v-else :src="'../images/poster/faker-poster.png'" width="150" height="203"
                         alt="poster do filme">
                    <div class="media-body  ml-4 pt-2">
                        <h2 class="text-white">{{ title.title }}</h2>
                        <p>
                            <span class="badge badge-success show-badge p-2">Ano: {{ title.year }}</span>
                            <span class="badge badge-success show-badge p-2 ml-3">Duração: {{ title.time | strTime }}</span>
                            <span class="badge badge-light show-badge p-2 ml-3">
                            <i v-for="$i in title.rating" class="fas fa-star text-orange"></i>
                            <i v-for="$i in (5-title.rating)" class="far fa-star"></i>
                        </span>
                        </p>
                        <p v-if="title.category_2" ><span class="badge badge-primary show-badge p-2">Categorias: {{ title.category_1 }},
                                    {{ title.category_2 }}</span></p>
                        <p v-else><span class="badge badge-primary show-badge p-2">Categoria: {{ title.category_1 }}</span>
                        </p>
                    </div>
                </div>
                <div class="card-body page-card-body">
                    <h4>Resumo:</h4>
                    <div class="summary">
                        {{ title.summary }}
                    </div>
                    <table v-if="prod_total > 0" class="table mt-3">
                        <thead>
                        <tr>
                            <th class="p-0"><h4>Diretor:</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="$p in producers">
                            <td>{{ $p.name }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table v-if="cast_total > 0" class="table mt-3">
                        <thead>
                        <tr>
                            <th class="p-0"><h4>Ator/Personagem</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="$ac in cast">
                                <td>{{ $ac.actor }}</td>
                                <td>{{ $ac.character }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1">
            <button class="btn btn-primary" @click="viewTable"><i class="fas fa-undo-alt"></i></button>
        </div>
    </div>
</template>

<script>
export default {
    name: "TitleShow",
    props: {
        title: Object
    },
    data() {
        return {
            cast: [],
            cast_total: 0,
            producers: [],
            prod_total: 0,
        }
    },
    computed: {
        table() {
            return this.$store.getters.getTable
        }
    },
    methods: {
        viewTable() {
            this.$emit('viewTable')
        }
    },
    beforeMount() {
        axios.get(`/api/${this.table}/cast/${this.title.id}`).then(response => {
            this.cast = response.data
            this.cast_total = this.cast.length
            console.log('Total Cast', this.cast_total)
            console.log('Cast', this.cast)
        }).catch(errors => console.log(errors))
        axios.get(`/api/${this.table}/producers/${this.title.id}`).then(response => {
            this.producers = response.data
            this.prod_total = this.producers.length
            console.log('Total Producers', this.prod_total)
            console.log('Producers', this.producers)
        }).catch(errors => console.log(errors))
    }
}
</script>

<style scoped>
.badge {
    font-size: .9rem;
    font-weight: normal;
}
.summary {
    font-size: 1rem;
}
</style>
