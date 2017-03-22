class IconUmssController{
    constructor(){
        'ngInject';
        this.icons_dh=null;
        this.pathsIcons=0;
        this.range = [];
    }

    $onInit(){
        this.icons_dh={
            'people':18,
            'detail':8,
            'detail-crap':14,
            'medical':13,
            'diagnostic':10,
            'info':26,
            'round':24,
            'note-plus':14,
            'interface':11,
            'interface-borded':12,
            'paper-firm':20,
            'paper-firm-borded':17,
            'papers':30,
            'hospital':13,
            'person-add':5,
            'sheet':6
        };
        this.getIcon(this.icon);
        this.getSpan(this.pathsIcons);
    }

    getIcon(iconName){
        this.pathsIcons=this.icons_dh[iconName];
    };

    getSpan(nro){
        var total=[];
        for(var i=0;i<nro;i++) {
            total.push(i+1);
        }
        this.range = total;
    };
}

export const IconUmssComponent = {
    templateUrl: './views/app/components/icon-umss/icon-umss.component.html',
    controller: IconUmssController,
    controllerAs: 'vm',
    bindings: {
        icon: '@',
        size: '@',
    }
}
