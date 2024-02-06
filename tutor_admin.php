<?php
require('control/db.php');

$nama_tutor ="";
$desk_tutor ="";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id_tutor = $_GET['id_tutor'];
    $sql1 = "DELETE FROM tutors WHERE id_tutor = '$id_tutor'";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'tutor_admin.php';
              </script>";
    }else{
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }
}

if($op == 'edit'){
    $id_tutor   = $_GET['id_tutor'];
    $sql2 = "SELECT * FROM tutors WHERE id_tutor = '$id_tutor'";
    $q2   = mysqli_query($conn,$sql2);
    $r1   = mysqli_fetch_assoc($q2);
    $nama_tutor = $r1['nama_tutor'];
    $desk_tutor = $r1['desk_tutor'];
    if($nama_tutor == ''){
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $nama_tutor = $_POST['nama_tutor'];
    $desk_tutor = $_POST['desk_tutor'];

    if($nama_tutor){
        if($op =='edit'){//untuk update
            $id_tutor = $_GET['id_tutor'];
            $sql3 = "UPDATE tutors set nama_tutor = '$nama_tutor', desk_tutor = '$desk_tutor' where id_tutor ='$id_tutor'";
            $q3 = mysqli_query($conn,$sql3);
            if($q3){
                echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'tutor_admin.php';
                      </script>";
            }else{
                $gagal = "data gagal diupdate";
            }
        }else{//untuk masukin data
            $sql1 = "INSERT into `tutors` (nama_tutor, desk_tutor) VALUES ('$nama_tutor', '$desk_tutor')";
            $q1   = mysqli_query($conn,$sql1);
            if($q1){
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'tutor_admin.php';
                      </script>";
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
                <!-- Memasukkan data -->
                <div class="card">
                    <div class="card-header">
                        Create/Edit Data
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Nama tutor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_tutor" name="nama_tutor" value="<?php echo $nama_tutor; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Deskripsi tutor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="desk_tutor" name="desk_tutor" value="<?php echo $desk_tutor; ?>">
                                </div>
                            </div>
                            <!-- <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" value="">
                                </div>
                            </div> -->
                            <div class="col-12">
                                <input type="submit" name="simpan" value="simpan data" class="btn btn-primary"></input>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Menampilkan data -->
                <div class="card">
                    <div class="card-header text-black bg secondary">
                    Data tutor
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama tutor</th>
                                    <th scope="col">Deskripsi tutor</th>
                                </tr>
                                <?php
                                $query = "SELECT id_tutor,desk_tutor,nama_tutor FROM tutors";
                                $result = mysqli_query($conn, $query);
                       
                                if (!$result) {
                                   die("Error: " . mysqli_error($conn));
                                }
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $desk_tutor = $row['desk_tutor'];
                                    $nama_tutor = $row['nama_tutor'];
                                    $id_tutor = $row['id_tutor'];
                                ?>
                                <tr>
                                    <td scope="col" class="kelas"><?php echo $nama_tutor; ?></td>
                                    <td scope="col"><?php echo $desk_tutor; ?></td>
                                    <td scope="row" class="kelass">
                                                <a href="tutor_admin.php?op=edit&id_tutor=<?php echo $id_tutor; ?>">
                                                <button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href="tutor_admin.php?op=delete&id_tutor=<?php echo $id_tutor; ?>" onclick="return confirm('Yakin untuk menghapus data?')">
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