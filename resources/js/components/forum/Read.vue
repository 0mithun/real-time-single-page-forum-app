<template>
    <v-container>

    
    <div v-if="question">
        <edit-question v-if="editing" :data="question"></edit-question>
        <show-question :data="question" v-else></show-question>
        <br>
        <replies-question :question="question" mt-4></replies-question>
        <new-reply :questionSlug="question.slug"></new-reply>

    </div>
</v-container>
</template>

<script>
    import ShowQuestion from "./ShowQuestion";
    import EditQuestion from "./EditQuestion"
    import RepliesQuestion from '../reply/RepliesQuestion'
    import NewReply from '../reply/NewReply'

    export default {
        components: { ShowQuestion,EditQuestion,RepliesQuestion, NewReply },
        data() {
            return {
                question: null,
                editing: false
            };
        },
        created() {
            this.listen();
            this.getQuestion();
        },
        methods: {
            listen() {
                EventBus.$on("startEditing", () => {
                    this.editing = true;
                });
                EventBus.$on('cancelEditing',()=>{
                    this.editing= false
                })
            },
            getQuestion() {
                axios
                    .get(`/api/question/${this.$route.params.slug}`)
                    .then(result => {
                        this.question = result.data.data;
                    });
            }
        }
    };
</script>
