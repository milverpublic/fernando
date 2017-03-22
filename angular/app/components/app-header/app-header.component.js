class AppHeaderController{
    constructor($sce,$log,$auth,$state,API){
        'ngInject';
        this.$auth=$auth;
        this.$state=$state;
        this.API=API;
        this.$log=$log;
        this.$sce = $sce;
        this.profile=null;
    }

    $onInit(){
        this.isCollapsed=true;
        let vm=this;
        if (this.$auth.isAuthenticated()){
            this.API.one('me').get().then(function (data) {
                vm.profile=data.data;
            });
        }
    }
    logout(){
        this.$auth.logout();
        this.$state.go('app.landing',{},{reload: true});
    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
