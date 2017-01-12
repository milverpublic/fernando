class ControlSheetController{
    constructor(){
        'ngInject';
        this.rowCollection
    }

    $onInit(){
        this.rowCollection = [
            {fecha_tratamiento: '01-02-2017', tratamiento: 'Renard', tratamiento_next: '1987-05-21', pacient_id: 1, status: 'check'},
            {fecha_tratamiento: '01-02-2017', tratamiento: 'Faivre', tratamiento_next: '1987-04-25', pacient_id: 2, status: 'check'},
            {fecha_tratamiento: '01-02-2017', tratamiento: 'Frere', tratamiento_next: '1955-08-27', pacient_id: 3, status: 'remove'}
        ];
    }
}

export const ControlSheetComponent = {
    templateUrl: './views/app/components/control-sheet/control-sheet.component.html',
    controller: ControlSheetController,
    controllerAs: 'vm',
    bindings: {}
}
