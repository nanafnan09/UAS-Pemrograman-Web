<!DOCTYPE html>
<html>
<head>
    <title>UAS Project</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['title'] ?? 'Inventory System'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4 p-3">
    <a class="navbar-brand" href="<?= BASEURL; ?>/item">Inventaris</a>
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="<?= BASEURL; ?>/auth/logout" class="btn btn-danger btn-sm">Logout (<?= $_SESSION['role']; ?>)</a>
    <?php endif; ?>
</nav>
<div class="container">