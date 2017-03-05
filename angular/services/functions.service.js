export class FunctionsService{
    constructor($auth,API,$state){
        'ngInject';
        this.$auth=$auth;
        this.API=API;
        this.$state=$state;
        this.$sessionStorage=sessionStorage;
    }
    getUserCurrent(){
        if (this.$auth.isAuthenticated()){
            return this.API.one('me').get();
        }else {
            this.$state.go('app.landing',{},{reload: true});
        }
    }
    setObjectSessionStorage(key,data){
        this.$sessionStorage.setItem('current_selection',JSON.stringify(data));
    }
    getObjectSessionStorage(key){
        return JSON.parse(this.$sessionStorage.getItem(key));
    }
    removeObjectSessionStorage(key){
        this.$sessionStorage.removeItem(key);
    }
}

