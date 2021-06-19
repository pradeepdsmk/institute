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
            // let photoImg = document.getElementById('student-photo-img');
            // let photoInput = document.getElementById('student-photo-input');            
            let photoInput = this.rootElement.querySelector('input[name="studentPhoto"]');
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
            let referenceFromText = this.rootElement.querySelector('input[name="referenceFromText"]');
            let radioFriend = referenceFromText.parentNode.querySelector('input[name="referenceFrom"]');
            let allReferenceRadios = this.rootElement.querySelectorAll('input[name="referenceFrom"]');

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
