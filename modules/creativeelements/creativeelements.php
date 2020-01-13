<?php
/**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com
 * @copyright 2019 WebshopWorks
 * @license   One domain support license
 */

defined('_PS_VERSION_') or exit;

define('_CE_VERSION_', '0.11.4.6');
define('_CE_PATH_', _PS_MODULE_DIR_ . 'creativeelements/');
define('_CE_ASSETS_URL_', _MODULE_DIR_ . 'creativeelements/views/');

require_once _CE_PATH_ . 'classes/CreativePage.php';
require_once _CE_PATH_ . 'classes/CeAssetManager.php';
require_once _CE_PATH_ . 'includes/plugin.php';

class CreativeElements extends Module
{
    const VIEWS = 'modules/creativeelements/views/';

    public function __construct($name = null, Context $context = null)
    {
        $this->name = 'creativeelements';
        $this->tab = 'content_management';
        $this->version = '0.11.4.6';
        $this->author = 'WebshopWorks';
        $this->module_key = '7a5ebcc21c1764675f1db5d0f0eacfe5';
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.7');
        $this->bootstrap = true;
        $this->displayName = $this->l('Creative Elements - Elementor based PageBuilder');
        $this->description = $this->l('The most advanced frontend drag & drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.');
        $this->controllers = array('preview');
        parent::__construct($this->name, null);

        $this->tplCreativePage = _CE_PATH_ . 'views/templates/hook/creative_page.tpl';
        $this->tplEmptyPage = _CE_PATH_ . 'views/templates/hook/empty_page.tpl';
        $this->dir = $this->context->language->is_rtl ? '-rtl' : '';
        $this->min = _PS_MODE_DEV_ ? '' : '.min';

        if (Tools::getIsset('ce_upgrade') && Tools::getValue('token') == Tools::getAdminTokenLite('AdminCreativePage')) {
            $ver = preg_replace('~[^\d\.]~', '', Tools::getValue('ce_upgrade', ''));
            $upg = _CE_PATH_ . "upgrade/upgrade-$ver.php";
            if (file_exists($upg)) {
                require_once $upg;
                call_user_func('upgrade_module_' . str_replace('.', '_', $ver), $this) && Tools::redirectAdmin($this->context->link->getAdminLink('AdminCreativePage'));
            }
        }

        Shop::addTableAssociation(CreativePage::$definition['table'], array('type' => 'shop'));
        Shop::addTableAssociation(CreativePage::$definition['table'] . '_lang', array('type' => 'fk_shop'));
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        $this->langs = Language::getLanguages(false);

        $db = Db::getInstance();
        $table = _DB_PREFIX_ . CreativePage::$definition['table'];
        $engine = _MYSQL_ENGINE_;

        $res = $db->execute("
            CREATE TABLE IF NOT EXISTS `$table` (
              `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `id_employee` int(10) UNSIGNED NOT NULL,
              `id_page` int(10) UNSIGNED NOT NULL DEFAULT 0,
              `type` varchar(64) NOT NULL DEFAULT '',
              `active` tinyint UNSIGNED NOT NULL DEFAULT 0,
              `date_add` datetime NOT NULL,
              `date_upd` datetime NOT NULL,
              PRIMARY KEY (`id`),
              KEY `id_page` (`id_page`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8;
        ") && $db->execute("
            CREATE TABLE IF NOT EXISTS `{$table}_lang` (
              `id` int(10) UNSIGNED NOT NULL,
              `id_lang` int(10) UNSIGNED NOT NULL,
              `id_shop` int(10) UNSIGNED NOT NULL DEFAULT 1,
              `title` varchar(128) NOT NULL DEFAULT '',
              `data` longtext,
              PRIMARY KEY (`id`, `id_shop`, `id_lang`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8;
        ") && $db->execute("
            CREATE TABLE IF NOT EXISTS `{$table}_shop` (
              `id` int(10) UNSIGNED NOT NULL,
              `id_shop` int(10) UNSIGNED NOT NULL,
              PRIMARY KEY (`id`,`id_shop`),
              KEY `id_shop` (`id_shop`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8;
        ") && $db->execute("
            CREATE TABLE IF NOT EXISTS `{$table}_meta` (
              `id` int(10) UNSIGNED NOT NULL,
              `id_lang` int(10) UNSIGNED NOT NULL,
              `id_shop` int(10) UNSIGNED NOT NULL DEFAULT 1,
              `meta_key` varchar(255) NOT NULL,
              `meta_value` longtext NOT NULL,
              `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `date_upd` timestamp NOT NULL,
              PRIMARY KEY (`id`, `id_lang`, `id_shop`, `meta_key`)
            ) ENGINE=$engine DEFAULT CHARSET=utf8;
        ");

        if (!$res) {
            $this->_errors[] = $db->getMsgError();
            return false;
        }

        $addHome = !$db->getValue('SELECT 1 FROM ' . $table);
        if ($addHome) {
            $elem = new CreativePage();
            $elem->type = 'displayHome';
            $elem->active = true;
            $elem->data = array();
            $elem->title = array();
            foreach ($this->langs as &$lang) {
                $elem->title[$lang['id_lang']] = 'Home';
            }
            $elem->add();
        }

        return parent::install() && $this->addTabs();
    }

    public function uninstall()
    {
        return parent::uninstall() && $this->deleteTabs();
    }

    public function enable($force_all = false)
    {
        if ($res = parent::enable($force_all)) {
            try {
                Tab::enablingForModule($this->name);
            } catch (Exception $ex) {
            }

            foreach (CreativePage::getHooks() as $hook) {
                $this->registerHook($hook);
            }
        }

        return $res;
    }

    public function disable($force_all = false)
    {
        try {
            Tab::disablingForModule($this->name);
        } catch (Exception $ex) {
        }

        foreach (CreativePage::getHooks() as $hook) {
            $this->unregisterHook($hook);
        }

        return parent::disable($force_all);
    }

    protected function addTabs()
    {
        $id_themes = (int) Tab::getIdFromClassName('AdminParentThemes');

        $tab = new Tab();
        $tab->id_parent = $id_themes;
        $tab->module = $this->name;
        $tab->class_name = 'AdminParentCreativeElements';
        $tab->name = array();
        foreach ($this->langs as &$lang) {
            $tab->name[$lang['id_lang']] = 'Creative Elements PageBuilder';
        }
        $res = (bool) $tab->add();
        $tab->position = 0;
        empty($res) or empty($id_themes) or $tab->update();
        $id_parent = $tab->id;

        $tab = new Tab();
        $tab->id_parent = $id_parent;
        $tab->module = $this->name;
        $tab->class_name = 'AdminCreativePage';
        $tab->name = array();
        foreach ($this->langs as &$lang) {
            $tab->name[$lang['id_lang']] = 'Content Anywhere';
        }
        $res = $res && $tab->add();
        $id_cp = $tab->id;

        $tab = new Tab();
        $tab->id_parent = $id_themes ? $id_parent : $id_cp;
        $tab->module = $this->name;
        $tab->class_name = 'CreativeEditor';
        $tab->name = array();
        foreach ($this->langs as &$lang) {
            $tab->name[$lang['id_lang']] = 'Live Editor';
        }
        $res = $res && $tab->add();

        return $res;
    }

    protected function deleteTabs()
    {
        $table = _DB_PREFIX_ . 'tab';
        $rows = Db::getInstance()->executeS("SELECT id_tab FROM $table WHERE module = '{$this->name}' ORDER BY id_tab DESC");
        foreach ($rows as $row) {
            $tab = new Tab($row['id_tab']);
            empty($tab->id) or $tab->delete();
        }
        return true;
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminCreativePage'));
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        $hideEditor = array();
        $controller = Tools::getValue('controller');
        preg_match('~/(\d+)/edit\b~', $_SERVER['REQUEST_URI'], $matchId);

        switch ($controller) {
            case 'AdminCreativePage':
                $type = '';
                $id = (int) Tools::getValue('id');
                break;
            case 'AdminCmsContent':
                $type = 'cms';
                $id = (int) Tools::getValue('id_cms', $matchId ? $matchId[1] : 0);
                $hideEditor = CreativePage::getLangIdsByPage($type, $id);
                break;
            case 'AdminCategories':
                $type = 'category';
                $id = (int) Tools::getValue('id_category', $matchId ? $matchId[1] : 0);
                $hideEditor = CreativePage::getLangIdsByPage($type, $id);
                break;
            case 'AdminProducts':
                $type = 'displayFooterProduct';
                $id = (int) basename(explode('?', $_SERVER['REQUEST_URI'])[0]);
                break;
            case 'AdminModules':
                if (Tools::getValue('configure') == 'ybc_blog' && Tools::getValue('control') == 'post') {
                    $type = 'ybc_blog_post_class';
                    $id = (int) Tools::getValue('id_post');
                    $hideEditor = CreativePage::getLangIdsByPage($type, $id);
                }
                break;
        }

        if (isset($id)) {
            $id_key = empty($type) ? 'id' : 'id_page';

            $this->context->controller->addJQuery();
            $this->context->controller->js_files[] = $this->_path . 'views/js/admin.js?v=' . _CE_VERSION_;
            $this->context->controller->css_files[$this->_path . 'views/css/admin.css?v=' . _CE_VERSION_] = 'all';

            if (version_compare(_PS_VERSION_, '1.7', '<')) {
                $this->context->controller->css_files[$this->_path . 'views/lib/material-icons/material-icons.css?v=' . _CE_VERSION_] = 'all';
            }

            Media::addJsDef(array(
                'hideEditor' => $hideEditor,
                'creativePageType' => $type,
                'creativePageSave' => $this->l('Please save the form before editing with Creative Elements'),
            ));

            $this->context->smarty->assign(array(
                'edit_width_ce' => $this->context->link->getAdminLink('CreativeEditor') . "&type=$type&$id_key=$id",
            ));
        }
        return $this->context->smarty->fetch(_CE_PATH_ . 'views/templates/hook/backoffice_header.tpl');
    }

    public function registerEditStylesheets()
    {
        $this->registerStylesheet('ce-editor-preview', self::VIEWS . "css/editor-preview{$this->dir}{$this->min}.css");
        $this->registerStylesheet('ce-icons', self::VIEWS . 'lib/eicons/css/elementor-icons.min.css');
    }

    public function registerStylesheets()
    {
        $this->registerStylesheet('ce-font-awesome', self::VIEWS . 'lib/font-awesome/css/font-awesome.min.css');
        $this->registerStylesheet('ce-animations', self::VIEWS . 'css/animations.min.css');
        $this->registerStylesheet('ce-frontend', self::VIEWS . "css/frontend{$this->dir}{$this->min}.css");
    }

    public function registerJavascripts()
    {
        $attrs = array('position' => 'bottom');

        $this->registerJavascript('ce-waypoints', self::VIEWS . 'lib/waypoints/waypoints.min.js', $attrs);
        $this->registerJavascript('ce-jquery-numerator', self::VIEWS . 'lib/jquery-numerator/jquery-numerator.min.js', $attrs);
        $this->registerJavascript('ce-slick', self::VIEWS . "lib/slick/slick{$this->min}.js", $attrs);
        $this->registerJavascript('ce-frontend', self::VIEWS . "js/frontend{$this->min}.js", $attrs);
    }

    protected function registerJavascript($hander, $path, $attrs)
    {
        if (method_exists($this->context->controller, 'registerJavascript')) {
            $this->context->controller->registerJavascript($hander, $path, $attrs);
        } else {
            $this->context->controller->addJs(__PS_BASE_URI__ . $path);
        }
    }

    protected function registerStylesheet($hander, $path, $attrs = array('media' => 'all'))
    {
        if (method_exists($this->context->controller, 'registerStylesheet')) {
            $this->context->controller->registerStylesheet($hander, $path, $attrs);
        } else {
            $this->context->controller->css_files[__PS_BASE_URI__ . $path] = isset($attrs['media']) ? $attrs['media'] : 'all';
        }
    }

    public function hookDisplayHeader()
    {
        $plugin = CreativeElements\Plugin::instance();

        if (self::checkAdminToken() && Tools::getValue('render') == 'widget') {
            $plugin->editor->setEditMode(true);
            $plugin->widgets_manager->ajaxRenderWidget();
        }

        $this->context->smarty->registerClass('CreativeUtils', '\CreativeElements\Utils');

        if (version_compare(_PS_VERSION_, '1.7', '<')) {
            $this->hookOverrideLayoutTemplate(null);
        }

        Media::addJsDef(array(
            'elementorFrontendConfig' => array(
                'isEditMode' => '',
                'stretchedSectionContainer' => CreativeElements\get_option('elementor_stretched_section_container', ''),
                'is_rtl' => !empty($this->context->language->is_rtl),
            ),
        ));
    }

    public function hookOverrideLayoutTemplate($params)
    {
        if (!empty($this->tplOverrided)) {
            return CeAssetManager::instance()->clean();
        }

        $this->tplOverrided = true;
        $this->registerStylesheets();

        $smarty = $this->context->smarty;
        $controller = $this->context->controller;

        if ($controller->php_self == 'cms') {
            if (isset($smarty->tpl_vars['cms']->value['id'])) {
                $id = $smarty->tpl_vars['cms']->value['id'];
                $content = &$smarty->tpl_vars['cms']->value['content'];
            } elseif (isset($controller->cms->id)) {
                $id = $controller->cms->id;
                $content = &$controller->cms->content;
            }
        } elseif ($controller->php_self == 'category') {
            if (isset($smarty->tpl_vars['category']->value['id'])) {
                $id = $smarty->tpl_vars['category']->value['id'];
                $content = &$smarty->tpl_vars['category']->value['description'];
            } elseif (Validate::isLoadedObject($category = $controller->getCategory())) {
                $id = $category->id;
                $content = &$category->description;
            }
        } elseif ($controller instanceof Ybc_blogBlogModuleFrontController) {
            $controller->php_self = 'ybc_blog_post_class';

            if (isset($smarty->tpl_vars['blog_post']->value['id_post'])) {
                $id = $smarty->tpl_vars['blog_post']->value['id_post'];
                $content = &$smarty->tpl_vars['blog_post']->value['description'];

                if (Tools::getIsset('adtoken') && self::hasAdminToken('AdminCreativePage')) {
                    // override post status for preview
                    $smarty->tpl_vars['blog_post']->value['enabled'] = 1;
                }
            }
        }

        if (self::checkAdminToken()) {
            $this->registerEditStylesheets();

            if (!empty($id)) {
                $content = $smarty->fetch($this->tplEmptyPage);
            }
        } else {
            $this->registerJavascripts();

            if (!empty($id)) {
                $vars = $this->getWidgetVariables($controller->php_self, array('id' => $id));

                if (!empty($vars)) {
                    $smarty->assign($vars[0]);
                    $content = $smarty->fetch($this->tplCreativePage);
                }
            }
        }

        empty($params) or CeAssetManager::instance()->store();
    }

    public function hookDisplayFooterProduct($params)
    {
        return $this->renderWidget('displayFooterProduct', $params);
    }

    public function __call($method, $args)
    {
        if (stripos($method, 'hookActionObject') === 0 && stripos($method, 'DeleteAfter') !== false) {
            $class = Tools::substr($method, 16, -11);

            CreativePage::deleteInstance(
                Tools::strtolower($class),
                $args[0]['object']->{$class::$definition['primary']}
            );
        } elseif (stripos($method, 'hook') === 0) {
            return $this->renderWidget(Tools::substr($method, 4), $args);
        } else {
            throw new Exception('Can not find method: ' . $method);
        }
    }

    public function renderWidget($hookName = null, array $config = array())
    {
        if (!$hookName) {
            return;
        }

        if (self::checkAdminToken() && !strcasecmp(Tools::getValue('cp_type'), $hookName)) {
            return $this->context->smarty->fetch($this->tplEmptyPage);
        }

        $out = '';
        $vars = $this->getWidgetVariables($hookName, $config);
        foreach ($vars as &$var) {
            $this->context->smarty->assign($var);
            $out .= $this->context->smarty->fetch($this->tplCreativePage);
        }
        return $out;
    }

    public function getWidgetVariables($hookName = null, array $config = array())
    {
        $id = (int) Tools::getValue('id');
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        $pages = array();
        $vars = array();

        if ($id && self::checkAdminToken() && !strcasecmp(Tools::getValue('cp_type'), $hookName)) {
            $pages[] = new CreativePage($id, $id_lang, $id_shop);
        } else {
            if (!strcasecmp('displayFooterProduct', $hookName)) {
                $id = $this->context->controller->getProduct()->id;
                $pages += CreativePage::getDataRows($hookName, !self::hasAdminToken('AdminProducts'), $id, $id_lang, $id_shop, 1);
            }
            $id = empty($config['id']) ? 0 : $config['id'];
            $pages += CreativePage::getDataRows($hookName, !self::hasAdminToken('AdminCreativePage'), $id, $id_lang, $id_shop);
        }

        foreach ($pages as &$page) {
            $obj = (object) $page;
            if (!empty($obj->id)) {
                $css_file = new CreativeElements\PostCssFile($obj->id, $this->context->language->id);
                $css_file->enqueue();

                $vars[] = array(
                    'creative_elements' => CreativeElements\Plugin::instance(),
                    'creativepage_id' => $obj->id,
                    'creativepage_data' => (array) json_decode($obj->data, true),
                );
            }
        }
        return $vars;
    }

    public function registerHook($hook_name, $shop_list = null, $position = 1)
    {
        $res = parent::registerHook($hook_name, $shop_list);

        if ($res && is_numeric($position)) {
            $this->updatePosition(Hook::getIdByName($hook_name), 0, $position);
        }
        return $res;
    }

    public function hookActionObjectProductDeleteAfter($params)
    {
        CreativePage::deleteInstance('displayFooterProduct', $params['object']->id);
    }

    public static function checkAdminToken()
    {
        static $res = null;

        if (null === $res && Tools::getIsset('cp_type')) {
            $type = Tools::getValue('cp_type');
            $tab = $type == 'cms' ? 'AdminCmsContent' : ($type == 'displayFooterProduct' ? 'AdminProducts' : 'AdminCreativePage');
            $res = self::hasAdminToken($tab);
        }

        return $res;
    }

    public static function hasAdminToken($tab)
    {
        $adtoken = Tools::getAdminToken($tab . (int) Tab::getIdFromClassName($tab) . (int) Tools::getValue('id_employee'));
        return Tools::getValue('adtoken') == $adtoken;
    }

    public static function factory($class, $data)
    {
        $class = '\\CreativeElements\\' . $class;
        return new $class($data);
    }
}
