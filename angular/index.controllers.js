/**
 * @author milver.
 */

import {SteeperController} from './controllers/steeper.controller';
import {PacientController} from './controllers/pacient.controller';
import {ControlSheetController} from './controllers/control-sheet.controller';
import {BaseController} from './controllers/base.controller';

angular.module('app.controllers')
    .controller('SteeperController', SteeperController)
    .controller('PacientController', PacientController)
    .controller('ControlSheetController',ControlSheetController)
    .controller('BaseController',BaseController);