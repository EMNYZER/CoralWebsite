<?php
require('control/db.php');

$foto_karya="";
$desk_karya="";
// $sukses ="";
// $gagal  ="";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if (isset($_POST['simpan'])) { //untuk create
  $foto_karya = $_POST['foto_karya'];
  $desk_karya = $_POST['desk_karya'];

  if ($foto_karya) {
    if ($op == 'edit') { //untuk update
      $id_karya = $_GET['id_karya'];
      $sql3 = "UPDATE art set  =  foto_karya = '$foto_karya', desk_karya = '$desk_karya' where id_karya ='$id_karya'";
      $q3 = mysqli_query($conn, $sql3);
      if ($q3) {
        echo "<script>
                        alert('Data berhasil diperbarui');
                        window.location.href = 'karya_admin.php';
                      </script>";
      } else {
        $gagal = "data gagal diupdate";
      }
    } else { //untuk masukin data
      $sql1 = "INSERT into `art` (foto_karya, desk_karya) VALUES ('$foto_karya', '$desk_karya')";
      $q1 = mysqli_query($conn, $sql1);
      if ($q1) {
        echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'karya_admin.php';
                      </script>";
      } else {
        $gagal = "Data gagal ditambahkan";
      }
    }

  } else {
    $gagal = "Silahkan memasukkan semua data";
  }
}
?>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/video.css">
</head>

<body>
  <header>
    <a href="dashboard_premium.php" class="logo">CORAL<span>.</span></a>
    <div class="navigation">
      <div class="menu-nav">
        <a href="dashboard_premium.php" class="active">Home</a>
        <a href="dashboard_premium.php">About</a>
        <!-- <div class="dropdown">
            <a href="#menu" class="dropbtn">Class
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


  <div class="titles">
    <h2>Upload Karya</h2>
  </div>
  <div class="karya" id="karya">
    <div class="box5">
      <div class="desc">
        <!-- <h2>Upload Karya</h2> -->
        <form action="karya.php" method="post">
          <label for="gambar" class="label"> Karya </label>
          <input type="file" name="gambar" id="gambar" value="<?php echo $foto_karya; ?>">
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                value="<?php echo $desk_karya; ?>">
            </div>
          </div>
          <a class="btnv"> <input type="submit" name="simpan" value="Add Karya"></input></a>
        </form>
      </div>
    </div>
  
    <div class="titles">
      <h2>KARYA-KARYA DARI PARA MURID</h2>
    </div>
    <table>
      <tr>
        <th>Karya</th>
        <th>Deskripsi karya</th>
      </tr>
      <tr>
        <?php
        $query = "SELECT id_karya,foto_karya,desk_karya FROM art";
        $result = mysqli_query($conn, $query);

        if (!$result) {
           die("Error: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
          $foto_karya = $row['foto_karya'];
          $desk_karya = $row['desk_karya'];
          ?>
        <tr>
          <td scope="col"><img src="<?php echo $foto_karya; ?>" alt="" width="250" height="150"></td>
          <td scope="col" class="listkelas">
            <?php echo $desk_karya; ?>
          </td>
        </tr>
        <?php
        }
        ?>
      <tr>
      </tr>

      <!-- <tr>
         <td><img src="images/slide33.jpg" alt="" width="350" height="250"></td>
            <td>Terus berusaha membuat karya hebat</td>
         </tr> -->
    </table>
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
            <a href="https://www.instagram.com/harrypotterfilm/"><i data-feather="instagram"></i></a>
            <a href="https://www.facebook.com/harrypottermovie/"><i data-feather="facebook"></i></a>
            <!-- <a href="https://www.youtube.com/@harrypotter"
                ><i data-feather="youtube"></i
              ></a> -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- <div class="fixed-footer"></div> -->

  <script type="text/javascript">
    window.addEventListener('scroll', function () {
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