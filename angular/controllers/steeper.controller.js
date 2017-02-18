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
        this.$log.debug(this.FunctionsService.getParams());
        this.API.one('section').get({'pacient_id':this.$stateParams.pacientId}).then(function (data) {
            vm.sections=data;
        });
    }
    setProperties(number){
        this.FunctionsService.setParams(number);
    }
    savePacient(){
        let vm=this;
        this.API.all('pacients').post(this.pacient).then(function (data) {
            vm.ToastService.show(data.message);
            vm.$state.go('app.pacients');
        });
    }
}
