class ControlController{
    constructor($log,ToastService,API,$state,$stateParams,$uibModal,$scope){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.$scope=$scope;
        this.$uibModal=$uibModal;
        this.control=null;
    }

    $onInit(){
    }
    controlCreate(){
        this.$log.debug(this.control);
        this.closeModalInstance();
    }
    closeModalInstance(){
        this.dismiss();
    }
}

export const ControlComponent = {
    templateUrl: './views/app/components/control/control.component.html',
    controller: ControlController,
    controllerAs: 'vm',
    bindings: {
        close:'&',
        dismiss: '&'
    }
}
