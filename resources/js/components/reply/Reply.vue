<template>
    <div>
        <v-container>
            <v-card>
                <v-card-title>
                    <div class="headline">{{ data.user }}</div>
                    <div class="ml-2">Said {{ data.created_at }}</div>
                </v-card-title>
                <v-divider></v-divider>
                <edit-reply v-if="editing" :reply="data"></edit-reply>
                <div v-else>
                    <v-card-text v-html="reply"></v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions v-if="own">
                        <v-btn icon small>
                            <v-icon color="orange" @click="edit">edit</v-icon>
                        </v-btn>
                        <v-btn icon small>
                            <v-icon color="red" @click="destroy">delete</v-icon>
                        </v-btn>
                    </v-card-actions>
                </div>
            </v-card>
        </v-container>
    </div>
</template>

<script>
    import EditReply from './EditReply';
    export default {
        props: ["data", "index"],
        components:{EditReply},
        data(){
           return{
                editing:false
           }
        },
        created(){
            this.listen()
        },
        computed:{
           own(){
             return  User.own(this.data.user_id)
            },
            reply(){
                return md.parse(this.data.reply)
            }
        },
        methods: {
            destroy() {
                EventBus.$emit('deleteReply', this.index)
            },
            edit(){
                this.editing = true
            },
            listen(){
                EventBus.$on('cancelEditing', ()=>{
                    this.editing = false
                })
            }
        },
    };
</script>
