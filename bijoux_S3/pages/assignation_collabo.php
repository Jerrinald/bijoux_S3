<?php
require('../menu/menu.php');
require_once ('config.php');
require_once ('component1.php'); ?>

<style type="text/css">
	p,
label {
    font: 2rem 'Fira Sans', sans-serif;
    margin-top: 65px;
    text-align: center;
}

input {
    margin: .2rem;
    margin-left: 580px;
}

button,
.styled {
    margin-left: 580px;
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(0, 0,200, 1);
    background-image: linear-gradient(to top left,
                                      rgba(0, 0, 0, .2),
                                      rgba(0, 0, 0, .2) 30%,
                                      rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6),
                inset -2px -2px 3px rgba(0, 0, 0, .6);
}

.styled:hover {
    background-color: rgba(255, 0, 0, 1);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
}

</style>

<p>Monsieur X vient de s'inscrire. Il semblerait qu'il soit plus interessé par les [$produits(code php)] </p>
<br/><br/><br/>

<p>A qui voulez-vous l'assignez ?</p><br/>

<div>
  <input type="checkbox" id="1" name="1"
         >
  <label for="1"> Collaborateur A </label>
</div>

<div>
  <input type="checkbox" id="2" name="2">
  <label for="2"> Collaborateur B</label>
</div>
<br/>
<div>
    <button class="favorite styled"
        type="checkbox">
    Confirmer
</button>
  </div>