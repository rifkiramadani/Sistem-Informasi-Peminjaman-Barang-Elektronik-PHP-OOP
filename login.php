<?php
require "connection.php";

if(isset($_POST["submitLogin"])) {
    $email = mysqli_real_escape_string($connect, $_POST["email_admin"]);
    $password = mysqli_real_escape_string($connect, $_POST["password_admin"]);

    $sql = "SELECT * FROM tb_admin WHERE email_admin='$email' AND password_admin='$password'";
    $result = mysqli_query($connect, $sql);

    if($result) {
        $row_count = mysqli_num_rows($result);

        if ($row_count > 0) {
            echo "<script>alert('Login Berhasil')
            window.location.href='list_barang_elektronik.php'</script>";
        } else {
            echo "<script>alert('Login Gagal Silahkan Coba Kembali')
            window.location.href='formLogin.html'</script>";  
        }
    } else {
        // Handle query execution error
        echo "Error: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}
?>