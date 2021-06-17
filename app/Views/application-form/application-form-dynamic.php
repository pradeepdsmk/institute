<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<?php

/** @var App\Libraries\Forms\FormStudentApplication2 $form */

?>

<div class="module application-form-wrap mt-5" data-module="StudentApplicationForm">

    <h3 class="page-title"><?= $form->title ?></h3>

    <div class="container">
        <div class="application-form-wrap row justify-content-center">
            <form class="form application-form col col-sm-10 col-md-8 my-3" method="post" action="/applicationform/submit" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <?php foreach ($form->controls as $name => $control) : ?>
                    <?= $control->innerHTML() ?>
                <?php endforeach; ?>

                <!-- <div class="mb-3">
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
                </div> -->
                <!-- <div class="mb-3">
                    <label>Fee Payments</label>
                    <div class="table-responsive">
                        <table class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <td colspan="2" class="fee-buttons">
                                        <button type="button" class="btn btn-success" role="button">Add</button>
                                        <button type="button" class="btn btn-warning" role="button">Edit</button>
                                        <button type="button" class="btn btn-danger" role="button">Delete</button>
                                        <button type="button" class="btn btn-secondary" role="button">Reset</button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="fee-payment-row">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment-id" value="0" type="checkbox" />
                                            <input class="form-control" name="payment-date" type="date" />
                                        </div>
                                    </td>
                                    <td>
                                        <input class="form-control text-end" name="payment-amount" type="text" placeholder="Amount" />
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="">
                                <tr>
                                    <td>
                                        <div class="empty-space-row"></div>
                                    </td>
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
                </div> -->

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary mx-3">Submit</button>
                    <button type="button" class="btn btn-light mx-3">Cancel</button>
                </div>

            </form>
        </div>
    </div>


</div>

<?php if (!empty($alert)) : ?>
    <div class="page-alert">
        <div class="animate__animated animate__slideInUp page-alert-content">
            <?= $alert ?>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>