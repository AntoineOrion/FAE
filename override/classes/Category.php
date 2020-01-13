<?php
/**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com
 * @copyright 2019 WebshopWorks
 * @license   One domain support license
 */
defined('_PS_VERSION_') or exit;
class Category extends CategoryCore
{
    /*
    * module: creativeelements
    * date: 2019-12-12 18:28:35
    * version: 0.11.4.6
    */
    public function __construct($idCategory = null, $idLang = null, $idShop = null)
    {
        parent::__construct($idCategory, $idLang, $idShop);
        $ctrl = Context::getContext()->controller;
        if ('category' == $ctrl->php_self && !$ctrl->getCategory() && !$this->active && Tools::getIsset('id_employee') && Tools::getIsset('adtoken')) {
            $tab = 'AdminCreativePage';
            if (Tools::getAdminToken($tab . (int) Tab::getIdFromClassName($tab) . (int) Tools::getValue('id_employee')) == Tools::getValue('adtoken')) {
                $this->active = 1;
            }
        }
    }
}
