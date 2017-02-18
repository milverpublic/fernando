export class FunctionsService{
    constructor(){
        'ngInject';
        this.params=null;
    }
    setParams(param){
        if (param != undefined){
            this.params=param;
        }
    }
    getParams(){
        return this.params;
    }
}

