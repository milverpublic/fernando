class ExamClinicController{
    constructor($log,ToastService,API,$state,$auth){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.form=null;
        this.$sessionStorage=sessionStorage;
        this.response={
            history_clinic_id:this.$sessionStorage.getItem('current_history_clinic')
        };
    }

    $onInit(){
        let vm=this;
        this.API.one('questionsforms/',3).get().then(function (data) {
            vm.form=data;
        });
    }
    saveExamClinic(){
        this.$log.debug(this.response);
        let vm=this;
        this.API.all('response_questions').post(this.response).then(function (data) {
            vm.ToastService.show(data.message);
        });
    }
}

export const ExamClinicComponent = {
    templateUrl: './views/app/components/exam-clinic/exam-clinic.component.html',
    controller: ExamClinicController,
    controllerAs: 'vm',
    bindings: {}
}
