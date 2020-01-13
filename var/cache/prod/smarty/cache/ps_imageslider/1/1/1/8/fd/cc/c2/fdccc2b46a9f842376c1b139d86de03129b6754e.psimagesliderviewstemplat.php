<?php
/* Smarty version 3.1.33, created on 2020-01-10 11:41:01
  from 'module:psimagesliderviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e1854bd34a880_80639015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2108a17c7103b6e203f4f0621d4645b56b0114' => 
    array (
      0 => 'module:psimagesliderviewstemplat',
      1 => 1576165313,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_5e1854bd34a880_80639015 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div class="image-slider-block">
        <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="5000" data-wrap="false" data-pause="">
            <ul class="carousel-inner" role="listbox">
                                    <li class="carousel-item active" role="option" aria-hidden="false">
                        <a href="http://#">
                            <figure>
                                <img src="http://localhost:8888/france-auto-expert/modules/ps_imageslider/images/4c364ec6f92598f9b19b4d080152bb5c9e5dc564_automotive-1866521_1920.jpg" alt="France auto expert">
                                                                    <figcaption class="caption">
                                        <h2 class="display-1 text-uppercase">VOTRE VOITURE </h2>
                                        <div class="caption-description"><h3>Vous attend chez France Auto Expert...</h3></div>
                                    </figcaption>
                                                            </figure>
                        </a>
                    </li>
                            </ul>
            <div class="direction" aria-label="Boutons du carrousel">
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="icon-prev hidden-xs" aria-hidden="true">
                        <i class="material-icons">&#xE5CB;</i>
                    </span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true">
                        <i class="material-icons">&#xE5CC;</i>
                    </span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>
<?php }
}
