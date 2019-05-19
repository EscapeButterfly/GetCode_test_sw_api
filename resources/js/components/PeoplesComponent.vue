<template>
    <div>
        <h1>Search people by planets</h1>
        <br/>
        <div class="row">
            <div class="col-md-2">
                <multiselect v-model="searchWorld" :options="worlds" label="name" track-by="name" :searchable="false"
                             :close-on-select="true"
                             :show-labels="false" placeholder="Pick a planet">
                </multiselect>
            </div>
            <div>
                <button class="btn btn-primary" v-on:click="search()">Search</button>
            </div>
        </div>
        <br/>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Films</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="people in data.data" v-bind:key="people.id">
                <td>{{ people.id }}</td>
                <td>{{ people.name }}</td>
                <td>{{ getFilmNames(people.films) }}</td>
            </tr>
            </tbody>
        </table>
        <div>
            <pagination :data="data"
                        @pagination-change-page="getPageData">
            </pagination>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        components: {
            Multiselect
        },
        data() {
            return {
                data: {
                    id: null,
                    current_page: null,
                    data: [],
                    first_page_url: null,
                    last_page_url: null,
                    next_page_url: null,
                    path: null,
                    per_page: null,
                    prev_page_url: null,
                    to: null,
                    total: null
                },
                worlds: [],
                searchWorld: null
            }
        },
        mounted() {
            this.getWorlds();
        },
        methods: {
            search: function () {
                let uri = `http://localhost:3088/sw/people/world/${this.searchWorld.id}`;
                this.axios.get(uri)
                    .then((response) => {
                        this.data = response.data
                    })
            },
            getPageData: function (page = 1) {
                this.axios.get(this.data.first_page_url.slice(0, -1) + page)
                    .then((response) => {
                        this.data = response.data
                    })
            },
            getWorlds: function () {
                let uri = 'http://localhost:3088/sw/homeworlds/';
                this.axios.get(uri)
                    .then((response) => {
                        this.worlds = response.data
                    })
            },
            getFilmNames: function (films) {
                let filmsString = [];
                films.forEach(function (film) {
                    filmsString.push(film.title)
                });
                return filmsString.join(', ');
            }
        }
    }
</script>