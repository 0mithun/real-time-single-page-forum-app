import User from './User.js'

class Exception{
    handle(error){
        this.isExpered(error.response.data.error)
        this.isNotprovided(error.response.data.error)
    }

    isExpered(error){
        if(error == 'Token is expried'){
            User.logout()
        }
    }

    isNotprovided(error){
        if(error == 'Token is not provided'){
            User.logout()
        }
    }
}

export default Exception = new Exception()