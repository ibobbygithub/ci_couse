<div>
    <a href="<?= base_url("Student/showForm") ?>" class="btn btn-warning">Add</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Student_id</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">สาขาวิชา</th>
            <th scope="col">Action</th>
        </tr>
        <?php foreach ($student as $column) { ?>
            <tr>

                <td><?= $column->STUDENT_ID ?></td>
                <td><?= $column->FIRSTNAME ?></td>
                <td><?= $column->LASTNAME ?></td>
                <td><?= $column->EMAIL ?></td>
                <td>
                    <a href="<?= base_url("Student/editForm/$column->ID") ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url("Student/delete/$column->ID") ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </thead>

</table>