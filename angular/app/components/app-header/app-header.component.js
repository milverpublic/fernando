class AppHeaderController{
    constructor($sce,$log,$auth,$state){
        'ngInject';
        this.$auth=$auth;
        this.$state=$state;
        this.$log=$log;
        this.$sce = $sce;
    }

    $onInit(){
        this.isCollapsed=true;
        this.$log.debug(this.$auth.isAuthenticated());
    }
    logout(){
        this.$auth.logout();
        this.$state.go('app.landing');
    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
