<?php
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

$UserName = "";

$Password = "";

//ejecutar e, codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $UserName = mysqli_real_escape_string($db, $_POST['username']);
  $Password = mysqli_real_escape_string($db, $_POST['password']);

  if (!$UserName) {
    $errores[] = "Debes añadir un nombre de usuario";
  }
  if (!$Password) {
    $errores[] = "Debes añadir una contraseña";
  }
  if (empty($errores)) {
    //revisar si el usuario existe
    $query = "SELECT * FROM register WHERE UserName = '${UserName}'";
    //echo $query;
    $result = mysqli_query($db, $query);

    // $query1 = "SELECT * FROM admin WHERE UserName = '${UserName}' ";
    // $result1 = mysqli_query($db, $query1);
    //var_dump($result);
    //entramos dentro del objeto result para ver cuantas rows hay del query que pusimos  
    if ($result->num_rows) {
      //revisar si el password es correcto
      $user = mysqli_fetch_assoc($result);
      // var_dump( $user);
      //verificar si el password es correcto o no
      $auth = password_verify($Password, $user['Password']);
      // exit;
      if ($auth) {

        //el usuario esta autenticado
        session_start();
        //llenar el arreglo de la sesion
        $_SESSION['userUser'] = $user['UserName'];
        $_SESSION['loginUser'] = True;
        header('Location:/');
      } else {
        $errores[] = "El password es incorrecto ";
      }
    } else {
      $errores[] = "usuario no existe";
    }
  }
}
if (!isset($_SESSION)) {
  session_start();
}
$auth2 = $_SESSION['loginUser'] ?? false;
$userName = $_SESSION['userUser'] ?? "";

require 'includes/funciones.php';

incluirTemplate('circleMenu');

?>


