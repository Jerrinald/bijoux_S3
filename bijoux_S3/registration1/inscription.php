<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css" />
<link rel="stylesheet" href="../styles.css" />
</head>
<body>
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
            <a href="../index.php" class="scroll-link">
              DIAMANT
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
                <a href="#header" class="nav__link scroll-link">Acceuil</a>
              </li>
              <li class="nav__item">
                <a href="#category" class="nav__link scroll-link">Categorie</a>
              </li>
              <li class="nav__item">
                <a href="#news" class="nav__link scroll-link">Blog</a>
              </li>
              <li class="nav__item">
                <a href="#contact" class="nav__link scroll-link">Contact</a>
              </li>
            </ul>
          </div>

          <div class="nav__icons">
            <a href="login.php" class="icon__item">
              <svg class="icon__user">
                <use xlink:href="../images/sprite.svg#icon-user"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__search">
                <use xlink:href="../images/sprite.svg#icon-search"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__cart">
                <use xlink:href="../images/sprite.svg#icon-shopping-basket"></use>
              </svg>
              <span id="cart__total">0</span>
            </a>
          </div>
        </nav>
      </div>
    </div>
   </header>

   <form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a href="#">S'inscrire</a></h1>
    <h1 class="box-title"></h1>
  <h1 class="box-input"><a href="particulier.php">Compte particulier</a></h1>
  <h1 class="box-input"><a href="professionnel.php">Compte professionnel</a></h1>
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>

</body>
</html>