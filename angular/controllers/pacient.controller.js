/**
 * @author milver.
 */
export class PacientController{
    constructor($log,ToastService,API,$state,$stateParams,FunctionsService){
        'ngInject';
        this.$log=$log;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.FunctionsService=FunctionsService;
        this.pacients=null;
    }

    $onInit(){
        this.loadPacients();
        this.FunctionsService.removeObjectSessionStorage('current_selection');
        this.FunctionsService.removeObjectSessionStorage('current_pacient');
    }
    loadPacients(){
        let vm=this;
        this.API.one('pacients').get({size:10}).then(function (response) {
            vm.pacients=response.data;
        });
    }

    openFormPacient(){
        this.deleteCurrentSelection();
        this.$state.go('app.pacient',{steep:'section1'});
    }
    openControlSheetPacient(person){
        this.FunctionsService.setObjectSessionStorage('current_pacient',{
            'pacient_id': person.pacient.id,
            'people_id': person.id,
        });
        this.$state.go('app.controlsheet');
    }
    deleteCurrentSelection(){
        this.FunctionsService.removeObjectSessionStorage('current_selection');
    }
    viewHistoryClinic(person){
        this.FunctionsService.setObjectSessionStorage('current_selection',{
            'pacient_id': person.pacient.id,
            'people_id': person.id,
            'history_clinic_id': person.pacient.history_clinic.id,
        });
        this.$state.go('app.pacient',{steep:'section1'});
    }
}