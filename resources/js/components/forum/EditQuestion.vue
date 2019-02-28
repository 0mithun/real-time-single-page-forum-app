<template>
    <v-container>
        <v-card>
            <v-container>
                <v-form @submit.prevent="update">
                    <v-text-field
                        v-model="form.title"
                        label="Title"
                        type="text"
                        required
                    ></v-text-field>

                    <!-- <v-autocomplete
                        :items="categories"
                        item-text="name"
                        item-value="id"
                        v-model="form.category_id"
                        label="Category"
                        autocomplete
                    > -->
                    </v-autocomplete>

                    <markdown-editor v-model="form.body"></markdown-editor>
                    <v-card-actions>
                        <v-btn icon small type="submit">
                            <v-icon color="teal">save</v-icon>
                        </v-btn>
                        <v-btn icon small @click="cancel">
                            <v-icon>cancel</v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-form>
        </v-container>
        </v-card>
    </v-container>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                form: {
                    title: null,
                    body: null
                }
            };
        },
        created(){
            this.form = this.data
        },
        methods: {
            update() {
                axios.patch(`/api/question/${this.form.slug}`, this.form)
                .then((res) => {
                    this.cancel()
                })
            },
            cancel(){
                EventBus.$emit('cancelEditing')
            }
        }
    };
</script>
