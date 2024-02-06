<?php
require('control/db.php');

$username ="";
$deskripsi ="";
$foto_profile= "";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'edit'){
    $id   = $_GET['id'];
    $sql2 = "SELECT * FROM users WHERE id = '$id'";
    $q2   = mysqli_query($conn,$sql2);
    $r1   = mysqli_fetch_assoc($q2);
    $username = $r1['username'];
    $deskripsi = $r1['deskripsi'];
    $foto_profile= $r1['foto_profile'];
    if($username == ''){
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $username = $_POST['username'];
    $deskripsi = $_POST['deskripsi'];
    $foto_profile= $_POST['foto_profile'];

    if($username){
        if($op =='edit'){//untuk update
            $id = $_GET['id'];
            $sql3 = "UPDATE users set username = '$username',deskripsi = '$deskripsi', foto_profile= '$foto_profile' where id ='$id'";
            $q3 = mysqli_query($conn,$sql3);
            if($q3){
                echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'profileUser_premium.php';
                      </script>";
            
            }else{
                $gagal = "data gagal diupdate";
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
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
   <title>Profile User</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/videoo.css">
   <!-- <link rel="stylesheet" href="style.css" -->
   <script src="https://unpkg.com/feather-icons"></script>
   

</head>
<body>

<header>
      <a href="#" class="logo">CORAL<span>.</span></a>
      <div class="navigation">
         <div class="menu-nav">
            <a href="dashboard_premium.php" class="active">Home</a>
            <a href="dashboard_premium.php">About</a>
            <a href="dashboard_premium.php">Class</a>
            <!-- <div class="dropdown">
               <a href="#" class="dropbtn">Class
                  <i class="fas fa-angle-down"></i>
               </a>
               <div class="column">
                  <a href="kelas.php">Photography</a>
                  <a href="kelas.php">Video Editing</a>
                  <a href="kelas.php">3D Animation</a>
                  <a href="kelas.php">Pixel Art</a>
                  <a href="kelas.php">Music Composer</a>
               </div>
            </div> -->
            <a href="dashboard_premium.php">Tutor</a>
            <a href="karya.php">Karya</a>
            <a href="profileUser_premium.php">Profile</a>
            <a href="login.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>

   <section class="profileU" id="profileU">
      <div class="boxx">
         <div class="box4">
           <div class="desc">
             <h2>Edit profile</h2>
             <?php
                  session_start();
                  // $email = $_SESSION['email'];
                  // $username = $_SESSION['username'];
                  $id = $_SESSION['id'];
                  $query = "SELECT * FROM users WHERE id = '$id'";
                  $result = mysqli_query($conn, $query);   
                  // if (!$result) {
                  //    die("Error: " . mysqli_error($conn));
                  // }
                  if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $username = $row['username'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $deskripsi = $row['deskripsi'];
                    $foto_profile = $row['foto_profile'];
                  } else {
                    die("Error: " . mysqli_error($conn));
                  }

                ?>
             <!-- <a href="profileUseredit.php?op=edit&id="> -->
             <!-- <button type="button" class="btn btn-warning">Edit</button></a> -->
             <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi; ?>">
                                </div>
                            </div>
                              <div class="input-gambar">
                              <label for="gambar" class="input-label"></label>
                                <input type="file" class="foto-control" id="gambar" name="foto_profile" value="<?php echo $foto_profile; ?>">
                              </div>
                            <a href="" class="btn"><input type="submit" name="simpan" value="Save Data"></input></a>
              </form>
           </div>
           <div class="arrow">
             <!-- <a href="kelas1.html">Save</a> -->
           </div>
         </div>
       </div>
   
       <div class="card" style="width: 20rem;">
        <img src="<?php echo $foto_profile;?>" class="card-img-top" alt="...">
      </div>       
   </section>


<!-- custom js file link  -->
<script src="video.js"></script>
<script type="text/javascript">
   window.addEventListener("scroll", function () {
     const header = document.querySelector("header");
     header.classList.toggle("sticky", window.scrollY > 0);
   });
   </script>
   <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
    </script>

</body>
</html>