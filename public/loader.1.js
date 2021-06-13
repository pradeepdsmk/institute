(function loadModulesAndComponents() {
    window.addEventListener('DOMContentLoaded', function () {
        loadComponents();
        loadModule();
    });

    function loadComponents() {

    }

    function loadModule() {
        let element = document.querySelector('.module');
        if (!element) {
            return;
        }
        let moduleName = element.getAttribute('data-module');
        if (!moduleName) {
            return;
        }

        if (!window['InstituteModules'][moduleName]) {
            return;
        }
        let module;
        try {
            module = new (window['InstituteModules'][moduleName])(element);
        } catch (ex) {
            console.log(`error while loading module ${moduleName}`, ex);
        }
    }

})();


