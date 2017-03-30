export function AngularValidationConfig($translateProvider){
    'ngInject';
    $translateProvider.useStaticFilesLoader({
        prefix: 'locales/validation/',
        suffix: '.json'
    });

    // define translation maps you want to use on startup
    $translateProvider.preferredLanguage('es');
    //
}
