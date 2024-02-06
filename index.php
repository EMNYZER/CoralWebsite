<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <title>CORAL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <header>
      <a href="#" class="logo">CORAL<span>.</span></a>
      <ul class="navigation">
        <li><a href="#banner">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#container">Introduction</a></li>
        <li><a href="login.php" class="navbar-right">Login</a></li>
        <li><a href="login_admin.php" class="navbar-right">Admin</a></li>
      </ul>
    </header>
    <section class="banner" id="banner">
      <div class="content">
        <h2 class="titleText">
          Creative Online and Representative Art Learning
        </h2>
        <p>
          Dapatkan keterampilan baru dalam 10 menit bersama tutor-tutor hebat
          dan terpercaya!
        </p>
      </div>
    </section>

    <section class="about" id="about">
      <!-- <h2>About us</h2> -->
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

    <section class="container" id="container">
      <div class="site-content">
        <div class="posts">
          <div class="post-content" data-aos-delay="200">
            <div class="post-image">
              <div>
                <img src="images/iklan33.png" class="img" alt="blog1" />
              </div>
              <div class="post-info flex-row">
                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin
                  Hilman</span>
                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Maret 21, 2023</span>
              </div>
            </div>
            <div class="post-title">
              <a> Eka Gustiwana Putra, seorang penyanyi, penulis lagu, produser rekaman, produser film dan komposer ucapan Indonesia</a>
              <p>
                Dikenal sebagai salah satu komposer musik terkenal di Indonesia, eka telah menciptakan karya-karya yang menginspirasi jutaan pendengar dengan keunikan musiknya yang mencerminkan kreativitas Indonesia.
              </p>
            </div>
          </div>
          <hr />
          <div class="post-content" data-aos-delay="200">
            <div class="post-image">
              <div>
                <img src="images/iklan11.png" class="img" alt="blog1" />
              </div>
              <div class="post-info flex-row">
                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin Lia</span>
                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;February 21, 2023</span>
              </div>
            </div>
            <div class="post-title">
              <a>Jason Nicholas Saputra Christian, kreator kecil di bidang 3D animation</a>
              <p>
                Dengan bakat dan dedikasi yang luar biasa, anak berusia 12 tahun ini telah menjadi ahli dalam menciptakan animasi 3D yang mengagumkan, menghasilkan karya-karya kreatif yang melebihi usianya dan menginspirasi semua orang di sekitarnya.
              </p>
            </div>
          </div>
          <hr />
          <div class="post-content" data-aos-delay="200">
            <div class="post-image">
              <div>
                <img src="images/iklan22.png" class="img" alt="blog1" />
              </div>
              <div class="post-info flex-row">
                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin
                  Gerald</span>
                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 21, 2023</span>
              </div>
            </div>
            <div class="post-title">
              <a>Daunnet Maradita, seorang dosen yang berbakat di video editor</a>
              <p>
                Dosen yang berbakat dalam dunia akademik dan juga memiliki keahlian sebagai video editor, memadukan pengetahuan teoritis yang mendalam dengan kepiawaiannya dalam menghasilkan video yang menarik dan berkualitas tinggi, memberikan pengalaman belajar yang unik dan memukau bagi para mahasiswanya.
              </p>
            </div>
          </div>
          <hr />
     
        </div>
        <aside class="sidebar">
          <div class="category">
            <h2>Category Class</h2>
            <ul class="category-list">
              <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                <a>Photography</a>
              </li>
              <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                <a>Video Editing</a>
              </li>
              <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                <a>3D Animation</a>
              </li>
              <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                <a>Pixel Art</a>
              </li>
              <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                <a>Music Composer</a>
              </li>
            </ul>
          </div>
          <div class="popular-post">
            <h2>Popular Post</h2>
            <div class="post-content" data-aos="flip-up" data-aos-delay="200">
              <div class="post-image">
                <div>
                  <img src="images/karya1.jpg" class="img" alt="blog1" />
                </div>
                <div class="post-info flex-row">
                  <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Juni 01, 2023</span>
                  <span>2 Commets</span>
                </div>
              </div>
              <div class="post-title">
                <a href="#">New data recording system to better analyse road accidents</a>
              </div>
            </div>
            <div class="post-content" data-aos="flip-up" data-aos-delay="300">
              <div class="post-image">
                <div>
                  <img src="images/karya2.png" class="img" alt="blog1" />
                </div>
                <div class="post-info flex-row">
                  <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;Mei 10, 2023</span>
                  <span>2 Commets</span>
                </div>
              </div>
              <div class="post-title">
                <a href="#">New data recording system to better analyse road accidents</a>
              </div>
            </div>
            <div class="post-content" data-aos="flip-up" data-aos-delay="400">
              <div class="post-image">
                <div>
                  <img src="images/karya3.png" class="img" alt="blog1"/>
                </div>
                <div class="post-info flex-row">
                  <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;April 18, 2023</span>
                  <span>2 Commets</span>
                </div>
              </div>
              <div class="post-title">
                <a href="#"
                  >New data recording system to better analyse road accidents</a>
              </div>
            </div>
          </div>
        </aside>
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
