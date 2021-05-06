<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<div class="application-form-wrap mt-5">

    <h3 class="page-title">Application Form</h3>

    <div class="container">
        <div class="application-form-wrap row justify-content-center">
            <form class="form application-form col col-sm-10 col-md-8 my-3" method="post" action="/applicationform/submit">

                <div class="photo-container mb-3">
                    <label>Photo</label>
                    <div class="student-photo" style="background-image: url('/student-example.jpg')">
                        <div class="btn btn-light edit-image-button" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                            <input type="file" class="file-input" name="student-photo" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Application Number</label>
                    <input class="form-control" type="text" name="application-number" />
                </div>
                <div class="mb-3">
                    <label>Branch</label>
                    <input class="form-control" type="text" name="branch" />
                </div>
                <div class="mb-3">
                    <label>Student Name</label>
                    <input class="form-control" name="student-name" type="text" />
                </div>
                <div class="mb-3">
                    <label>Father's/Husband's Name</label>
                    <input class="form-control" name="father-husband-name" type="text" />
                </div>
                <div class="mb-3">
                    <label>Permanent Address</label>
                    <textarea class="form-control" name="permanent-address"></textarea>
                </div>
                <div class="mb-3">
                    <label>Address for Communication</label>
                    <textarea class="form-control" name="communication-address"></textarea>
                </div>
                <div class="mb-3">
                    <label>Sex</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" />
                        <label class="form-check-label" for="gender-male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" />
                        <label class="form-check-label" for="gender-female">Female</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Date of Birth</label>
                    <input class="form-control" name="date-of-birth" type="date" />
                </div>
                <div class="mb-3">
                    <label>Education Qualification</label>
                    <input class="form-control" name="education-qualification" type="text" />
                </div>
                <div class="mb-3">
                    <label>Technical Qualification</label>
                    <input class="form-control" name="technical-qualification" type="text" />
                </div>
                <div class="mb-3">
                    <label>Course Joined</label>
                    <input class="form-control" name="course-joined" type="text" />
                </div>
                <div class="mb-3">
                    <label>College / School Name</label>
                    <input class="form-control" name="college-school-name" type="text" />
                </div>
                <div class="mb-3">
                    <label>Reference From</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="reference-from[]" id="reference-from-friend" value="reference-from-friend" />
                        <label class="form-check-label" for="reference-from-friend">Friend</label>
                        <input class="form-control" type="text" name="reference-from-friend-name" />
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="reference-from[]" id="reference-from-tv-ad" value="reference-from-tv-ad" />
                        <label class="form-check-label" for="reference-from-tv-ad">TV Ad</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="reference-from[]" id="reference-from-demo" value="reference-from-demo" />
                        <label class="form-check-label" for="reference-from-demo">Demo</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Contact No.</label>
                    <input class="form-control" name="contact-number" type="text" />
                </div>
                <div class="mb-3">
                    <label>E-Mail ID</label>
                    <input class="form-control" name="email-id" type="email" />
                </div>
                <div class="mb-3">
                    <label>Facebook</label>
                    <input class="form-control" name="facebook" type="text" />
                </div>
                <div class="mb-3">
                    <label>Date</label>
                    <input class="form-control" name="application-date" type="date" />
                </div>
                <div class="mb-3">
                    <label>Fee Payments</label>
                    <div class="table-responsive">
                        <table class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-success" role="button">Add</button>
                                        <button class="btn btn-warning" role="button">Edit</button>
                                        <button class="btn btn-danger" role="button">Delete</button>
                                        <button class="btn btn-secondary" role="button">Reset</button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment-id" value="0" type="checkbox" />
                                            <input class="form-control" name="payment-date" type="date" />
                                        </div>
                                    </td>
                                    <td>
                                        <input class="form-control text-end" name="payment-amount" type="text" />
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="">
                                <tr>
                                    <td><div class="empty-space-row"></div></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>
                                        Total amount
                                    </td>
                                    <td>
                                        <input class="form-control text-end" name="payment-total" type="text" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-primary mx-3" type="submit">Submit</button>
                    <button class="btn btn-light mx-3" type="submit">Cancel</button>
                </div>

            </form>
        </div>
    </div>


</div>

<?= $this->endSection() ?>