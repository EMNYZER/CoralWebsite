<?php
require('control/db.php');

$username ="";
$email ="";
$password ="";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "UPDATE users SET Premium = false WHERE id = '$id'";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'dashboardadmin.php';
              </script>";
    }else{
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORAL_Admin</title>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--file-->
    <link rel="stylesheet" href="css/styleadmin.css">
</head>

<body>

    <div class="container">
        <div class="sidebar">
            <div class="header">
                <div class="list-item">
                    <a href="kelas_admin.html">
                        <img src="asset/ikonadmin.svg" alt="" class="icon">
                        <span class="description-header">CORAL-ADMIN</span>
                    </a>
                </div>
                <div class="illustration">
                    <img src="asset/gambar.svg" alt="">
                </div>
            </div>
            <div class="main">
                <div class="list-item">
                    <a href="dashboardadmin.php">
                        <img src="asset/dashboard.svg" alt="" class="icon">
                        <span class="description-header">Transaksi</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="kelas_admin.php">
                        <img src="asset/anatik.svg" alt="" class="icon">
                        <span class="description-header">Kelas</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="tutor_admin.php">
                        <img src="asset/user.png" alt="" class="icon">
                        <span class="description-header">Profile Tutor</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="user_admin.php">
                        <img src="asset/user.png" alt="" class="icon">
                        <span class="description-header">Profile User</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="karya_admin.php">
                        <img src="asset/kategori.svg" alt="" class="icon">
                        <span class="description-header">Karya</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="index.php">
                        <img src="asset/logout.svg" alt="" class="icon">
                        <span class="description-header">Log out</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div id="menu-button">
                <input type="checkbox" id="menu-checkbox">
                <label for="menu-checkbox" id="menu-label">
                    <div id="hamburger"></div>
                </label>
            </div>
            <div class="mx-auto">

                <div class="card">
                    <div class="card-header text-black bg secondary">
                        Data user yang telah melakukan transaksi
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                </tr>
                                <?php
                                $query = "SELECT id,username,email,password FROM users WHERE premium = 1";
                                $result = mysqli_query($conn, $query);
                       
                                if (!$result) {
                                   die("Error: " . mysqli_error($conn));
                                }
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                    $id = $row['id'];
                                ?>
                                <tr>
                                    <td scope="col"><?php echo $username; ?></td>
                                    <td scope="col"><?php echo $email; ?></td>
                                    <td scope="col"><?php echo $password; ?></td>
                                    <td scope="row">
                                                <a href="dashboardadmin.php?op=delete&id=<?php echo $id; ?>" onclick="return confirm('Yakin untuk menghapus data?')">
                                                <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                </tr>
                                </div>
                                <?php
                                    }
                                ?>
                                <tbody>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jsadmin.js"></script>

</body>

</html>