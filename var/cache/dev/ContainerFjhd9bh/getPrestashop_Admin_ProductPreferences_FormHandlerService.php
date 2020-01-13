<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.admin.product_preferences.form_handler' shared service.

$this->services['prestashop.admin.product_preferences.form_handler'] = $instance = new \PrestaShopBundle\Form\Admin\Configure\ShopParameters\ProductPreferences\ProductPreferencesFormHandler(${($_ = isset($this->services['form.factory']) ? $this->services['form.factory'] : $this->load('getForm_FactoryService.php')) && false ?: '_'}->createBuilder(), ${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.admin.product_preferences.data_provider']) ? $this->services['prestashop.admin.product_preferences.data_provider'] : $this->load('getPrestashop_Admin_ProductPreferences_DataProviderService.php')) && false ?: '_'}, ['general' => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\GeneralType', 'pagination' => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\PaginationType', 'page' => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\PageType', 'stock' => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\StockType'], 'ProductPreferencesPage');

$instance->setCacheClearer(${($_ = isset($this->services['prestashop.adapter.cache_clearer']) ? $this->services['prestashop.adapter.cache_clearer'] : ($this->services['prestashop.adapter.cache_clearer'] = new \PrestaShop\PrestaShop\Adapter\Cache\CacheClearer())) && false ?: '_'});

return $instance;
