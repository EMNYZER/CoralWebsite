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
   <title>Profile Tutor</title>

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
            <a href="dashboard_premium.php">Tutor</a>
            <a href="karya.php">Karya</a>
            <a href="profileUser_premium.php">Profile</a>
            <a href="index.php" class="navbar-right">Logout</a>
         </div>
      </div>
   </header>
   <?php
   require('control/db.php');

   if (isset($_GET['id_tutor'])) {
     $tutor_id = $_GET['id_tutor'];

     $query = "SELECT id_tutor, foto_tutor, desk_tutor,nama_tutor FROM tutors WHERE id_tutor = $tutor_id";
     $result = mysqli_query($conn, $query);

     if (!$result) {
      die("Error: " . mysqli_error($conn));
     }

     $row = mysqli_fetch_assoc($result);
      $foto_tutor = $row['foto_tutor'];
      $nama_tutor = $row['nama_tutor'];
      $desk_tutor = $row['desk_tutor'];
    ?>
   <section class="profileT" id="profileT">
      <!-- <img src="images/ekaprofile.jpg" alt="eka" width="500" height="300" class="rounded-circle">
      <div class="profiles">
         <h1>Eka Gustiwana</h1>
         <div class="profiless">
          <div class="profiles1">
            <p>Eka Gustiwana adalah seorang musisi, produser musik, dan content creator yang terkenal di Indonesia. Ia lahir di Jakarta pada 23 Desember 1990, dan mulai menarik perhatian publik sejak tahun 2011 ketika ia merilis video musik "Medley" yang menjadi viral di YouTube. <br/><br/>Sejak itu, Eka Gustiwana telah menjadi salah satu tokoh kreatif Indonesia yang paling dihormati, dengan karya-karya yang sangat beragam. Ia sering bekerja sama dengan berbagai artis terkenal, termasuk Glenn Fredly, Ariel Noah, Raisa, GAC, dan banyak lagi. <br/><br/> Selain itu, Eka Gustiwana juga aktif di media sosial, ia juga sering berkolaborasi dengan para YouTuber dan selebriti lainnya untuk membuat video musik, video komedi, dan konten-konten menarik lainnya. </p>
           </div>
           <div class="profiles2">
            <p>Meskipun terkenal sebagai seorang musisi dan content creator, Eka Gustiwana juga merupakan lulusan Fakultas Teknik Sipil dan Lingkungan di Institut Teknologi Bandung. Ia sering menyampaikan pesan-pesan inspiratif dan motivasi kepada penggemarnya, dan diakui sebagai salah satu sosok inspiratif bagi banyak anak muda Indonesia. <br/><br/> Dalam kariernya, Eka Gustiwana telah memenangkan beberapa penghargaan, termasuk penghargaan Best Music Video di Indonesian Choice Awards 2017 dan penghargaan Pemenang Kategori Music di Shorty Awards 2019. Ia juga telah tampil di berbagai acara televisi dan panggung, termasuk Indonesian Idol dan The Voice Indonesia.</p>
           </div>
         </div>
      </div> -->
      <div class="card1" style="width: 90rem; height: 37rem;">
        <img src="<?php echo $foto_tutor; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><?php echo $nama_tutor; ?></p>
          <!-- <p class="card-text">Musisi Musik Indonesia</p> -->
          <p class="card-text">Follow <?php echo $nama_tutor; ?> on social media</p>
          <a class ="logoo" href="https://www.instagram.com/ekagustiwana/?hl=en "><i data-feather="instagram"></i></a>
          <a class ="logoo" href="https://www.youtube.com/@EkaGustiwanaOfficial"><i data-feather="youtube"></i></a>
          <a href="https://id.wikipedia.org/wiki/Eka_Gustiwana " class="btna">Read More</a>
        </div>
      </div>
      
      <div class="boxx">
        <div class="box1">
          <div class="desc">
            <p><p><?php echo $desk_tutor; ?></p></p>
           </div>
          <div class="arrow">
          </div>
        </div>
        <!-- <div class="box2">
          <div class="desc">
            <p><p></p></p>
          </div>
          <div class="arrow">
          </div>
        </div> -->
      </div>
      
   </section>
   <?php
    } else {
      echo "Tidak ada tutor yang dipilih.";
      }   
      ?>


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