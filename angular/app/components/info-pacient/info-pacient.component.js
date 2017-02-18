class InfoPacientController{
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
        this.API.one('questionsforms/',2).get().then(function (data) {
            vm.form=data;
        });
    }
    saveInfoPacient(){
        this.$log.debug(this.response);
    }
}

export const InfoPacientComponent = {
    templateUrl: './views/app/components/info-pacient/info-pacient.component.html',
    controller: InfoPacientController,
    controllerAs: 'vm',
    bindings: {}
}
