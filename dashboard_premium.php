<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CORAL</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
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
          <a href="#about">About</a>
          <div class="dropdown">
            <a href="dashboard_premium.php" class="dropbtn">Class
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
          <a href="#expert">Tutor</a>
          <a href="karya.php">Karya</a>
          <a href="profileUser_premium.php">Profile</a>
          <a href="index.php" class="navbar-right">Logout</a>
        </div>
      </div>
    </header>
   <section class="banner" id="banner">
      <div class="content">
         <h2 class="titleText">Creative Online and Representative Art Learning</h2>
         <p>Dapatkan keterampilan baru dalam 10 menit bersama tutor-tutor hebat dan terpercaya!</p>
      </div>
   </section>

  
   <section class="about" id="about">
      <div class="row">
        <div class="content">
          <h2>About us</h2>
          <p>
            CORAL memiliki berbagai fitur pembelajaran online yang menawarkan
            kelas-kelas di berbagai bidang yang diampu oleh para tutor terkenal
            di bidang mereka. Setiap kelas diarahkan oleh tutor yang terkenal di
            bidang mereka.<br /><br />Lalu di dalam fitur tutor tersebut
            terdapat video pembelajaran yang berkualitas tinggi dengan durasi
            yang bervariasi, tergantung pada materi yang disampaikan. Setiap
            para pengguna yang bergabung dengan website ini dapat mengakses
            semua kelas yang tersedia dengan membayar biaya langganan bulanan
            atau tahunan.
          </p>
        </div>
      </div>
      <div class="slider"> 
        <div class="slides">
          <!-- <h2>About us</h2> -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <div class="slide first">
              <img src="images/slide22.jpg" alt="slide1">
            </div>
            <div class="slide">
              <img src="images/slide33.jpg" width="1000" height="700" alt="slide2">
            </div>
            <div class="slide">
              <img src="images/slide31.jpg" width="1000" height="700" alt="slide3">
            </div>
            <div class="navigation-auto">
              <div class="auto-btn1"></div>
              <div class="auto-btn2"></div>
              <div class="auto-btn3"></div>
            </div>
        </div>
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
        </div>
    </div>
    </section>

   <!-- icon section start-->
   <section class="icons-container">

      <div class="icons">
         <i class="fa-solid fa-film fa-xl"></i>
         <div class="info">
            <h3>Kelas berisi video</h3>
         </div>
      </div>  

      <div class="icons">
         <i class="fa-solid fa-person-chalkboard fa-xl"></i>
         <div class="info">
            <h3>Tutor terampil</h3>
         </div>
      </div>

      <div class="icons">
         <i class="fa-solid fa-book-open fa-xl"></i>
         <div class="info">
            <h3>Upload karya pengguna</h3>
         </div>
      </div>
   </section>

   <section class="menu" id="menu">
      <div class="title">
         <h2 class="titleText">Our Class</h2>
         <p>Terdapat banyak kelas menarik yang bisa diakses sepuasnya</p>
      </div>
      <div class="content">
      <?php

            $query = "SELECT tutors.id_tutor, tutors.foto_tutor, tutors.nama_tutor,class.foto_kelas, class.nama_kelas, class.deskripsi_kelas FROM class JOIN tutors ON class.nama_tutor = tutors.nama_tutor";
            $result = mysqli_query($conn, $query);

            if (!$result) {
               die("Error: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
               $foto_kelas = $row['foto_kelas'];
               $nama_kelas = $row['nama_kelas'];
               $deskripsi_kelas = $row['deskripsi_kelas'];
               $tutor_id = $row['id_tutor'];
               ?>
                  <div class="box">
                     <img src="<?php echo $foto_kelas; ?>" alt="class">
                     <div class="text">
                        <h3><?php echo $nama_kelas; ?></h3>
                     </div>
                     <div class="desc">
                        <p><?php echo $deskripsi_kelas; ?></p>
                     </div>
                     <div class="arrow">
                           <a href="kelas.php?id_tutor=<?php echo $tutor_id; ?>" class="fa-solid fa-circle-right fa-lg"></a>
                     </div>
                  </div>
               <?php
               }
            ?>
      </div>
   </section>

   <section class="expert" id="expert">
      <div class="title">
         <h2 class="titleText">Our Tutors</h2>
         <p>Banyak tutor menarik yang menawarkan ilmu bermanfaat</p>
      </div>
      <div class="content">
      <?php

         $query = "SELECT tutors.id_tutor, tutors.foto_tutor, tutors.nama_tutor,class.foto_kelas, class.nama_kelas, class.deskripsi_kelas FROM class JOIN tutors ON class.nama_tutor = tutors.nama_tutor";
         $result = mysqli_query($conn, $query);

         if (!$result) {
            die("Error: " . mysqli_error($conn));
         }

         while ($row = mysqli_fetch_assoc($result)) {
            $foto_tutor = $row['foto_tutor'];
            $nama_tutor = $row['nama_tutor'];
            $tutor_id = $row['id_tutor'];
            ?>
               <div class="box">
                  <img src="<?php echo $foto_tutor; ?>" alt="expert1">
               <div class="text">
                  <h3><?php echo $nama_tutor; ?></h3>
                  <a href="kelas.php?id_tutor=<?php echo $tutor_id; ?>" class="btna">Go to class</a>
               </div>
            </div>
            <?php
         }
      ?>
      </div>
   </section>

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
              <a href="https://www.instagram.com/harrypotterfilm/"><i data-feather="instagram"></i></a>
              <a href="https://www.facebook.com/harrypottermovie/"><i data-feather="facebook"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- <div class="fixed-footer"></div> -->

   <script type="text/javascript">
      window.addEventListener('scroll', function(){
         const header = document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0);
      });
   </script>
   <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
    </script>
   
</body>
</html>