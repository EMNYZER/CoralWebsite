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
            <a href="karya.php">Karya</a>
            <a href="profileUser_premium.php">Profile</a>
            <a href="index.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>

   <section class="profileU" id="profileU">
      <div class="boxx">
         <div class="box4">
           <div class="desc">
             <h2>Edit profile</h2>
             <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="">
                                </div>
                            </div>
                            <!-- <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" value="">
                                </div>
                            </div> -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" value="">
                                </div>
                            </div>
                            <a href="profileUser_premium.php" class="btn">Save Data</a>
                        </form>
           </div>
           <div class="arrow">
             <!-- <a href="kelas1.html">Save</a> -->
           </div>
         </div>
       </div>
   
      <div class="card" style="width: 25rem;">
        <img src="images/profileawal.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
         <!-- <p>Upload Photo</p> -->
         <div class="input-gambar">
         <label for="gambar" class="input-label"> Upload Photo </label>
         <input type="file" name="gambar" id="gambar">
         </div>
       
         <!-- <i data-feather="upload"></i> -->
          <!-- <p class="card-text">Eka Gustiwana</p>
          <p class="card-text">Musisi Musik Indonesia</p>
          <p class="card-text">Follow Eka on Social Media</p>
          <a href="https://www.instagram.com/harrypotterfilm/"
             ><i data-feather="instagram"></i
           ></a>
           <a href="https://www.facebook.com/harrypottermovie/"
             ><i data-feather="facebook"></i
           ></a>
           <a href="https://www.youtube.com/@harrypotter"
             ><i data-feather="youtube"></i
           ></a> -->
        </div>
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