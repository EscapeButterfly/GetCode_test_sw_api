<template>
    <h1>Peoples</h1>
    <br/>
    <div class="row">
        <div class="col-md-4">
            <label class="typo__label">Select world</label>
            <multiselect v-model="value" :options="options" :searchable="false" :close-on-select="false"
                         :show-labels="false" placeholder="Pick a world">
            </multiselect>
        </div>
    </div>
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
            <td>{{ people.films }}</td>
        </tr>
        </tbody>
    </table>
    <div>
        <pagination :data="data"
                    @pagination-change-page="getPageData">
        </pagination>
    </div>
</template>

<script>
    export default {
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
                }
            }
        },
        mounted() {
            console.log('Index Component mounted.')
        },
        methods: {
            getPageData: function (page = 1) {
                this.axios.get(this.data.first_page_url.slice(0, -1) + page)
                    .then((response) => {
                        this.data = response.data
                    })
            }
        }
    }
</script>