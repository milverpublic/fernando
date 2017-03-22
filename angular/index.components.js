import {CommentModalComponent} from './app/components/comment-modal/comment-modal.component';
import {ControlComponent} from './app/components/control/control.component';
import {IconUmssComponent} from './app/components/icon-umss/icon-umss.component';
import {TreatmentPlanComponent} from './app/components/treatment-plan/treatment-plan.component';
import {DiagnosticComponent} from './app/components/diagnostic/diagnostic.component';
import {ModelStudyComponent} from './app/components/model-study/model-study.component';
import {ExamClinicComponent} from './app/components/exam-clinic/exam-clinic.component';
import {InfoPacientComponent} from './app/components/info-pacient/info-pacient.component';
import {SummaryGeneralComponent} from './app/components/summary-general/summary-general.component';
import {SteeperFormComponent} from './app/components/steeper-form/steeper-form.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppRootComponent} from './app/components/app-root/app-root.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('commentModal', CommentModalComponent)
	.component('control', ControlComponent)
	.component('iconUmss', IconUmssComponent)
	.component('treatmentPlan', TreatmentPlanComponent)
	.component('diagnostic', DiagnosticComponent)
	.component('modelStudy', ModelStudyComponent)
	.component('examClinic', ExamClinicComponent)
	.component('infoPacient', InfoPacientComponent)
	.component('summaryGeneral', SummaryGeneralComponent)
	.component('steeperForm', SteeperFormComponent)
	.component('appHeader', AppHeaderComponent)
	.component('appRoot', AppRootComponent)
	.component('appShell', AppShellComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

