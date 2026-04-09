<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <h2 class="mb-3">Student List</h2>

    <!-- Search Form -->
    <form method="get" action="/students" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search students...">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Add Student Button -->
    <a href="/students/create" class="btn btn-success mb-3">Add Student</a>

    <!-- Student Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['student_id'] ?></td>
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['course'] ?></td>
                        <td>
                            <a href="/students/edit/<?= $student['student_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/students/delete/<?= $student['student_id'] ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">No students found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        <?= $pager->links('default', 'bootstrap_pager') ?>
    </div>
<?= $this->endSection() ?>
