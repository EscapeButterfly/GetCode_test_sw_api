<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Info about {{ this.people.name }}</div>
                <div class="card-body">

                    <!--ID: {{ people.id }}
                    Name: {{ people.name }}
                    Home world: {{ people.homeworld.name }}
                    Gender: {{ people.gender }}
                    Height: {{ people.height }}
                    Mass: {{ people.mass }}
                    Hair color: {{ people.hair_color }}
                    Birth year: {{ people.birth_year }}
                    Created: {{ people.created }}
                    Url: {{ people.url }}-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
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
                    url: null
                }
            }
        },
        created() {
            this.getData()
        },
        methods: {
            getData: function () {
                let uri = `http://localhost:3088/sw/people/${this.$route.params.id}`;
                this.axios.get(uri)
                    .then((response) => {
                        this.people = response.data
                    })
            }
        }
    }
</script>