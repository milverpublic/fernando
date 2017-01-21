/**
 * @author milver.
 */

import {SteeperController} from './controllers/steeper.controller';
import {PacientController} from './controllers/pacient.controller';

angular.module('app.controllers')
    .controller('SteeperController', SteeperController)
    .controller('PacientController', PacientController);