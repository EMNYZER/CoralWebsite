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
      <a href="dashboard.php" class="logo">CORAL<span>.</span></a>
      <div class="navigation">
         <div class="menu-nav">
            <a href="dashboard.php" class="active">Home</a>
            <a href="dashboard.php">About</a>
            <a href="dashboard.php">Class</a>
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
            <a href="dashboard.php">Tutor</a>
            <!-- <a href="homeb.php">Karya</a> -->
            <a href="profileUser.php">Profile</a>
            <a href="index.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>

   <section class="profileU" id="profileU">
      <div class="boxx">
         <div class="box7">
           <div class="desc">
            <?php
               require('control/db.php');
               session_start();
               $email = $_SESSION['email'];
               $username = $_SESSION['username'];
            ?>
             <h1><?php echo $username;?></h1>
             <h3>Email</h3>
             <p><?php echo $email;?></p>
           </div>
           <div class="arrow">
             <a href="transaksi.php" class="btn">Edit</a>
           </div>
         </div>
      </div>
      <div class="card" style="width: 20rem;">
        <img src="images/profileawal.jpeg" class="card-img-top" alt="...">
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
   <script>
    feather.replace();
  </script>

</body>
</html>