<?php

class Ps_SearchbarOverride extends Ps_Searchbar
{
    private $templateFile;

    public function install()
    {
        return parent::install()
        && $this->registerHook('displayNav3');
    }
}