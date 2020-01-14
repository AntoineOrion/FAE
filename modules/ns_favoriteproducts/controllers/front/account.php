<?php
/**
 * @since 1.5.0
 */
class Ns_favoriteProductsAccountModuleFrontController extends ModuleFrontController
{
	public $ssl = true;

	public function init()
	{
		parent::init();

		require_once($this->module->getLocalPath().'classes/NsFavoriteProduct.php');
	}

	public function initContent()
	{
		parent::initContent();

		if (!Context::getContext()->customer->isLogged())
			Tools::redirect('index.php?controller=authentication&redirect=module&module=ns_favoriteproducts&action=account');

		if (Context::getContext()->customer->id)
		{
			$this->context->smarty->assign('favoriteProducts', NsFavoriteProduct::getFavoriteProducts((int)Context::getContext()->customer->id, (int)Context::getContext()->language->id)
			);
			
		$base_dir_nka=Tools::getHttpHost(true).__PS_BASE_URI__;
		
	   $this->context->smarty->assign(array(
		'img_dir'=>_PS_ROOT_DIR_.'img/',
		'id_customer'=> ($this->context->customer->logged ? $this->context->customer->id: false),
		
		));		
			$template='module:'.$this->module->name.'/views/templates/front/favoriteproducts-account.tpl';		
	        $this->setTemplate($template); 	
		}
	}
}