class SteeperFormController{
    constructor($log,ToastService,API,$state,$auth){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.pacient=null;
    }

    $onInit(){
        this.$log.debug(this.$auth.getToken());
    }
    savePacient(){
        this.$log.debug("beging...");
        let vm=this;
        this.API.all('pacients').post(this.pacient).then(function (data) {
            vm.ToastService.show(data.message);
            vm.$state.go('app.pacients');
        });
    }
}

export const SteeperFormComponent = {
    templateUrl: './views/app/components/steeper-form/steeper-form.component.html',
    controller: SteeperFormController,
    controllerAs: 'vm',
    bindings: {}
}
