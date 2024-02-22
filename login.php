<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Honda - Login</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col pt-lg-5">
                    <div class="card shadow-sm">
                        <div class="text-center">
                            <img src="resource/img/logo-banner.png" class="img-fluid my-3" alt="profile" width="90%">
                        </div>
                        <div class="card-body">
                            <hr>
                            <form method="POST" class="p-lg-5">
                                <div class="input-group">
                                    <span class="input-group-text">Email</span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Johndale@example.com">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Username</span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="John dale">
                                </div>

                                <div class="input-group mt-4">
                                    <span class="input-group-text">Password</span>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" name="login" class="btn btn-sm btn-outline-primary px-5 mb-5 w-50">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    session_start();

    if (isset($_POST['login'])) {
        if ($_POST['username'] == "Johndale" && $_POST['email'] == "johndale@email.com" && $_POST['password'] == "dale") {
            // Simpan data pengguna ke dalam session
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];

            // Redirect ke halaman pembayaran
            header("Location: index.php");
            exit();
        } else {
            echo "
        <script>
            alert('Username atau Password salah!');
        </script>";
        }
    }
    ?>


    <script src="resource/js/bootstrap.bundle.min.js"></script>
</body>

</html>