<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>

    <div class="background"></div>

    <div class="overlay"></div>

    <div class="login-wrapper">

        <div class="card shadow-lg">

            <div class="card-body">

                <div class="text-center mb-4">
                    <img src="../assets/img/20603306-4.png" alt="Logo" width="90">
                </div>

                <h2 class="text-center mb-4 text-white">
                    Login
                </h2>

                <form action="../controller/AuthController.php" method="POST">

                    <div class="mb-3">
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Username"
                            required>
                    </div>

                    <div class="mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            required>
                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

                <div class="text-center mt-4">
                    <a href="register.php">
                        Belum punya akun? Daftar
                    </a>
                </div>

            </div>

        </div>

    </div>

</body>

</html>