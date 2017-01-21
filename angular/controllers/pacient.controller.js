/**
 * @author milver.
 */
export class PacientController{
    constructor($scope, $uibModal,$log,ToastService,API,$state,$stateParams){
        'ngInject';
        this.$log=$log;
        this.$scope=$scope;
        this.$uibModal=$uibModal;
        this.ToastService=ToastService;
        this.API=API;
        this.$state=$state;
        this.$stateParams=$stateParams;
        this.items = ['item1', 'item2', 'item3'];
        this.animationsEnabled = true;
        this.pacients=null;
    }

    $onInit(){
        this.loadPacients();
    }
    loadPacients(){
        let vm=this;
        this.API.one('pacients').get().then(function (data) {
            vm.pacients=data;
        });
    }

    modalOpen (size) {
        let $uibModal = this.$uibModal;
        let $scope = this.$scope;
        let $log = this.$log;
        let items = this.items;

        var modalInstance = $uibModal.open({
            animation: this.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: this.modalcontroller,
            controllerAs: 'mvm',
            size: size,
            resolve: {
                items: () => {
                    return items
                }
            }
        });

        modalInstance.result.then((selectedItem) => {
            $scope.selected = selectedItem
        }, () => {
            $log.info('Modal dismissed at: ' + new Date())
        })
    }

    modalcontroller ($scope, $uibModalInstance, items) {
        'ngInject'

        this.items = items;

        $scope.selected = {
            item: items[0]
        };

        this.ok = () => {
            $uibModalInstance.close($scope.selected.item)
        };

        this.cancel = () => {
            $uibModalInstance.dismiss('cancel')
        };
    }

}