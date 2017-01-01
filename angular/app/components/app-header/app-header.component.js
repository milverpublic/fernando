class AppHeaderController{
    constructor($sce){
        'ngInject';

        this.$sce = $sce;
    }

    $onInit(){
        this.isCollapsed=true;
    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
