import {AngularValidationConfig} from './config/angular-validation.config';
import {RoutesConfig} from './config/routes.config';
import {SatellizerConfig} from './config/satellizer.config';

angular.module('app.config')
	.config(AngularValidationConfig)
    .config(RoutesConfig)
	.config(SatellizerConfig)
	.config(AngularValidationConfig);
