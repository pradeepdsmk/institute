<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<div class="students-list-wrap">
    <h1>Students</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Joined on</th>
                <th>Fee status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student) : ?>
            <tr>
                <th><?= $student->name ?></th>
                <th><?= $student->course ?></th>
                <th><?= $student->joinedon ?></th>
                <th><?= $student->feestatus ?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>