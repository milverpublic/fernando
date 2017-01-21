class ControlSheetFormController{
    constructor($log,ToastService,API,$state,$uibModal,$stateParams){
        'ngInject';
        this.ToastService=ToastService;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.API=API;
        this.$log=$log;
        this.$uibModal=$uibModal;
        this.controlSheet={
            pacient_id:this.$stateParams.pacientId,
        }
    }

    $onInit(){
    }
    createControlSheet(){
        let vm=this;
        this.API.all('control_sheets').post(this.controlSheet).then(function (data) {
            vm.ToastService.show(data.message);
            vm.toControlSheet();
        });
    }
    cancelControlSheet(){
        this.toControlSheet();
    }
    toControlSheet(){
        this.$state.go('app.controlsheet',{pacientId:this.$stateParams.pacientId});
    }
}

export const ControlSheetFormComponent = {
    templateUrl: './views/app/components/control-sheet-form/control-sheet-form.component.html',
    controller: ControlSheetFormController,
    controllerAs: 'vm',
    bindings: {}
}
