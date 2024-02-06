<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TRANSAKSI CORAL</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&family=Itim&family=Old+Standard+TT:wght@700&family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"/>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <!-- my style -->
    <link rel="stylesheet" href="css/stylex.css" />
  </head>
  <body>    
  <header>
        <!-- <a href="#" class="logo">CORAL<span>.</span></a>
        <ul class="navigation"> -->
          <!-- <li><a href="utama.php">Home</a></li>
          <li><a href="utama.php">About</a></li>
          <li><a href="utama.php">Introduction</a></li> -->
        </ul>
      </header>

    <?php
      require('control/db.php');
      session_start();

      if (isset($_REQUEST['nama'])) {
        $nama = stripslashes($_REQUEST['nama']);
        $nama = mysqli_real_escape_string($conn, $nama);
        $rekening    = stripslashes($_REQUEST['rekening']);
        $rekening    = mysqli_real_escape_string($conn, $rekening);
        $nohp = stripslashes($_REQUEST['nohp']);
        $nohp = mysqli_real_escape_string($conn, $nohp);

        $query    = "INSERT into `transaksi` (namalengkap, norekening, nohp) VALUES ('$nama', '$rekening', '$nohp')";
        $result   = mysqli_query($conn, $query);
        $id = $_SESSION['id'];

        if ($result) {
          $q = "UPDATE users SET premium = true WHERE id='$id';";
          $r = mysqli_query($conn, $q);
          if ($r){
              echo "<script>
              window.location.href = 'dashboard_premium.php';
              </script>";
          }
        } else {
          echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>";   
        }

      } else {
    ?>
    <section class="transaksi" id="transaksi">
    <div class="arrows">
      <a href="dashboard.php" class="fa-solid fa-arrow-left fa-xl"></a>
      </div>

      <div class="slider"> 
        <div class="slides">
          <!-- <h2>About us</h2> -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <div class="slide first">
              <img src="images/transaksi1.png" alt="slide1">
            </div>
            <div class="slide">
              <img src="images/transaksi2.png" width="1000" height="700" alt="slide2">
            </div>
            <div class="slide">
              <img src="images/transaksi3.png" width="1000" height="700" alt="slide3">
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
      <div class = "form-boxs">
                <form action="" method="post">
                    <h2>Pembayaran</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="nama" id="nama" name="nama" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="rekening" id="rekening" name="rekening" required>
                        <label for="">Nomor Kartu Kredit</label>
                    </div>
                    <div class="inputbox">
                     <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="nohp" id="nohp" name="nohp" required>
                        <label for="">Nomor Telepon</label>
                    </div>
                    <!-- <a href="homeb.php" class="buy">Buy</a> -->
                    <button class="buy" type="submit" name="proses">Buy</button>
                    <!-- <button href="home.php" class="buy" type="submit" name="proses">Buy</button> -->
                </form>
      </div>
      <?php
      }
      ?>
    </section>
    <script>
      feather.replace();
    </script>
    <script type="text/javascript">
      window.addEventListener("scroll", function () {
        const header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
      });
    </script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
