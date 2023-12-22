<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="login-form d-flex justify-content-center align-items-center vh-100">
        <form action="../../Controller/AdminDangNhapController.php" method="post" class="p-4 bg-light rounded-lg" style="width: 400px;">
            <div class="d-flex justify-content-center mb-2">
                <img src="../../../assets/img-truyen/logo-pd.png" alt="Avatar" class="w-25 p-2">
            </div>
            <h2 class="text-center mb-4">Đăng nhập tài khoản Administrator</h2>
            <div class="mb-3">
                <input type="text" class="form-control" name="usernameadmin" placeholder="Tài khoản" required="required">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="passwordadmin" placeholder="Mật khẩu" required="required">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Đăng nhập</button>
            </div>
            <div class="mb-1">
                <p class="m-0">Nếu bạn là Thành viên.</p>
                <p>Vui lòng đăng nhập <a href="../../Controller/UserDangNhapController.php">tại đây</a></p>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
