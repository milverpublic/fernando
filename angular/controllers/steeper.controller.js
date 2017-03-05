/**
 * @author milver.
 */
export class SteeperController{
    constructor($log,ToastService,API,$state,$auth,$stateParams,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.$stateParams=$stateParams;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$auth=$auth;
        this.FunctionsService=FunctionsService;
        this.pacient=null;
        this.sections=null;
    }

    $onInit(){
        let vm=this;
        this.API.one('section').get().then(function (response) {
            vm.sections=response;
        });
    }
    changeSection(section){
        this.$state.go('app.pacient',{steep:section});
    }
    savePacient(){
        let vm=this;
        this.API.all('pacients').post(this.pacient).then(function (response) {
            vm.ToastService.show(response.message);
            vm.$state.go('app.pacients');
        });
    }
}
