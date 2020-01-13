<?php

class BlockTopDropDownMenuOverride extends blocktopdropdownmenu 
{
    public function install() 
    {
        parent::install();

        $this->registerHook('displayNav1');

        return true;
    }

    public function hookDisplayNav1($params) 
    {
        return parent::hookDisplayTop($params);
    }
}