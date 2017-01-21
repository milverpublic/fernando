class ControlSheetController{
    constructor($log,ToastService,API,$state,$stateParams,$uibModal,$scope){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.$scope=$scope;
        this.$uibModal=$uibModal;
        this.animationsEnabled = true;
        this.pacientId=this.$stateParams.pacientId;
        this.rowCollection
    }

    $onInit(){
        this.loadControlSheets();
    }
    loadControlSheets(){
        this.$log.debug(this.$stateParams.pacientId);
        let vm=this;
        this.API.one('control_sheets').get({'pacient_id':this.$stateParams.pacientId}).then(function (data) {
            vm.rowCollection=data;
        });
    }
    commentSave(comment,id){
        let vm=this;
        this.API.all('observations').post(comment).then(function (data) {
            vm.ToastService.show(data.message);
            vm.$state.go('app.controlsheet',{pacientId:vm.$stateParams.pacientId});
            vm.loadControlSheets();
        });
    }
    modalOpenComment (size,id) {
        let $uibModal = this.$uibModal;
        let $mv = this;
        let $comments=null;
        this.API.one('observations').get({'control_sheet_id':id}).then(function (data) {
            $comments=data;
            $uibModal.open({
                animation: true,
                templateUrl: 'CommentModalContent.html',
                controller: $mv.CommentController,
                controllerAs: 'mvm',
                size: size,
                resolve: {
                    vm:$mv,
                    id:id,
                    comments:$comments
                }
            });
        });
    }
    CommentController ($uibModalInstance,vm,id,comments) {
        'ngInject'
        this.comment={
            control_sheet_id:id
        };
        this.comments=comments;
        this.commentCreate = () => {
            console.log(this.comment);
            vm.commentSave(this.comment,id);
            $uibModalInstance.close();
        };

        this.cancel = () => {
            $uibModalInstance.close();
        };
    }
}

export const ControlSheetComponent = {
    templateUrl: './views/app/components/control-sheet/control-sheet.component.html',
    controller: ControlSheetController,
    controllerAs: 'vm',
    bindings: {}
}
