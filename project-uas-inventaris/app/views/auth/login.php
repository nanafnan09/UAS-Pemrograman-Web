<!DOCTYPE html>
<html>
<head>
    <title>Login - Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 100vh; display: flex; align-items: center;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card p-4">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary">Selamat Datang</h3>
                            <p class="text-muted small">Silakan login untuk masuk ke sistem</p>
                        </div>

                        <?php if(isset($_GET['error'])): ?>
                            <div class="alert alert-danger py-2 text-center small rounded-pill">
                                ❌ Username / Password Salah
                            </div>
                        <?php endif; ?>

                        <form action="<?= BASEURL; ?>/auth/login" method="POST">
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">USERNAME</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan username..." required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted small fw-bold">PASSWORD</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan password..." required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Masuk Sekarang</button>
                        </form>
                    </div>
                    <div class="card-footer text-center bg-white border-0 mt-3">
                        <small class="text-muted">Project UAS Pemrograman Web</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>