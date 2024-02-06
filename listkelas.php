<?php
require('control/db.php');

$judul ="";
$Path ="";
$id_video ="";
// $nama_kelas = "";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if (isset($_GET['nama_kelas'])) {
    $nama_kelas = $_GET['nama_kelas'];

if($op == 'delete'){
    $id_video = $_GET['id_video'];
    $sql1 = "DELETE FROM videos WHERE id_video = '$id_video' ";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'kelas_admin.php'
              </script>";
    }else{
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }
}


if($op == 'edit'){
    $nama_kelas   = $_GET['nama_kelas'];
    $sql2 = "SELECT * FROM videos WHERE nama_kelas = '$nama_kelas' AND ";
    $q2   = mysqli_query($conn,$sql2);
    $r1   = mysqli_fetch_assoc($q2);
    $judul = $r1['judul'];
    $Path = $r1['Path'];
    if($judul == ''){
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $judul = $_POST['judul'];
    $Path = $_POST['Path'];

    if($Path){
        if($op =='edit'){//untuk update
            $nama_kelas = $_GET['nama_kelas'];
            $sql3 = "UPDATE videos set judul = '$judul', Path = '$Path' where nama_kelas ='$nama_kelas'";
            $q3 = mysqli_query($conn,$sql3);
            if($q3){
                echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'kelas_admin.php';
                      </script>";
            }else{
                $gagal = "data gagal diupdate";
            }
        }else{//untuk masukin data
            $sql1 = "INSERT into `videos` (judul, Path, nama_kelas) VALUES ('$judul', '$Path', '$nama_kelas')";
            $q1   = mysqli_query($conn,$sql1);
            if($q1){
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'kelas_admin.php';
                      </script>";
            }else{
                $gagal  = "Data gagal ditambahkan";
            }
        }
        
    }else{
        $gagal  = "Silahkan memasukkan semua data";
    }
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
                                <label for="email" class="col-sm-2 col-form-label">Judul video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Video</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="Path" name="Path" value="<?php echo $Path; ?>">
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
                    <div class="card-header text-black bg secondary">
                    Daftar video
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Judul video</th>
                                    <th scope="col">Video</th>
                                    <!-- <th scope="col">Video</th> -->
                                 
                                </tr>
                                <?php
                                if (isset($_GET['nama_kelas'])) {
                                    $nama_kelas = $_GET['nama_kelas'];

                                    $query = "SELECT id_video, judul,nama_kelas, Path FROM videos WHERE nama_kelas = ?";
                                    $stmt = mysqli_prepare($conn, $query);
                                    mysqli_stmt_bind_param($stmt, "s", $nama_kelas);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                       
                                if (!$result) {
                                   die("Error: " . mysqli_error($conn));
                                }
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $judul = $row['judul'];
                                    $Path = $row['Path'];
                                    $id_video = $row['id_video'];
                                    $nama_kelas = $row['nama_kelas'];
                                ?>
                                <tr>
                                    <td scope="col"><?php echo $judul; ?></td>
                                    <td scope="col"><?php echo $Path; ?></td>
                                    <td scope="row">
                                                <a href="listkelas.php?nama_kelas=<?php echo $nama_kelas; ?>&op=edit&id_video=<?php echo $id_video; ?>">
                                                <button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href="listkelas.php?nama_kelas=<?php echo $nama_kelas; ?>&op=delete&id_video=<?php echo $id_video; ?>" onclick="return confirm('Yakin untuk menghapus data?')">
                                                <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                </tr>
                                <?php
                                    } }
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