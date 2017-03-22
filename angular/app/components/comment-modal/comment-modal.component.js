class CommentModalController{
    constructor($log,$uibModal,$scope){
        'ngInject';
        this.$log=$log;
        this.$uibModal=$uibModal;
        this.$scope=$scope;
    }

    closeModalOpened(){
        this.$log.debug("component modal...");
        this.dismiss();
    }
    $onInit(){

    }
}

export const CommentModalComponent = {
    templateUrl: './views/app/components/comment-modal/comment-modal.component.html',
    controller: CommentModalController,
    controllerAs: 'vm',
    bindings: {
        greeting:'@',
        close:'&',
        dismiss: '&'
    }
}
