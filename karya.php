<?php
require('control/db.php');

$artist = "";
$foto_karya = "";
$desk_karya = "";
$op = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
}

if (isset($_POST['simpan'])) {
  $artist = $_POST['artist'];
  $foto_karya = $_POST['foto_karya'];
  $desk_karya = $_POST['desk_karya'];

  if (!empty($foto_karya) && !empty($desk_karya)) {
    if ($op == 'edit') {
      if (isset($_GET['id_karya'])) {
        $id_karya = $_GET['id_karya'];
        $sql3 = "UPDATE art SET artist = '$artist', foto_karya = '$foto_karya', desk_karya = '$desk_karya' WHERE id_karya ='$id_karya'";
        $q3 = mysqli_query($conn, $sql3);
        if ($q3) {
          echo "<script>
                  alert('Data berhasil diperbarui');
                  window.location.href = 'karya.php';
                </script>";
          exit;
        } else {
          $gagal = "Data gagal diupdate";
        }
      } else {
        $gagal = "ID karya tidak valid";
      }
    } else {
      $sql1 = "INSERT INTO `art` (artist, foto_karya, desk_karya) VALUES ('$artist', '$foto_karya', '$desk_karya')";
      $q1 = mysqli_query($conn, $sql1);
      if ($q1) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = 'karya.php';
              </script>";
        exit;
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
  <link rel="stylesheet" href="css/videoo.css">
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


  <div class="titles">
    <h2>Upload Karya</h2>
  </div>
  <div class="karya" id="karya">
    <div class="box5">
      <div class="desc">
        <!-- <h2>Upload Karya</h2> -->
        <form action="karya.php" method="post">
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Artist</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="artist" name="artist" value="<?php echo $artist; ?>">
            </div>
          </div>
          <label for="gambar" class="label"> Karya </label>
          <input type="file" name="foto_karya" id="gambar" value="<?php echo $foto_karya; ?>">
          <p>*ukuran foto disarankan 1 : 1</p>
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="deskripsi" name="desk_karya" value="<?php echo $desk_karya; ?>">
            </div>
          </div>
          <a class="btnv"> <input type="submit" name="simpan" value="Add Karya"></input></a>
        </form>
      </div>
    </div>
  </div>  
  
    <div class="titles">
      <h2>Karya-Karya dari Para Murid</h2>
    </div>
  <div class="karya">
    <table class="tablek">
      <tr>
        <th>Artist</th>
        <th>Karya</th>
        <th>Deskripsi karya</th>
      </tr>
      <tr>
      <?php

      $query = "SELECT id_karya, artist, foto_karya, desk_karya FROM art";
      $result = mysqli_query($conn, $query);

      if (!$result) {
         die("Error: " . mysqli_error($conn));
      }

      while ($row = mysqli_fetch_assoc($result)) {
      $artist = $row['artist'];
      $foto_karya = $row['foto_karya'];
      $desk_karya = $row['desk_karya'];
      ?>
      <tr>
      <td scope="col" class="listkelas">
        <?php echo htmlspecialchars($artist); ?>
      </td>
      <td scope="col" class="karyaa"><img src="<?php echo htmlspecialchars($foto_karya); ?>" alt="" width="200" height="200"></td>
      <td scope="col" class="listkelas">
         <?php echo htmlspecialchars($desk_karya); ?>
      </td>
      </tr>
      <?php
      }
      ?>

      <tr>
      </tr>

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