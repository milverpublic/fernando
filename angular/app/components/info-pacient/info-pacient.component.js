class InfoPacientController {
    constructor($log, ToastService, API, $state, $auth,FunctionsService) {
        'ngInject';
        this.$log = $log;
        this.ToastService = ToastService;
        this.API = API;
        this.$state = $state;
        this.$auth = $auth;
        this.FunctionsService=FunctionsService;
        this.form = null;
        this.response = null;
        this.section=2;
    }

    $onInit() {
        let vm = this;
        let historyClinicId = this.FunctionsService.getObjectSessionStorage('current_selection').history_clinic_id;
        this.response = {
            history_clinic_id: historyClinicId
        };
        this.API.one('questionsforms/', 2).get().then(function (data) {
            vm.form = data;
        });
        this.API.one('section',this.section).one('history',historyClinicId).get().then(function (response) {
            vm.response=response.data;
        });
    }

    saveInfoPacient() {
        let vm = this;
        this.API.all('response_questions').post(this.response).then(function (data) {
            vm.ToastService.show(data.message);
        });
    }
}

export const InfoPacientComponent = {
    templateUrl: './views/app/components/info-pacient/info-pacient.component.html',
    controller: InfoPacientController,
    controllerAs: 'vm',
    bindings: {}
}
