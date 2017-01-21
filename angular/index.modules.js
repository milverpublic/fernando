angular.module('app', [
    'app.run',
	'app.filters',
	'app.services',
	'app.controllers',
	'app.components',
    'app.directives',
	'app.routes',
	'app.config',
]);

angular.module('app.run', []);
angular.module('app.routes', []);
angular.module('app.filters', []);
angular.module('app.services', []);
angular.module('app.config', []);
angular.module('app.directives', []);
angular.module('app.controllers', []);
angular.module('app.components', [
	'ui.router', 'ui.bootstrap', 'toastr',
	'restangular', 'ngStorage', 'satellizer'
]);

