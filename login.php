<?php
require __DIR__ . '/config_mysqli.php';
require __DIR__ . '/csrf.php';
session_start();
?>
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เข้าสู่ระบบ | Retail DW</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { min-height: 100vh; display:flex; align-items:center; background:#0f172a; color:#e2e8f0; }
    .login-card { max-width: 420px; width: 100%; background:#111827; border:1px solid rgba(255,255,255,.05); border-radius:1rem; }
    .form-label { color:#cbd5e1; }
    input.form-control { background:#1f2937; border:none; color:#e2e8f0; }
    input.form-control:focus { background:#1f2937; color:#fff; border:1px solid #60a5fa; box-shadow:none; }
    .btn-primary { background:#3b82f6; border:none; }
    .btn-primary:hover { background:#2563eb; }
    a { color:#60a5fa; }
    a:hover { color:#93c5fd; }
  </style>
</head>
<body>
  <main class="container d-flex justify-content-center">
    <div class="login-card shadow-sm p-3 p-md-4">
      <div class="card-body">
        <h1 class="h4 mb-3 text-center text-light">Welcome 👋</h1>

        <?php if (!empty($_SESSION['flash'])): ?>
          <div class="alert alert-danger py-2"><?php echo htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
        <?php endif; ?>

        <form method="post" action="login_process.php" novalidate>
          <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
          <div class="mb-3">
            <label class="form-label" for="email">อีเมล</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="you@example.com" required>
          </div>
          <div class="mb-3">
            <label class="form-label d-flex justify-content-between" for="password">
              <span>รหัสผ่าน</span>
              <a href="#" class="small text-decoration-none" onclick="alert('กรุณาติดต่อผู้ดูแลระบบเพื่อรีเซ็ตรหัส 🙂');return false;">ลืมรหัส?</a>
            </label>
            <input class="form-control" type="password" id="password" name="password" placeholder="••••••••" required>
          </div>
          <div class="d-grid mt-3">
            <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
          </div>
        </form>

        <!-- เพิ่มส่วนสมัครสมาชิก -->
        <div class="text-center mt-3">
          <span class="text-light small">ยังไม่มีบัญชีใช่ไหม?</span>
          <a href="register.php" class="btn btn-link text-decoration-none text-info">สมัครสมาชิก</a>
        </div>

        <p class="text-center text-muted mt-3 mb-0 small">Demo only — do not use weak passwords.</p>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

