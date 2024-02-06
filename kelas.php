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
   <title>Kelas</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/videoo.css">
   

</head>
<body>
<?php
   require('control/db.php');

   $query = "SELECT tutors.id_tutor, tutors.foto_tutor, tutors.nama_tutor,class.foto_kelas, class.nama_kelas, class.deskripsi_kelas FROM class JOIN tutors ON class.nama_tutor = tutors.nama_tutor";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      die("Error: " . mysqli_error($conn));
   }
   ?>
   <header>
      <a href="dashboard_premium.php" class="logo">CORAL<span>.</span></a>
      <div class="navigation">
         <div class="menu-nav">
            <a href="dashboard_premium.php" class="active">Home</a>
            <a href="dashboard_premium.php">About</a>
            <div class="dropdown">
               <a href="#" class="dropbtn">Class
                  <i class="fas fa-angle-down"></i>
               </a>
               <div class="column">
               <?php
               while ($row = mysqli_fetch_assoc($result)) {
                  $nama_kelas = $row['nama_kelas'];
                  $tutor_id = $row['id_tutor'];
               ?>
               <a href="kelas.php?id_tutor=<?php echo $tutor_id; ?>"><?php echo $nama_kelas; ?></a>
               <?php
                  }
               ?>
               </div>
            </div>
            <a href="dashboard_premium.php">Tutor</a>
            <a href="karya.php">Karya</a>
            <a href="profileUser_premium.php">Profile</a>
            <a href="index.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>

   <!-- <section class="jumbotron text-center">
      <a href="kelas2.html"><img src="images/faizal.jpeg" alt="faizal" width="200" class="rounded-circle"></a>
      <h1 class="display-4">Faizal Westcott</h1>
      <p class="lead">Photography</p>
    </section> -->
    <?php
    require('control/db.php');

    if (isset($_GET['id_tutor'])) {
      $tutor_id = $_GET['id_tutor'];

      $query = "SELECT tutors.id_tutor, tutors.foto_tutor, tutors.nama_tutor,class.foto_kelas, class.nama_kelas, class.deskripsi_kelas FROM class JOIN tutors ON class.id_kelas = tutors.id_tutor WHERE id_tutor = $tutor_id";
      $result = mysqli_query($conn, $query);

      if (!$result) {
         die("Error: " . mysqli_error($conn));
      }
   
      $row = mysqli_fetch_assoc($result);
      $foto_tutor = $row['foto_tutor'];
      $nama_tutor = $row['nama_tutor'];
      $nama_kelas = $row['nama_kelas'];
      $deskripsi_kelas = $row['deskripsi_kelas'];
      ?>
      <section class="biodata">
         <style>
            .biodata{
               background-image: url(images/ikonkelas.png);
               background-size: cover;
            }
         </style>
         <div class="bio">
            <a href="Profile_tutor.php?id_tutor=<?php echo $tutor_id; ?>"><img src="<?php echo $foto_tutor; ?>" alt="..." width="220" height="250" class="rounded-circle"></a>
            <h1><?php echo $nama_tutor; ?></h1>
            <h3><?php echo $nama_kelas; ?></h3>
            <p><?php echo $deskripsi_kelas; ?></p>
            <i class="fa-solid fa-circle-arrow-down fa-2xl"></i>
         </div>
         </section>

      <?php
    } else {
      echo "Tidak ada tutor yang dipilih.";
   }   
    ?>
<?php
if (isset($_GET['id_video'])) {
   $id_video = $_GET['id_video'];
} else {
   $id_video = "";
}

$query = "SELECT * FROM videos WHERE nama_kelas = ? and id_video = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $nama_kelas, $id_video);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if ($result && mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
   $id_video = $row['id_video'];
   $Path = $row['Path'];
   $judul = $row['judul'];
} 
?>
<div class="video">
   <div class="main-video-container">
   <?php if ($result && mysqli_num_rows($result) > 0) { ?>
      <video src="<?php echo $Path; ?>" loop controls class="main-video"></video>
      <h3 class="main-vid-title"><?php echo $judul; ?></h3>
      <?php } else { ?>
         <p>Pilih Video</p>
      <?php } ?>
   </div>

   <div class="video-list-container">
   <?php
      $query = "SELECT * FROM videos WHERE nama_kelas = ? ";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $nama_kelas);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
         $id_video = $row['id_video'];
         $Path = $row['Path'];
         $judul = $row['judul'];
      ?>
      <a class="list active" href="kelas.php?id_tutor=<?php echo $tutor_id; ?>&id_video=<?php echo $id_video; ?>">
         <video src="<?php echo $Path; ?>" class="list-video"></video>
         <h3 class="list-title"><?php echo $judul; ?></h3>
      </a>
      <?php } ?>
   </div>
</div>

<div class="batas">
      <p>testestes</p>
    </div>

<footer class="footer">
   <div class="container">
     <div class="row">
       <div class="footer-col">
         <h4>About CORAL</h4>
         <ul>
           <li><a href="#">About us</a></li>
           <li><a href="#">Contact us</a></li>
           <li><a href="#">Our service</a></li>
         </ul>
       </div>
       <!-- <div class="footer-col">
         <h4>Product</h4>
         <ul>
           <li><a href="#">Books</a></li>
           <li><a href="#">Films</a></li>
           <li><a href="#">Merchandise</a></li>
         </ul>
       </div> -->
       <div class="footer-col">
         <h4>Guide and Help</h4>
         <ul>
           <li><a href="#">Care</a></li>
           <li><a href="#">Privacy Policy</a></li>
           <li><a href="#">Terms and Condition</a></li>
         </ul>
       </div>
       <div class="footer-col">
         <h4>Follow us on</h4>
         <div class="social-media">
           <a href="https://www.instagram.com/harrypotterfilm/"
             ><i data-feather="instagram"></i
           ></a>
           <a href="https://www.facebook.com/harrypottermovie/"
             ><i data-feather="facebook"></i
           ></a>
         </div>
       </div>
     </div>
   </div>
 </footer>
 <!-- <div class="fixed-footer"></div> -->


<!-- custom js file link  -->
<script src="js/video.js"></script>
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