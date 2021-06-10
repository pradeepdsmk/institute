window.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('.module');
    if (!element) {
        return;
    }
    let moduleName = element.getAttribute('data-module');
    if (!moduleName) {
        return;
    }

    if(!window['InstituteModules'][moduleName]) {
        return;
    }
    let module;
    try {
        module = new (window['InstituteModules'][moduleName])();
    } catch(ex) {
        console.log('error while loading module', ex);
    }
});
