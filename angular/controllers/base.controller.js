/**
 * @author milver.
 */
/**
 * @author milver.
 */
export class BaseController{
    constructor($log,ToastService,API,$state,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.FunctionsService=FunctionsService;
        this.$uibModal=$uibModal;
    }
    $onInit(){

    }
}
