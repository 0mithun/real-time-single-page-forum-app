<template>
    <v-card>
        <reply v-for="(reply, index) in content" :key="reply.id" :index="index" :data="reply" v-if="question"></reply>
    </v-card>
</template>

<script>
    import Reply from './Reply'
    export default{
        props: ['question'],
        components:{Reply},
        data() {
            return {
                content:this.question.replies
            }
        },
        created(){
            this.listen()
        },
        methods: {
            listen() {
                EventBus.$on('newReply', (reply)=>{
                    this.content.unshift(reply)
                    window.scrollTo(0,0)
                });

                EventBus.$on('deleteReply', (index) => {
                    axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                    .then(res=>{
                        this.content.splice(index, 1)
                    })
                });

                Echo.private('App.User.' + User.id())
                    .notification( (notification) =>{
                        this.content.unshift(notification.reply)
                    });
                
                Echo.channel('DeleteReply')
                    .listen('DeleteReplyEvent', (e)=>{
                        for(let index = 0; index<this.content.length; index++){
                            if(this.content[index].id == e.id){
                                this.content.splice(index, 1)
                            }
                        }
                })
            },
        }
    }
</script>