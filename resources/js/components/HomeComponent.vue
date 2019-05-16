<template>
    <div>
        <h1>Peoples</h1>
        <br/>
        <div class="row">
            <div class="col-md-2">
                <router-link :to="{ name: 'create' }" class="btn btn-primary">Add people</router-link>
            </div>
        </div>
        <br/>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Home world</th>
                <th>Gender</th>
                <th>Height</th>
                <th>Mass</th>
                <th>Hair color</th>
                <th>Birth year</th>
                <th>Created</th>
                <th style="width: 20%">Url</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="people in data.data" v-bind:key="people.id">
                <td>{{ people.id }}</td>
                <td>{{ people.name }}</td>
                <td>{{ people.homeworld.name }}</td>
                <td>{{ people.gender }}</td>
                <td>{{ people.height }}</td>
                <td>{{ people.mass }}</td>
                <td>{{ people.hair_color }}</td>
                <td>{{ people.birth_year }}</td>
                <td>{{ people.created }}</td>
                <td>{{ people.url }}</td>
                <td>
                    <router-link :to="{name: 'edit', params: { id: people.id, name: people.name }}" class="btn btn-primary">
                        Edit
                    </router-link>
                    <button class="btn btn-danger" v-on:click="">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

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
        created() {
            this.getData()
        },
        methods: {
            delete: function (people) {
                let uri = `http://localhost:3088/sw/people/${people.id}/delete`;
                this.axios.delete(uri)
                    .then((response) => {
                        this.data.data.splice(this.data.data.indexOf(people.id), 1);
                    })
            },
            getData: function () {
                let uri = 'http://localhost:3088/sw/people';
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
            }
        }
    }
</script>