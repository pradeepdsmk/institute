<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<div class="module students-list-wrap mt-5" data-module="StudentsList">
    <div class="container">
        <h3 class="page-title">Students</h3>

        <?php if (empty($students)) : ?>
            <p class="text-center mt-5">No students <a class="btn btn-light ml-3" href="/applicationform">Add</a></p>
        <?php else : ?>

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Course</td>
                            <td>Joined on</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) : ?>
                            <tr>
                                <td><?= $student->name ?></td>
                                <td><?= $student->course ?></td>
                                <td><?= date('d/m/Y', strtotime($student->joiningdate)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>