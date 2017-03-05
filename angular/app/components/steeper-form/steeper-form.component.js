class SteeperFormController{
    constructor($log,ToastService,API,$state,$auth,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.FunctionsService=FunctionsService;
        this.pacient=null;
        this.mode_edition=false;
        this.datepickerConfig= {
            allowFuture: true,
            dateFormat: 'YYYY-MM-DD',
            maxDate:new Date(),
            minDate:new Date('1970','01','01')
        };
    }

    $onInit(){
        let vm=this;
        let pacientId=this.FunctionsService.getObjectSessionStorage('current_selection').pacient_id;
        if (pacientId !=null){
            this.API.one('pacients',pacientId).get().then(function (response) {
                vm.pacient=response.data;
                vm.mode_edition=true;
            });
        }
    }
    savePacient(){
        let vm=this;
        if (!this.mode_edition){
            this.API.all('pacients').post(this.pacient).then(function (response) {
                vm.FunctionsService.setObjectSessionStorage('current_selection',{
                    'history_clinic_id':response.data.pacient.history_clinic.id,
                    'people_id': response.data.id,
                    'pacient_id':response.data.pacient.id
                });
                vm.ToastService.show(response.message);
                vm.$state.go('app.pacient',{steep:'section2'});
            });
        }else{
            let people=this.FunctionsService.getObjectSessionStorage('current_selection').people_id;
            this.API.one('pacients',people).put(this.pacient).then(function (response) {
                vm.ToastService.show(response.message);
                vm.$state.go('app.pacient',{steep:'section2'});
            });
        }
    }
}

export const SteeperFormComponent = {
    templateUrl: './views/app/components/steeper-form/steeper-form.component.html',
    controller: SteeperFormController,
    controllerAs: 'vm',
    bindings: {}
}
