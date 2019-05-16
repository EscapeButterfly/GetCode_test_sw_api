<template>
    <div>
        <h1>Add Star Wars character</h1>
        <form @submit.prevent="checkFormOnNull">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" v-model="people.name">
                        <span v-if="validationErrors.name" class="text-danger"> {{ validationErrors.name[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Height:</label>
                        <input type="number" class="form-control" v-model="people.height">
                        <span v-if="validationErrors.height"
                              class="text-danger"> {{ validationErrors.height[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Mass:</label>
                        <input type="number" class="form-control" v-model="people.mass">
                        <span v-if="validationErrors.mass" class="text-danger"> {{ validationErrors.mass[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Url:</label>
                        <input type="text" class="form-control" v-model="people.url">
                        <span v-if="validationErrors.url" class="text-danger"> {{ validationErrors.url[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Hair color:</label>
                        <input type="text" class="form-control" v-model="people.hair_color">
                        <span v-if="validationErrors.hair_color"
                              class="text-danger"> {{ validationErrors.hair_color[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Birth year:</label>
                        <input type="text" class="form-control" v-model="people.birth_year">
                        <span v-if="validationErrors.birth_year"
                              class="text-danger"> {{ validationErrors.birth_year[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Created:</label>
                        <input type="date" class="form-control" v-model="people.created">
                        <span v-if="validationErrors.created"
                              class="text-danger"> {{ validationErrors.created[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Home world:</label>
                        <select class="form-control" v-model="people.homeworld_id">
                            <option v-for="item in homeWorlds" :value="item.id">{{ item.name }}</option>
                        </select>
                        <span v-if="validationErrors.homeworld_id" class="text-danger"> {{ validationErrors.homeworld_id[0] }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Gender:</label>
                        <select class="form-control" v-model="people.gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="n/a">N/A</option>
                        </select>
                        <span v-if="validationErrors.gender"
                              class="text-danger"> {{ validationErrors.gender[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="typo__label">Films</label>
                    <multiselect v-model="people.films" :options="films" :multiple="true" :close-on-select="false"
                                 :clear-on-select="false" :preserve-search="true" placeholder="Select character films"
                                 label="title" track-by="title" :preselect-first="true">
                        <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                                class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span>
                        </template>
                    </multiselect>
                    <pre class="language-json"><code>{{ value  }}</code></pre>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
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
                people: {
                    name: null,
                    height: null,
                    mass: null,
                    hair_color: null,
                    birth_year: null,
                    gender: null,
                    homeworld_id: null,
                    created: null,
                    url: null,
                    films: []
                },
                validationErrors: {},
                homeWorlds: [],
                films: []
            }
        },
        mounted: function () {
            this.getHomeWorlds();
            this.getFilms();
        },
        methods: {
            addPost() {
                let uri = 'http://localhost:3088/sw/people/create';
                this.axios.post(uri, this.people)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    })
                    .catch(e => {
                        this.validationErrors = e.response.data.errors
                    })
            },
            getHomeWorlds() {
                let uri = 'http://localhost:3088/sw/homeworlds/';
                this.axios.get(uri)
                    .then((response) => {
                        this.homeWorlds = response.data
                    })
            },
            getFilms() {
                let uri = 'http://localhost:3088/sw/films/';
                this.axios.get(uri)
                    .then((response) => {
                        this.films = response.data
                    })
            },
            checkFormOnNull: function () {
                this.validationErrors = {};
                Object.keys(this.people).map(key => {
                    if (!this.people[key]) {
                        this.$set(this.validationErrors, key, ["The " + key + " field is required."])
                    }
                });

                if (Object.keys(this.validationErrors).length === 0) this.addPost();
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>