<div class="container">
  <div class="outer-wrapper">
    <div class="content wrapper">

      <div id="home" class="slide home">
        <section class="section-home">
          <div class="content-home">
            <div class="before"></div>
            <div class="after">
              <div class="bannertext">
                <?php if ($auth2) : ?>
                  <h2>Welcome <?php echo $userName ?></h2>
                <?php endif ?>

                <div class="name-home">
                  <img src="build/img/Logo-círuclo-Blanco-c.webp">
                  <img class="image-Sheru" src="build/img/Sheru-Logo-Letrasnegras.webp">
                  <!-- <h2>Sheru</h2> -->
                </div>
                <div class="text-banner">
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam excepturi sequi explicabo,
                    tenetur
                    repudiandae enim nisi harum? Perferendis quibusdam reprehenderit ratione! Labore error reiciendis
                    odit
                    corporis fuga. Praesentium, optio veritatis!</p>
                </div>
              </div>
            </div>

            <div class="next-home">
              <a href="#stuff"><img src="build/img/next.webp"></a>
            </div>
          </div>

        </section>
      </div>


      <div id="stuff" class="slide stuff">
        <div class="logo-sheru">
          <h2>News</h2>
        </div>
        <div class="carousel">

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="image" src="build/img/Dangerous-Potential-cover-art-COMPRESSED.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/Starving-fun-cover-1000-comp.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/THWH-Album-cover-1000-COMP.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/Trust-all-your-friends-album-cover-1000-COMP.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/ITILC-cover-1000-COMP.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/Trying-Cover-1000-comp.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/Tuttifrutti-cover-1000-comp.webp" />
                <div class="content">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aspernatur, fugit aliquid fugiat
                    perferendis eos ullam voluptatibus nam dolore, assumenda cumque distinctio ad obcaecati debitis
                    adipisci neque ut perspiciatis. Assumenda!</p>
                </div>

                <a class="boton-stuff" href="news.php">mas info</a>

              </div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
          </div>
        </div>
      </div>


      <div id="about" class="slide about">
        <div class="content-about">
          <div class="about-content-text">
            <div class="title-about">
              <h2>About</h2>
            </div>
            <div class="text-about">
              <p>If you have ever wondered what could happen if Sum 41 met Eve in an Anime convention then Sheru! has
                the answer for you. A Mexican songwriter that couldn’t help but create rock-pop music inspired by the
                stories embedded in anime, manga, and light novels; meet the story of Sheru!</p>
              <p>“I’ll be lying to myself if I didn’t say that anime and manga changed my life”. The first time he
                listen to an opening of an anime he couldn’t help but dance to it. He calls himself the otaku minstrel
                of the 21st century. Sheru! wants to share the experiences given by this culture with the world.</p>
              <div class="button-more">
                <a href="about.php" class="button"><span class="button_top"> more</span></a>
              </div>
            </div>
          </div>

        </div>
      </div>


      <div id="discography" class="slide discography">
        <div class="carousel1">
          <div class="last-realease">
            <h2>Listen to Sheru!'s latest release</h2>
            <iframe class="spotify" src="https://open.spotify.com/embed?uri=spotify%3Aalbum%3A5nJcE2029yZIfqrBcmfYDZ" frameborder="0" style="border-radius: 12px;" allowtransparency="true" allow="encrypted-media"></iframe>
            <iframe class="youtube" width="560" height="315" src="https://www.youtube.com/embed/obujX-gerI0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="content-discography">
            <div class="album-content">
              <a href="discographyProduct.php">
                <img class="image" src="build/img/Tuttifrutti-cover-1000-comp.webp" />
              </a>

            </div>
            <div class="album-content">
              <a href="discographyProduct.php">
                <img class="image" src="build/img/Starving-fun-cover-1000-comp.webp" />
              </a>

            </div>
            <div class="album-content">
              <a href="discographyProduct.php">
                <img class="image" src="build/img/Trying-Cover-1000-comp.webp" />
              </a>

            </div>
            <div class="album-content">
              <a href="discographyProduct.php">
                <img class="image" src="build/img/Dangerous-Potential-cover-art-COMPRESSED.webp" />
              </a>

            </div>
            <div class="container-button button-more">
              <a href="discography.php" class="button"><span class="button_top"> more</span></a>
            </div>
          </div>

        </div>
      </div>


      <div id="merch" class="slide merch">
        <div class="carousel1">
          <h2>Merch</h2>
          <div class="swiper1 mySwiper1">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="image" src="build/img/shirt-1.webp" />

                <div class="boton-merch">
                  <a href="merchProduct.php">mas info</a>
                </div>
              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/shirt-2.webp" />

                <div class="boton-merch">
                  <a href="merchProduct.php">mas info</a>
                </div>
              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/Shirt-dangerous-potential-balck.webp" />

                <div class="boton-merch">
                  <a href="merchProduct.php">mas info</a>
                </div>
              </div>
              <div class="swiper-slide">
                <img class="image" src="build/img/shirt-wiski-black.webp" />

                <div class="boton-merch">
                  <a href="merchProduct.php">mas info</a>
                </div>
              </div>
            </div>
          </div>
          <div class="button-more">
            <a href="merch.php" class="button"><span class="button_top"> more</span></a>
          </div>
        </div>
      </div>


      <div id="contact" class="slide contact">
        <section class="section-contact">
          <div class="container-contact">
            <h2>Send Me a Message</h2>
            <div class="row100">
              <div class="col">
                <div class="inputBox">
                  <input type="email" name="" required="required">
                  <span class="text-contact">Email</span>
                  <span class="line-contact"></span>
                </div>
              </div>

              <div class="row100">
                <div class="col">
                  <div class="inputBox textarea">
                    <textarea required="required"></textarea>
                    <span class="text-contact">Type Your Message Here...</span>
                    <span class="line-contact"></span>
                  </div>
                </div>
              </div>
              <div class="row100">
                <div class="col">
                  <input type="submit" value="send">
                </div>
              </div>
            </div>
          </div>
          <div class="container-contact">
            <form method="POST" class="formulario">
              <?php foreach ($errores as $error) : ?>
                <div class="alert">
                  <div class="errorAlert">
                    <?php echo $error; ?>
                  </div>
                </div>

              <?php endforeach; ?>
              <h2>Login</h2>
              <div class="row100">
                <div class="col">
                  <div class="inputBox">
                    <input type="username" name="username" id="username" value="<?php $Email ?>" required>
                    <span class="text-contact">UserName</span>
                    <span class="line-contact"></span>
                  </div>
                </div>

                <div class="row100">
                  <div class="col">
                    <div class="inputBox">
                      <input type="password" name="password" id="password" value="<?php $Password ?>" required>
                      <span class="text-contact">Password</span>
                      <span class="line-contact"></span>
                    </div>
                  </div>
                </div>
                <div class="row100">
                  <div class="col">
                    <input type="submit" value="send">
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="container-singin">
            <h2>You are not registered?</h2>
            <div class="main_div">
              <!-- <button>Sign In</button> -->
              <a href="register.php">Sign In</a>
            </div>
          </div>
        </section>
      </div>


    </div>
  </div>
</div>

<?php incluirTemplate('nav'); ?>
<?php incluirTemplate('footer'); ?>