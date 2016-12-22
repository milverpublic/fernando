export class ToastService {
	constructor(toastr) {
		'ngInject';
		this.toastr=toastr;
		this.delay = 6000;
		this.position = 'top right';
		this.action = 'OK';
	}

	show(content) {
        this.toastr.success(content, 'Success...',{
            closeButton: true,
            progressBar: true
		});
	}

	error(content) {
        this.toastr.error(content, 'Error...!',{
            closeButton: true,
            progressBar: true
		});
	}
}
