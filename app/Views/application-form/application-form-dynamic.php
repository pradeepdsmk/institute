<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<?php

/** @var App\Libraries\Forms\FormStudentApplication2 $form */

?>

<div class="module application-form-wrap mt-5" data-module="StudentApplicationForm">

    <h3 class="page-title"><?= $form->title ?></h3>

    <div class="container">
        <div class="application-form-wrap row justify-content-center">
            <form class="form application-form col col-sm-10 col-md-8 my-3" method="post" action="/applicationform" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <?php foreach ($form->controls as $name => $control) : ?>
                    <?= $control->innerHTML() ?>
                <?php endforeach; ?>

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