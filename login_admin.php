<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOGIN CORAL</title>

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
          <!-- <li><a href="login.php" class="navbar-right">Login</a></li> -->
          <!-- <li><a href="#">Testi</a></li> -->
          <!-- <li><a href="#">Contact</a></li> -->
        </ul>
      </header>
<?php
    require('control/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE nama_admin='$username'
                     AND password_admin='$password'";
        
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            // $_SESSION['username'] = $username;
            // $row = mysqli_fetch_assoc($result);
            // $_SESSION['email'] = $row['email'];
            // Redirect to user dashboard page
            header("Location: dashboardadmin.php");
        } else {
            echo "<script>alert('Username atau Password salah');
            window.location.href = 'login_admin.php';
            </script>";
        }
    } else {
?>
   <section id="login" class="login">

      <div class = "form-box">
      <div class="form-value">
                <form action="" method="post">
                    <h2>Login Admin</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="username" id="username" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                     <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="proses">Login</button>
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