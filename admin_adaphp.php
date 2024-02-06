<?php
require('control/db.php');

$username ="";
$email ="";
$password ="";
$sukses ="";
$gagal  ="";
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from username where id = '$id'";
    $sql2 = "delete from email where id = '$id'";
    $sql3 = "delete from password where id = '$id'";
    $q1 = mysqli_query($conn,$sql1,$sql2,$sql3);
    if($q1){
        $sukses = "data berhasil dihapus";
    }else{
        $gagal = "data gagal dihapus";
    }
}

if($op == 'edit'){
    $id   = $_GET['id'];
    $sql1 = "select * from mahasiswa where id = '$id'";
    $q1   = mysqli_query($conn,$sql1);
    $r1   = mysqli_fetch_array($q1);
    $username = $r1['username'];
    $email = $r1['email'];
    $password = $r1['password'];
    if($email == ''){
        $gagal = "data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email){
        if($op =='edit'){//untuk update
            $sql1 = "update mahasiswa set username = '$username where ='$id'";
            $sql2 = "update mahasiswa set email = '$email where ='$id'";
            $sql3 = "update mahasiswa set password = '$password where ='$id'";
            $q1 = mysqli_query($conn,$sql1,$sql2,$sql3);
            if($q1){
                $sukses = "data berhasil diupdate";
            }else{
                $gagal = "data gagal diupdate";
            }
        }else{//untuk masukin data
            $sql1 = "insert into coral(username, email, password)values('$username','$email', '$password')";
            $q1   = mysqli_query($conn,$sql1);
            if($q1){
                $sukses = "Data sukses ditambahkan";
            }else{
                $gagal  = "Data gagal ditambahkan";
            }
        }
        
    }else{
        $gagal  = "Silahkan memasukkan semua data";
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
                        <span class="description-header">Dashboard</span>
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
                <!-- Memasukkan data -->
                <div class="card">
                    <div class="card-header">
                        Create/Edit Data
                    </div>
                    <div class="card-body">
                        <?php 
                        if($gagal){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $gagal ?>
                            </div>
                        <?php 
                            header("refresh:5;url=dashboardadmin.php");   
                        }
                        ?>
                        <?php 
                        if($sukses){
                            ?>
                            <div class="alert alert-sukses" role="alert">
                                <?php echo $sukses ?>
                            </div>
                        <?php 
                            header("refresh:5;url=dashboardadmin.php");   
                        }
                        ?>
                        <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $password?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="simpan" value="simpan data" class="btn btn-primary"></input>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Menampilkan data -->
                <div class="card">
                    <div class="card-header text-white bg secondary">
                        Data User
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">#</th>
                                    <th scope="col">#</th>
                                    <th scope="col">#</th>
                                </tr>
                                <tbody>
                                    <?php
                                    $sql2 = "select * from users order by id desc";
                                    $q2   = mysqli_query($conn,$sql2);
                                    $urut = 1;
                                    while($r2 = mysqli_fetch_array($q2)){
                                        $id    = $r2['id'];
                                        $username = $r2['id'];
                                        $email = $r2['id'];
                                        $password = $r2['id'];

                                        ?>
                                        <tr>
                                            <th scope="row"> <?php echo $urut++?><th>
                                            <td scope="row"><?php echo $username ?></td>
                                            <td scope="row"><?php echo $email ?></td>
                                            <td scope="row"><?php echo $password ?></td>
                                            <td scope="row">
                                                <a href="dashboardadmin.php?op=edit&id"<?php echo $id?>>
                                                <button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href="dashboardadmin.php?op=delete&id"<?php echo $id?> onclick="return confirm('Yakin untuk menghapus data?')">
                                                <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                    }
                                    ?>
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