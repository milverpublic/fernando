class SummaryGeneralController{
    constructor($log,ToastService,API,$state,$auth){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.form=null;
        this.response=null;
    }

    $onInit(){
        let vm=this;
        this.API.one('questionsforms/',1).get().then(function (data) {
            vm.form=data;
        });
    }
    saveSummaryGeneral(){
        this.$log.debug(this.response);
    }

}

export const SummaryGeneralComponent = {
    templateUrl: './views/app/components/summary-general/summary-general.component.html',
    controller: SummaryGeneralController,
    controllerAs: 'vm',
    bindings: {

    }
};
