class ModelStudyController{
    constructor($log,ToastService,API,$state,$auth,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.FunctionsService=FunctionsService;
        this.form=null;
        this.response=null;
        this.section=4;
        this.mode_edition=false;
    }

    $onInit(){
        let vm=this;
        let historyClinicId = this.FunctionsService.getObjectSessionStorage('current_selection').history_clinic_id;
        this.response={
            history_clinic_id:historyClinicId
        };
        this.API.one('questionsforms/',this.section).get().then(function (response) {
            vm.form=response;
        });
        this.API.one('section',this.section).one('history',historyClinicId).get().then(function (response) {
            if(response.data!=null){
                vm.response=response.data;
                vm.mode_edition=true;
            }
        });
    }
    saveModelStudy(){
        let vm=this;
        let historyClinicId=this.FunctionsService.getObjectSessionStorage('current_selection').history_clinic_id;
        if(!this.mode_edition){
            this.API.all('response_questions').post(this.response).then(function (data) {
                vm.ToastService.show(data.message);
                vm.$state.go('app.pacient',{steep:'section7'});
            });
        }else{
            this.API.one('response_questions',historyClinicId).put(this.response).then(function (response) {
                vm.ToastService.show(response.message);
                vm.$state.go('app.pacient',{steep:'section7'});
            });
        }
    }
}

export const ModelStudyComponent = {
    templateUrl: './views/app/components/model-study/model-study.component.html',
    controller: ModelStudyController,
    controllerAs: 'vm',
    bindings: {}
}
