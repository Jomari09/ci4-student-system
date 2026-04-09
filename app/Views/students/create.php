<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="mb-3">Add Student</h2>

    <form method="post" action="/students/store">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="/students" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
