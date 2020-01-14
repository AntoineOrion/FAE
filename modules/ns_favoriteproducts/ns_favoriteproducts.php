<?php


if (!defined('_CAN_LOAD_FILES_'))
	exit;

class Ns_favoriteProducts extends Module
{
	public function __construct()
	{
		$this->name = 'ns_favoriteproducts';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'NdiagaSoft';
		$this->need_instance = 0;

		$this->controllers = array('account');

		parent::__construct();

		$this->displayName = $this->l('NS Favorite Products');
		$this->description = $this->l('Display a page featuring the customer\'s favorite products.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
			if (!parent::install()
				|| !$this->registerHook('displayMyAccountBlock')
				|| !$this->registerHook('displayCustomerAccount')
				|| !$this->registerHook('displayLeftColumnProduct')
				|| !$this->registerHook('extraLeft')
				|| !$this->registerHook('displayReassurance') 
                || !$this->registerHook('displayAfterProductThumbs')  
                || !$this->registerHook('displayProductAdditionalInfo') 
				|| !$this->registerHook('displayHeader'))
					return false;

			if (!Db::getInstance()->execute('
				CREATE TABLE `'._DB_PREFIX_.'ns_favorite_product` (
				`id_ns_favorite_product` int(10) unsigned NOT NULL auto_increment,
				`id_product` int(10) unsigned NOT NULL,
				`id_customer` int(10) unsigned NOT NULL,
				`id_shop` int(10) unsigned NOT NULL,
				`date_add` datetime NOT NULL,
  				`date_upd` datetime NOT NULL,
				PRIMARY KEY (`id_ns_favorite_product`))
				ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8'))
				return false;

			return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall() || !Db::getInstance()->execute('DROP TABLE `'._DB_PREFIX_.'ns_favorite_product`'))
			return false;
		return true;
	}
	
	
	public function getContent()
    {	$output=null;	

        $output.=$this->displayAdvertising();	
	 return $output;
	}    
	
	
		    public function displayAdvertising()
    {
		$html= '
		<br/>
		<fieldset>
			<legend><img src="'.$this->_path.'img/more.png" alt="" title="" /> '.$this->l('More Modules & Themes ').'</legend>	
			<iframe src="http://prestatuts.com/advertising/prestashop_advertising.html" width="100%" height="420px;" border="0" style="border:none;"></iframe>
			</fieldset>';
			
	   return $html;		
    }

	public function hookDisplayCustomerAccount($params)
	{
		$this->smarty->assign('in_footer', false);
		return $this->display(__FILE__, 'my-account.tpl');
	}

	public function hookDisplayMyAccountBlock($params)
	{
		$this->smarty->assign('in_footer', true);
		return $this->display(__FILE__, 'my-account.tpl');
	}

	public function hookDisplayLeftColumnProduct($params)
	{
		include_once(dirname(__FILE__).'/classes/NsFavoriteProduct.php');

		$this->smarty->assign(array(
			'isCustomerFavoriteProduct' => (NsFavoriteProduct::isCustomerFavoriteProduct($this->context->customer->id, Tools::getValue('id_product')) ? 1 : 0),
			'isLogged' => $this->context->customer->isLogged(),
			'id_product'=>Tools::getValue('id_product'),
		));
		return $this->display(__FILE__, 'favoriteproducts-extra.tpl');
	}

	public function hookDisplayHeader($params)
	{
		$this->context->controller->addCSS($this->_path.'favoriteproducts.css', 'all');
		$this->context->controller->addJS($this->_path.'favoriteproducts.js');
		return $this->display(__FILE__, 'favoriteproducts-header.tpl');
	}
	
	
	public function hookDisplayAfterProductThumbs($params)
	{    
         $this->doAction();	
        return $this->hookDisplayLeftColumnProduct($params);	
    } 	 	

	public function hookDisplayReassurance($params) 	{	
	    return '';
	}        				

	public function hookDisplayProductAdditionalInfo($params) 	{	
	return ''; 
	}  


    public  function doAction(){
		
    include_once(dirname(__FILE__).'/classes/NsFavoriteProduct.php');		
		
		if (Tools::getValue('action') && Tools::getValue('id_product') && Context::getContext()->customer->id)
{
	if (Tools::getValue('action') == 'remove')
	{
		// check if product exists
		$id_product =(int)Tools::getValue('id_product');				
		$favorite_product = NsFavoriteProduct::getFavoriteProduct((int)Context::getContext()->customer->id, $id_product);
		if ($favorite_product)
			$favorite_product->delete();
				
	}
	elseif (Tools::getValue('action') == 'add')
	{
		$id_product =(int)Tools::getValue('id_product');			
		$favorite_product = new NsFavoriteProduct();
		$favorite_product->id_product =$id_product;
		$favorite_product->id_customer = (int)Context::getContext()->customer->id;
		$favorite_product->id_shop = (int)Context::getContext()->shop->id;
		$favorite_product->add();
			
	}
}

     
		
	}	
    

}


