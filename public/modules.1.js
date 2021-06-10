var InstituteModules = {
    StudentApplicationForm: class {
        constructor() {
            this.registerStudentPhotoChange();
        }
    
        registerStudentPhotoChange() {
            let photoImg = document.getElementById('student-photo-img');
            let photoInput = document.getElementById('student-photo-input');
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
    }    
}
