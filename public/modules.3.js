var InstituteModules = {
    StudentApplicationForm: class {

        /**
         * 
         * @param {HTMLElement} rootElement 
         */
        constructor(rootElement) {
            this.rootElement = rootElement;
            this.registerStudentPhotoChange();
            this.registerReferenceFromChange();
        }

        registerStudentPhotoChange() {
            let photoInput = this.rootElement.querySelector('input[name="studentphoto"]');
            let photoImg = photoInput.parentNode.parentNode.querySelector('img');
            photoInput.onchange = function () {
                let file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let data = e.target.result;
                        photoImg.setAttribute('src', data);
                    };
                    reader.readAsDataURL(file);
                }
            };
        }

        registerReferenceFromChange() {
            let referenceFromText = this.rootElement.querySelector('input[name="referencefromtext"]');
            let radioFriend = referenceFromText.parentNode.querySelector('input[name="referencefrom"]');
            let allReferenceRadios = this.rootElement.querySelectorAll('input[name="referencefrom"]');

            allReferenceRadios.forEach((element, index) => {
                element.addEventListener('change', (e) => {
                    this.updatereferenceFromText(radioFriend, referenceFromText);
                });
            });

            this.updatereferenceFromText(radioFriend, referenceFromText);
        }

        updatereferenceFromText(radioFriend, referenceFromText) {
            if (!radioFriend.checked) {
                referenceFromText.value = '';
                referenceFromText.disabled = true;
            } else {
                referenceFromText.disabled = false;
            }
        }
    }
}
