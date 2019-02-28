<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question v-for="question in questions" :key="question.path" :question="question"></question>
            </v-flex>
            Sidebar
        </v-layout>
    </v-container>
</template>
<script>
    import Question from './Question'
    export default{
        components:{
            Question
        },
        data(){
            return {
                questions:{}
            }
        },
        created(){
            axios.get('/api/question')
            .then((result) => {
                this.questions = result.data.data
            }).catch((err) => {
                console.log(err)
            });
        }
    }
</script>