<template>
    <v-toolbar>
        <v-toolbar-title>Mithu-It</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">
            <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show"><v-btn flat>{{ item.title }}</v-btn></router-link>
        </div>
    </v-toolbar>
</template>

<script>
    export default{
        data(){
            return {
                items: [
                    {title:'Forum', to:'/forum', show:true},
                    {title:'Ask Question', to:'/ask', show:User.logedIn()},
                    {title:'Category', to:'/category', show:User.logedIn()},
                    {title:'Log In', to:'/login', show:!User.logedIn()},
                    {title:'Log Out', to:'/logout', show:User.logedIn()},
                ]
            }
        },
        created(){
            EventBus.$on('logout', ()=>{
                User.logout()
            })
        }
    }
</script>