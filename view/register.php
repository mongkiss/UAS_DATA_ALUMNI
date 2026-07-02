<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Register</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5 mt-5">

<div class="card shadow">

<div class="card-body">

<h3 class="text-center">

Register

</h3>

<form
action="../controller/AuthController.php"
method="POST">

<input
type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama"
required>

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<input
type="password"
name="konfirmasi"
class="form-control mb-3"
placeholder="Konfirmasi Password"
required>

<button
class="btn btn-success w-100"
name="register">

Daftar

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>