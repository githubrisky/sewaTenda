<?php
// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sewa-tenda";

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = ""; // Variabel untuk menyimpan pesan alert

// Proses registrasi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Periksa apakah username sudah ada
    $checkUser = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        $message = "
        <div class='alert alert-danger' role='alert'>
            Username sudah terdaftar. Silakan gunakan username lain.
        </div>
        ";
    } else {
        // Simpan data ke database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $message = "
            <div class='alert alert-success' role='alert'>
                Registrasi berhasil! <a href='login.php' class='alert-link'>Login di sini</a>.
            </div>
            ";
        } else {
            $message = "
            <div class='alert alert-danger' role='alert'>
                Terjadi kesalahan: " . $conn->error . ".
            </div>
            ";
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="bg-white p-4 rounded shadow-lg" style="width: 400px;">
        <h2 class="text-center mb-4 text-dark">Register</h2>
        <?php if (!empty($message)) echo $message; ?>
        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <br>
        <h6><a href="login.php">Sudah Punya Akun?</a></h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>