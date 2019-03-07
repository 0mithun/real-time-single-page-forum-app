<template>
    <v-toolbar color="indigo dark" >

        <v-toolbar-title>
            <router-link to="/" class="white--text">Mithu-It</router-link> 
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <app-notification v-if="logedin"></app-notification>
        <div class="hidden-sm-and-down">
            <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show"><v-btn flat   class="white--text">{{ item.title }}</v-btn></router-link>
        </div>
    </v-toolbar>
</template>

<script>
    import AppNotification from './AppNotification'
    export default{
        components:{AppNotification},
        data(){
            return {
                logedin:User.logedIn(),
                items: [
                    {title:'Forum', to:'/forum', show:true},
                    {title:'Ask Question', to:'/ask', show:User.logedIn()},
                    {title:'Category', to:'/category', show:User.admin()},
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