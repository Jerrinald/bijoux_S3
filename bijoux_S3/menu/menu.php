<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />


  <!-- Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./styles.css" />

  <title>Diamant</title>
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
              Service+ DIAMANT
            </a>
          </div>

          <div class="nav__menu">
            <div class="menu__top">
              <span class="nav__category">DIAMANT</span>
              <a href="#" class="close__toggle">
                <svg>
                  <use xlink:href="./images/sprite.svg#icon-cross"></use>
                </svg>
              </a>
            </div>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="#header" class="nav__link scroll-link">Acceuil</a>
              </li>
              <li class="nav__item">
                <a href="#category" class="nav__link scroll-link">Catalogue</a>
              </li>
              <li class="nav__item">
                <a href="#news" class="nav__link scroll-link">Pierre</a>
              </li>
              <li class="nav__item">
                <a href="#contact" class="nav__link scroll-link">Diamant</a>
              </li>
            </ul>
          </div>

          <div class="nav__icons">
            <a href="./registration1/login.php" class="icon__item">
              <svg class="icon__user">
                <use xlink:href="./images/sprite.svg#icon-user"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__search">
                <use xlink:href="./images/sprite.svg#icon-search"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__cart">
                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
              </svg>
              <span id="cart__total">0</span>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header -->

</body>

</html>