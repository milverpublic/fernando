import {RoutesConfig} from './config/routes.config';
import {SatellizerConfig} from './config/satellizer.config';

angular.module('app.config')
    .config(RoutesConfig)
	.config(SatellizerConfig);
