class AppHeaderController{
    constructor($sce){
        'ngInject';

        this.$sce = $sce;
    }

    $onInit(){

    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
