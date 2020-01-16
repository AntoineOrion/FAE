<?php

class Ns_favoriteProductsOverride extends Ns_favoriteProducts
{
    public function install()
    {
        parent::install();

        $this->registerHook('displayNav2');

        return true;
    }

    public function hookDisplayNav2()
    {
        return $this->display(__FILE__, 'favoriteproducts-nav.tpl');
    }
}