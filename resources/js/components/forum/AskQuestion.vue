<template>
    <v-container>
        <v-form @submit.prevent="create">
           
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>
            <span class="red--text" v-if="errors.title">{{ errors.title[0]}} <br></span>

           <v-autocomplete
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                autocomplete
           >
           </v-autocomplete>
           <span class="red--text" v-if="errors.category_id">{{ errors.category_id[0]}} <br></span>

           <markdown-editor v-model="form.body"></markdown-editor>
           <span class="red--text" v-if="errors.body">{{ errors.body[0]}}</span>

            <v-btn color="green" type="submit" :disabled="disabled">
                Ask Question
            </v-btn>
        </v-form>
    </v-container>
</template>
<script>
    export default {
        data() {
            return {
                form:{
                    title:null,
                    category_id:null,
                    body:null
                },
                categories: [],
                errors:{}
            };
        },
        computed:{
            disabled(){
                return !(this.form.title && this.form.body && this.form.category_id)
            }
        },
        created(){
            axios.get('/api/category')
            .then((res) => {
                this.categories = res.data.data
            }).catch((err) => {
            });
        },
        methods: {
            create() {
                axios.post('/api/question', this.form)
                .then((res) => {
                    this.$router.push(res.data.path)
                }).catch(err => {
                    this.errors = err.response.data.errors
                });
            }
        },
    };
</script>
