<?php
require('control/db.php');

$username ="";
$email ="";
$password ="";
$deskripsi="";
$foto_profile="";
// $sukses ="";
// $gagal  ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "DELETE FROM users WHERE id = '$id'";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'user_admin.php';
              </script>";
    }else{
        echo "<script>alert('Data tidak berhasil dihapus');</script>";
    }
}

if($op == 'edit'){
    $id   = $_GET['id'];
    $sql2 = "SELECT * FROM users WHERE id = '$id'";
    $q2   = mysqli_query($conn,$sql2);
    $r1   = mysqli_fetch_assoc($q2);
    $username = $r1['username'];
    $email = $r1['email'];
    $password = $r1['password'];
    $deskripsi = $r1['deskripsi'];
    if($email == ''){
        echo "<script>alert('Data tidak ditemukan');</script>";
    }
}

if(isset($_POST['simpan'])){//untuk create
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $deskripsi = $_POST['deskripsi'];

    if($email){
        if($op =='edit'){//untuk update
            $id = $_GET['id'];
            $sql3 = "UPDATE users set username = '$username', email = '$email', password = '$password', deskripsi = '$deskripsi' where id ='$id'";
            $q3 = mysqli_query($conn,$sql3);
            if($q3){
                echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'user_admin.php';
                      </script>";
            }else{
                $gagal = "data gagal diupdate";
            }
        }else{//untuk masukin data
            $sql1 = "INSERT into `users` (username, password, email, deskripsi) VALUES ('$username', '$password', '$email', '$deskripsi')";
            $q1   = mysqli_query($conn,$sql1);
            if($q1){
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'user_admin.php';
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
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
   <title>Profile User</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/videoo.css">
   <script src="https://unpkg.com/feather-icons"></script>
   

</head>
<body>

<header>
      <a href="dashboard_premium.php" class="logo">CORAL<span>.</span></a>
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
                  <a href="kelas1.php">Photography</a>
                  <a href="kelas2.php">Video Editing</a>
                  <a href="kelas3.php">3D Animation</a>
                  <a href="kelas4.php">Pixel Art</a>
                  <a href="kelas5.php">Music Composer</a>
               </div>
            </div> -->
            <a href="dashboard_premium.php">Tutor</a>
            <a href="karya.php">Karya</a>
            <a href="profileUser_premium.php">Profile</a>
            <a href="index.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>

   <section class="profileU" id="profileU">
      <div class="boxx">
         <div class="box3">
           <div class="desc">
            <?php
               require('control/db.php');
               session_start();
               $id = $_SESSION['id'];
              //  $email = $_SESSION['email'];
              //  $username = $_SESSION['username'];
               $query = "SELECT * FROM users WHERE id = '$id'";

               
              //  $id = $row['id'];
                  $result = mysqli_query($conn, $query);
                       
                  if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $username = $row['username'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $deskripsi = $row['deskripsi'];
                    $foto_profile= $row['foto_profile'];
                  } else {
                    die("Error: " . mysqli_error($conn));
                  }
            ?>
             <h1><?php echo $username;?></h1>
             <h3>Email</h3>
             <p><?php echo $email;?></p>
             <p><?php echo $deskripsi;?></p>
           </div>
           <div class="arrow">
             <!-- <a href="profileUseredit.php">Edit</a> -->
             <a href="profileUseredit.php?op=edit&id=<?php echo $id; ?>">Edit</a>
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