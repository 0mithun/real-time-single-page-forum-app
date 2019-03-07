<template>
        
        <v-menu offset-y>
                <v-btn slot="activator">
                        <v-icon :color="color">add_alert</v-icon> {{ unreadCount }}
                </v-btn>
            <v-list>
                <v-list-tile v-for="item in unread" :key="item.id">
                    <router-link :to="item.path">
                        <v-list-tile-title @click.prevent="readNotification(item)">{{ item.question }}</v-list-tile-title>
                    </router-link>                   
                </v-list-tile>
            </v-list>
            <v-divider></v-divider>
            <v-list>
                <v-list-tile v-for="item in read" :key="item.id">
                    <v-list-tile-title>{{ item.question }}</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>
</template>

<script>
    export default{
        data(){
            return{
                read:{},
                unread:{},
                unreadCount:0
            }
        },
        created(){
            if(User.logedIn()){
                this.getNotifications()
            }

            Echo.private('App.User.' + User.id())
            .notification((res)=>{
                this.unread.unshift(res)
                this.unreadCount++
            })
        },

        computed:{
            color(){
                return this.unreadCount > 0 ? 'red':'red lighten-4'
            }
        },
        methods: {
            getNotifications() {
                axios.post('/api/notifications')
                .then((res) => {
                    this.read = res.data.read;    
                    this.unread = res.data.unread;    
                    this.unreadCount = res.data.unread.length;    
                }).catch(error => Exception.handle(error))
            },
            readNotification(notification){
                axios.post('/api/markAsRead',{id:notification})
                .then(res=>{
                    this.unread.splice(notification, 1)
                    this.read.push(notification)
                    this.unreadCount--
                })
            }
        },
    }
</script>