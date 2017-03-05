export class APIService {
	constructor(Restangular, ToastService, $window,blockUI,blockUIConfig) {
		'ngInject';
		//content negotiation
        var blockUI=blockUI;
        blockUIConfig.delay = 100;
        blockUIConfig.message = 'Cargando...';
		let headers = {
			'Content-Type': 'application/json',
			'Accept': 'application/x.laravel.v1+json'
		};

		return Restangular.withConfig(function(RestangularConfigurer) {
			let vm=this;
			RestangularConfigurer
				.setBaseUrl('/api/')
				.setDefaultHeaders(headers)
				.setErrorInterceptor(function(response) {
					if (response.status === 422 || response.status === 401) {
						for (let error in response.data.errors) {
							return ToastService.error(response.data.errors[error][0]);
						}
					}
                    if (response.status === 500) {
                      return ToastService.error(response.statusText)
                    }
				})
				.addFullRequestInterceptor(function(element, operation, what, url, headers) {
					let token = $window.localStorage.satellizer_token;
					if (token) {
						headers.Authorization = 'Bearer ' + token;
					}
                    blockUI.start();
					console.log('aaaaaa');
				})
                .addResponseInterceptor(function (response, operation, what) {
                    console.log('bbbbbb');
                    blockUI.stop();
                    return response

                })
		});
	}
}
