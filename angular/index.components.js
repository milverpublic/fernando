import {ExamClinicComponent} from './app/components/exam-clinic/exam-clinic.component';
import {InfoPacientComponent} from './app/components/info-pacient/info-pacient.component';
import {SummaryGeneralComponent} from './app/components/summary-general/summary-general.component';
import {SteeperFormComponent} from './app/components/steeper-form/steeper-form.component';
import {ControlSheetFormComponent} from './app/components/control-sheet-form/control-sheet-form.component';
import {ControlSheetComponent} from './app/components/control-sheet/control-sheet.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppRootComponent} from './app/components/app-root/app-root.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('examClinic', ExamClinicComponent)
	.component('infoPacient', InfoPacientComponent)
	.component('summaryGeneral', SummaryGeneralComponent)
	.component('steeperForm', SteeperFormComponent)
	.component('controlSheetForm', ControlSheetFormComponent)
	.component('controlSheet', ControlSheetComponent)
	.component('appHeader', AppHeaderComponent)
	.component('appRoot', AppRootComponent)
	.component('appShell', AppShellComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

