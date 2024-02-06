<?php
require('control/db.php');

$artist ="";
$foto_karya ="";
$desk_karya ="";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id_karya = $_GET['id_karya'];
    $sql1 = "DELETE FROM art WHERE id_karya = '$id_karya'";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'karya_admin.php';
              </script>";
    }else{
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }
}

if($op == 'edit'){
    $id_karya   = $_GET['id_karya'];
    $sql2 = "SELECT * FROM art WHERE id_karya = '$id_karya'";
    $q2   = mysqli_query($conn,$sql2);
    $r1   = mysqli_fetch_assoc($q2);
    $artist = $r1['artist'];
    $foto_karya = $r1['foto_karya'];
    $desk_karya = $r1['desk_karya'];
    if($foto_karya == ''){
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $artist = $_POST['artist'];
    $foto_karya = $_POST['foto_karya'];
    $desk_karya = $_POST['desk_karya'];

    if($foto_karya){
        if($op =='edit'){//untuk update
            $id_karya = $_GET['id_karya'];
            $sql3 = "UPDATE art set artist = '$artist', foto_karya = '$foto_karya', desk_karya = '$desk_karya' where id_karya ='$id_karya'";
            $q3 = mysqli_query($conn,$sql3);
            if($q3){
                echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'karya_admin.php';
                      </script>";
            }else{
                $gagal = "data gagal diupdate";
            }
        }else{//untuk masukin data
            $sql1 = "INSERT into `art` (artist, foto_karya, desk_karya) VALUES ('$artist', '$foto_karya', '$desk_karya')";
            $q1   = mysqli_query($conn,$sql1);
            if($q1){
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'karya_admin.php';
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
                                <label for="email" class="col-sm-2 col-form-label">Artist</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="artist" name="artist" value="<?php echo $artist; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="desk_karya" name="desk_karya" value="<?php echo $desk_karya; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Karya</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="foto_karya" name="foto_karya" value="<?php echo $foto_karya; ?>">
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
                    Data karya
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Artist</th>
                                    <th scope="col">Karya</th>
                                    <th scope="col">Deskripsi</th>
                                </tr>
                                <?php
                                $query = "SELECT id_karya,artist,foto_karya,desk_karya FROM art";
                                $result = mysqli_query($conn, $query);
                       
                                if (!$result) {
                                   die("Error: " . mysqli_error($conn));
                                }
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $artist = $row['artist'];
                                    $foto_karya = $row['foto_karya'];
                                    $desk_karya = $row['desk_karya'];
                                    $id_karya = $row['id_karya'];
                                ?>
                                <tr>
                                    <td scope="col" class="listkelas"><?php echo $artist; ?></td>
                                    <td scope="col"><img src="<?php echo $foto_karya; ?>" alt="" width="200" height="200"></td>
                                    <td scope="col" class="listkelas"><?php echo $desk_karya; ?></td>
                                    <td scope="row" class="listkelas">
                                                <a href="karya_admin.php?op=edit&id_karya=<?php echo $id_karya; ?>">
                                                <button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href="karya_admin.php?op=delete&id_karya=<?php echo $id_karya; ?>"onclick="return confirm('Yakin untuk menghapus data?')">
                                                <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                </tr>
                                <?php
                                    }
                                ?>
                                <tbody>
                                    
                                        <!-- <tr>
                                            <th scope="row"> <th>
                                            <td scope="row"></td>
                                            <td scope="row"></td>
                                            <td scope="row"></td>
                                            <td scope="row">
                                                <a href="dashboardadmin.php?op=edit&id">
                                                <button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href="dashboardadmin.php?op=delete&id"onclick="return confirm('Yakin untuk menghapus data?')">
                                                <button type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                            
                                        </tr> -->
                                        <?php
                                    
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