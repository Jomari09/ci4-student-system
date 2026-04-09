<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Student System' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <!-- Page Content -->
    <?= $this->renderSection('content') ?>

</body>
</html>
