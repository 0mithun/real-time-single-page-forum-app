import Token from './Token'

import AppStorage from './AppStorage'

class User{
    login(data) {
        axios.post('/api/auth/login', data)
        .then((res) => {
            this.responseAfterLogin(res)
        }).catch((err) => {
            console.log(err.response.data)
        });
    }
    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username = res.data.user
        if(Token.isValid(access_token)){
            AppStorage.store(username, access_token)
            window.location  = '/forum'
        }
    }

    hasToken(){
        const storedToken = AppStorage.getToken();
        if(storedToken){
            return Token.isValid(storedToken)? true:false
        }
        return false
    }

    logedIn(){
        return this.hasToken()
    }

    logout(){
        AppStorage.clear()
        window.location ='/forum'
    }

    name(){
        if(this.logedIn()){
            return AppStorage.getUser()
        }
    }

    id(){
        const payload = Token.payload(AppStorage.getToken())
        return payload.sub
    }

    own(id){
        return this.id() == id
    }
}


export default User = new User