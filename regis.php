<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>REGIS CORAL</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&family=Itim&family=Old+Standard+TT:wght@700&family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- my style -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header>
        <a href="index.php" class="logo">CORAL<span>.</span></a>
        <ul class="navigation">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">About</a></li>
          <li><a href="index.php">Introduction</a></li>
          <!-- <li><a href="login.index" class="navbar-right">Login</a></li> -->
          <!-- <li><a href="#">Testi</a></li> -->
          <!-- <li><a href="#">Contact</a></li> -->
        </ul>
      </header>
<?php
    require('control/db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $confpass = stripslashes($_REQUEST['password-conf']);
        $confpass = mysqli_real_escape_string($conn, $confpass);

        if ($confpass != $password){
            echo "<script>alert('Password Tidak Sama');
            window.location.href = 'regis.php';
            </script>";
        } else {
            $query    = "INSERT into `users` (username, password, email, premium)
                     VALUES ('$username', '$password', '$email', false )";
            $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Halo $username!, Selamat Datang di CORAL');
            window.location.href = 'login.php';
            </script>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
        }

        
    } else {
?>
   <section id="regis" class="regis">

      <div class = "form-box">
      <div class="form-value">
                <form action="" method="post">
                    <h2>Welcome</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="username" id="username" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                     <ion-icon name="mail-outline"></ion-icon>
                     <input type="email" id="email" name="email" required>
                     <label for="">Email</label>
                     </div>
                    <div class="inputbox">
                     <ion-icon name="lock-open-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="">Enter Password</label>
                    </div>
                    <div class="inputbox">
                     <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password-conf" name="password-conf" required>
                        <label for="">Confirm Password</label>
                    </div>
                    <button type="submit" name="proses">Login</button>
                    <div class="register">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
      </div>
   
    </section>
<?php
    }
?>
    <script>
      feather.replace();
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>