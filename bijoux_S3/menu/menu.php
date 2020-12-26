<?php 

session_start();

if(isset($_SESSION['mail']) && isset($_SESSION['niv_role'])){
   unset($_SESSION['visiteur']);
   $mail = $_SESSION['mail'];
   $niv_role = $_SESSION['niv_role'];
}else{
  $mail = 'visiteur';
  $niv_role = 1;
}
$_SESSION[$mail]['niv_role'] = $niv_role;
if(!isset($_SESSION[$mail]['shopping_cart'])){
  $_SESSION[$mail]['compteur'] =0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />


  <!-- Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./styles.css" />
  <link rel="stylesheet" href="./style1.css" />

  <title>Service+ Diamant</title>
</head>

<body>

  <!-- Header -->
  <header id="header" class="header">
    <div class="navigation">
      <div class="container">
        <nav class="nav">
          <div class="nav__hamburger">
            <svg>
              <use xlink:href="../images/sprite.svg#icon-menu"></use>
            </svg>
          </div>

          <div class="nav__logo">
            <a href="./index.php" class="scroll-link">
              <img style="width: 150px; object-fit: cover; " src="../images/logo.png">
            </a>
          </div>

          <div class="nav__menu">
            <div class="menu__top">
              <span class="nav__category">DIAMANT</span>
              <a href="#" class="close__toggle">
                <svg>
                  <use xlink:href="../images/sprite.svg#icon-cross"></use>
                </svg>
              </a>
            </div>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="index.php" class="nav__link">Acceuil</a>
              </li>
              <li class="nav__item">
                <a href="choix_produit.php" class="nav__link ">Catalogue</a>
              </li>
              <li class="nav__item">
                <a href="pierre.php" class="nav__link">Pierre</a>
              </li>
              <li class="nav__item">
                <a href="diamant.php" class="nav__link">Diamant</a>
              </li>
            </ul>
          </div>

          <div class="nav__icons">
            <a href="./login.php" class="icon__item">
              <svg class="icon__user">
                <use xlink:href="../images/sprite.svg#icon-user"></use>
              </svg>
            </a>

            <a href="barre_de_recherche.php" class="icon__item">
              <svg class="icon__search">
                <use xlink:href="../images/sprite.svg#icon-search"></use>
              </svg>
            </a>

            <a href="./aperçu.php" class="icon__item">
              <svg class="icon__cart">
                <use xlink:href="../images/sprite.svg#icon-shopping-basket"></use>
              </svg>
              <span id="cart__total"><?php echo $_SESSION[$mail]['compteur'] ?></span>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header -->

</body>

</html>
