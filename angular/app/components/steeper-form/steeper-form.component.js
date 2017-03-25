class SteeperFormController{
    constructor($log,$scope,ToastService,API,$state,$auth,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.FunctionsService=FunctionsService;
        this.pacient=null;
        this.mode_edition=false;
        this.datepickerOptions={
            format: 'yyyy-mm-dd',
            language: 'es',
            autoclose: true,
            weekStart: 0,
        }
    }

    $onInit(){
        let vm=this;
        let pacient=this.FunctionsService.getObjectSessionStorage('current_selection');
        if (null !=pacient){
            this.API.one('pacients',pacient.pacient_id).get().then(function (response) {
                vm.pacient=response.data;
                vm.$log.debug(vm.pacient);
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
