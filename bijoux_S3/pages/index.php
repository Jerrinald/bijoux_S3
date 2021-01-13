<?php
require('../menu/menu.php');
?>
<!DOCTYPE html>
<html lang="en">


<body>

  <!-- Header -->
  <header id="header" class="header">

    <!-- Hero -->
    <div class="hero">
      <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="hero__center">
                <div class="hero__left">
                  <span class="">LES DERNIERS MODÈLES</span>
                  <h1 class="">Trouvez ici les meilleurs pierres !</h1>
                  <p>Les dernières tendances à un prix imbattable sur le marché sont disponible ICI !</p>
                  <a href="pierre.php"><button class="hero__btn">ACHETEZ MAINTENANT</button></a>
                </div>
                <div class="hero__right">
                  <div class="hero__img-container">
                    <img class="banner_01" src="../images/banner_01.png" alt="banner2" />
                  </div>
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="hero__center">
                <div class="hero__left">
                  <span>NOUVEAU !</span>
                  <h1>DES DIAMANTS CONÇUS POUR VOUS!</h1>
                  <p>Les dernières tendances à un prix imbattable sur le marché sont disponible ICI !</p>
                  <a href="diamant.php"><button class="hero__btn">ACHETEZ MAINTENANT</button></a>
                </div>
                <div class="hero__right">
                  <img class="banner_02" src="../images/banner_02.png" alt="banner2" />
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          <button class="glide__bullet" data-glide-dir="=0"></button>
          <button class="glide__bullet" data-glide-dir="=1"></button>
        </div>

        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <svg>
              <use xlink:href="../images/sprite.svg#icon-arrow-left2"></use>
            </svg>
          </button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <svg>
              <use xlink:href="../images/sprite.svg#icon-arrow-right2"></use>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header -->

  <!-- Main -->
  <main id="main">
    <div class="container">
      <!-- Collection -->
      <section id="collection" class="section collection">
        <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
          <div class="collection__box">
            <div class="img__container">
              <img class="collection_02" src="../images/collection_01.png" alt="">
            </div>
            <div class="collection__content">
              <div class="collection__data">
                <span>Nouveaux modèles disponible</span>
                <h1>Amethyste violet</h1>
                <a href="choix_produit.php">ACHETEZ MAINTENANT</a>
              </div>
            </div>
          </div>
          <div class="collection__box">
            <div class="img__container">
              <img class="collection_01" src="../images/collection_01.png" alt="">
            </div>
            <div class="collection__content">
              <div class="collection__data">
                <span>Obtenez la pierre qui vous convient</span>
                <h1>Emeraude</h1>
                <a href="pierre.php">ACHETEZ MAINTENANT</a>
              </div>
            </div>
          </div>
      </section>

      <section class="category__section section" id="category">
        <div class="tab__list">
          <div class="title__container tabs">
            <div class="section__titles category__titles ">
              <div class="section__title filter-btn active" data-id="All Products">
                <span class="dot"></span>
                <h1 class="primary__title">Tous les produits</h1>
              </div>
            </div>
            <div class="section__titles">
              <div class="section__title filter-btn" data-id="Trending Products">
                <span class="dot"></span>
                <h1 class="primary__title">Les diamants</h1>
              </div>
            </div>

            <div class="section__titles">
              <div class="section__title filter-btn" data-id="Special Products">
                <span class="dot"></span>
                <h1 class="primary__title">Les pierres</h1>
              </div>
            </div>

          </div>
        </div>
        <div class="category__container" data-aos="fade-up" data-aos-duration="1200">
          <div class="category__center"></div>
        </div>
    </div>
    <?php if($_SESSION[$mail]['niv_role']>3){?>
      <div class="continue__shopping" style="margin-left: 550px; margin-bottom: 45px;" >
              <a href="gestion_admin.php">Gestion utilisateurs/produits</a>
      </div>
    <?php } ?>
    </section>
 
    </div>

  </main>

  <!-- End Main -->

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container" >
      <div class="footer__top"  style="margin-left: 300px;">
        <div class="footer-top__box">
          <h3>INFORMATIONS</h3>
          <a href="#">A propos de nous</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Conditions et termes</a>
        </div>
        <div class="footer-top__box" style="width: 250px;">
          <h3>CONTACTEZ-NOUS</h3>
          <div>
            <span>
              <svg>
                <use xlink:href="../images/sprite.svg#icon-location"></use>
              </svg>
            </span>
            xx, xx xx, France
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="../images/sprite.svg#icon-envelop"></use>
              </svg>
            </span>
            sevice+diamant@xxx.com
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="../images/sprite.svg#icon-phone"></use>
              </svg>
            </span>
            06xxxxxx
          </div>
          <div>
            <span>
              <svg>
                <use xlink:href="../images/sprite.svg#icon-paperplane"></use>
              </svg>
            </span>
            xxxxx, Belgique
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer-bottom__box">

      </div>
      <div class="footer-bottom__box">

      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->



  <!-- Go To -->

  <a href="#header" class="goto-top scroll-link">
    <svg>
      <use xlink:href="../images/sprite.svg#icon-arrow-up"></use>
    </svg>
  </a>


  <!-- Glide Carousel Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

  <!-- Animate On Scroll -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Custom JavaScript -->
  <script src="../js/products.js"></script>
  <script src="../js/index.js"></script>
  <script src="../js/slider.js"></script>

</body>

</html>