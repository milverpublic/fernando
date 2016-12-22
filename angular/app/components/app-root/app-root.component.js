class AppRootController {
    constructor(toastr,ToastService, $window) {
        'ngInject';
        this.toastr=toastr;
        this.$window = $window;
        this.ToastService = ToastService;
    }

    $onInit() {
        this.registerServiceWorker();
        this.checkForNewerVersions();
        this.toastr.success('Hello world!', 'Toastr fun!');
    }

    registerServiceWorker() {
        if (!('serviceWorker' in navigator)) {
            return false;
        }
        navigator.serviceWorker.register('/service-worker.js')
            .then(this.handleRegistration.bind(this));
    }

    handleRegistration(registration) {
        registration.onupdatefound = () => {
            const installingWorker = registration.installing;
            installingWorker.onstatechange = () => {
                if (installingWorker.state === 'installed') {
                    if (!navigator.serviceWorker.controller) {
                        this.ToastService.show('App is ready for offline use.');
                    }
                }
            }
        }
    }

    checkForNewerVersions() {
        if (navigator.serviceWorker && navigator.serviceWorker.controller) {
            navigator.serviceWorker.controller.onstatechange = (e) => {

                if (e.target.state === 'redundant') {
                    this.toastr.info('A newer version of this site is available.','Refresh');
                }
            };
        }
    }
}

export const AppRootComponent = {
    templateUrl: './views/app/components/app-root/app-root.component.html',
    controller: AppRootController,
    controllerAs: 'vm',
    bindings: {}
}
