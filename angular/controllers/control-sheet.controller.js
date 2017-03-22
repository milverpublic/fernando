/**
 * @author milver.
 */
export class ControlSheetController{
    constructor($log,ToastService,API,$state,$stateParams,$uibModal,$scope,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.FunctionsService=FunctionsService;
        this.$scope=$scope;
        this.controlSheet=null;
        this.controls=null;
        this.$uibModal=$uibModal;
    }
    $onInit(){
        this.loadControlSheets();
    }
    openControlForm(){
        var $modal=this.$uibModal;
        $modal.open({
            animation: true,
            size: 'lg',
            backdrop: 'static',
            keyboard: true,
            template: '<control close="mvm.close()" dismiss="mvm.close()"></control>',
            controller: [ '$uibModalInstance', function ($uibModalInstance) {
                this.close = $uibModalInstance.close;
                this.dismiss = $uibModalInstance.dismiss('cancel');
            } ],
            controllerAs: 'mvm'
        });
    }
    openCommentForm(){
        var $modal=this.$uibModal;
        $modal.open({
            animation: true,
            size: 'lg',
            backdrop: 'static',
            keyboard: true,
            template: '<comment-modal close="mvm.close()" dismiss="mvm.close()"></comment-modal>',
            controller: [ '$uibModalInstance', function ($uibModalInstance) {
                this.close = $uibModalInstance.close;
                this.dismiss = $uibModalInstance.dismiss('cancel');
            } ],
            controllerAs: 'mvm'
        });
    }
    loadControlSheets(){
        let vm=this;
        let pacient=this.FunctionsService.getObjectSessionStorage('current_selection');
        this.API.one('control_sheets').get({'pacient_id':pacient.pacient_id})
            .then(function (response) {
            vm.controlSheet=response.data;
        })
            .then(function () {
            vm.API.one('controls').get({'control_sheet_id':vm.controlSheet.id}).then(function (response) {
                vm.controls=response.data;
            });
        });
    }
}
