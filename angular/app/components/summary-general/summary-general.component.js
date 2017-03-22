class SummaryGeneralController{
    constructor($log, ToastService,API,$state,$auth,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.FunctionsService=FunctionsService;
        this.form=null;
        this.response=null;
        this.section=1;
        this.mode_edition=false;
    }

    $onInit(){
        let vm=this;
        let historyClinicId=this.FunctionsService.getObjectSessionStorage('current_selection').history_clinic_id;
        this.API.one('questionsforms/',this.section).get().then(function (data) {
            vm.form=data;
        });
        this.response={
            history_clinic_id:historyClinicId
        };
        if(historyClinicId!=null){
            this.API.one('section',this.section).one('history',historyClinicId).get().then(function (data) {
                if(data.data!=null){
                    vm.response=data.data;
                    vm.mode_edition=true;
                }
            });
        }
    }
    saveSummaryGeneral(){
        let vm=this;
        let historyClinicId=this.FunctionsService.getObjectSessionStorage('current_selection').history_clinic_id;
        if(!vm.mode_edition){
            this.API.all('response_questions').post(this.response).then(function (data) {
                vm.ToastService.show(data.message);
                vm.$state.go('app.pacient',{steep:'section3'});
            });
        }else {
            this.API.one('response_questions',historyClinicId).put(this.response).then(function (response) {
                vm.ToastService.show(response.message);
                vm.$state.go('app.pacient',{steep:'section3'});
            });
        }
    }

}

export const SummaryGeneralComponent = {
    templateUrl: './views/app/components/summary-general/summary-general.component.html',
    controller: SummaryGeneralController,
    controllerAs: 'vm',
    bindings: {

    }
};
