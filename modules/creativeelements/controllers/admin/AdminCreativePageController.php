<?php
/**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com
 * @copyright 2019 WebshopWorks
 * @license   One domain support license
 */

defined('_PS_VERSION_') or exit;

require_once _PS_MODULE_DIR_ . 'creativeelements/classes/CreativePage.php';

class AdminCreativePageController extends ModuleAdminController
{
    public $bootstrap = true;

    public function __construct()
    {
        $this->table = 'creativepage';
        $this->identifier = 'id';
        $this->className = 'CreativePage';
        $this->lang = true;
        parent::__construct();

        if ((Tools::getIsset('updatecreativepage') || Tools::getIsset('addcreativepage')) && Shop::getContextShopID() === null) {
            $this->displayWarning(
                $this->trans('You are in a multistore context: any modification will impact all your shops, or each shop of the active group.', array(), 'Admin.Catalog.Notification')
            );
        }

        $this->addRowAction('edit');
        // $this->addRowAction('duplicate');
        $this->addRowAction('delete');

        $table_shop = _DB_PREFIX_ . $this->table . '_shop';
        $this->_join = "LEFT JOIN $table_shop sa ON sa.id = a.id AND b.id_shop = sa.id_shop";
        $this->_where = "AND sa.id_shop = {$this->context->shop->id} AND id_page = 0 AND active < " . CreativePage::TPL_ACTIVE;
        $this->_orderBy = 'title';
        $this->_use_found_rows = false;

        $this->fields_list = array(
            'id' => array(
                'title' => $this->trans('ID', array(), 'Admin.Global'),
                'class' => 'fixed-width-xs',
                'align' => 'center',
                'orderby' => true,
            ),
            'title' => array(
                'title' => $this->trans('Title', array(), 'Admin.Global'),
                'orderby' => true,
            ),
            'type' => array(
                'title' => $this->trans('Position', array(), 'Admin.Global'),
                'orderby' => true,
            ),
            'active' => array(
                'title' => $this->trans('Displayed', array(), 'Admin.Global'),
                'align' => 'center',
                'active' => 'status',
                'type' => 'bool',
                'orderby' => false,
            ),
            'date_add' => array(
                'title' => $this->trans('Creation', array(), 'Admin.Global'),
                'class' => 'fixed-width-lg',
                'type' => 'datetime',
            ),
            'date_upd' => array(
                'title' => $this->trans('Last modification', array(), 'Admin.Global'),
                'class' => 'fixed-width-lg',
                'type' => 'datetime',
            ),
        );

        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->trans('Delete selected', array(), 'Admin.Notifications.Info'),
                'icon' => 'icon-trash',
                'confirm' => $this->trans('Delete selected items?', array(), 'Admin.Notifications.Info')
            ),
        );
    }

    public function setMedia($isNewTheme = false)
    {
        $this->addJquery();
        $this->js_files[] = _MODULE_DIR_ . 'creativeelements/views/lib/select2/js/select2.min.js?ver=4.0.2';
        $this->css_files[_MODULE_DIR_ . 'creativeelements/views/lib/select2/css/select2.min.css?ver=4.0.2'] = 'all';

        return parent::setMedia($isNewTheme);
    }

    public function initHeader()
    {
        parent::initHeader();
        $tabs = &$this->context->smarty->tpl_vars['tabs']->value;
        foreach ($tabs as &$tab0) {
            if ($tab0['class_name'] == 'IMPROVE') {
                foreach ($tab0['sub_tabs'] as &$tab1) {
                    if ($tab1['class_name'] == 'AdminParentThemes') {
                        foreach ($tab1['sub_tabs'] as &$tab2) {
                            if ($tab2['class_name'] == 'AdminParentCreativeElements') {
                                $sub_tabs = &$tab2['sub_tabs'];

                                $tab = Tab::getTab($this->context->language->id, Tab::getIdFromClassName('AdminCmsContent'));
                                $tab['current'] = '';
                                $tab['href'] = $this->context->link->getAdminLink('AdminCmsContent');
                                $sub_tabs[1] = $tab;

                                $tab = Tab::getTab($this->context->language->id, Tab::getIdFromClassName('AdminCategories'));
                                $tab['current'] = '';
                                $tab['href'] = $this->context->link->getAdminLink('AdminCategories');
                                $sub_tabs[2] = $tab;

                                $tab = Tab::getTab($this->context->language->id, Tab::getIdFromClassName('AdminProducts'));
                                $tab['current'] = '';
                                $tab['href'] = $this->context->link->getAdminLink('AdminProducts');
                                $sub_tabs[3] = $tab;
                                break;
                            }
                        }
                        break;
                    }
                }
                break;
            }
        }
    }

    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('Place Content Anywhere');
    }

    public function initPageHeaderToolbar()
    {
        if (empty($this->display)) {
            $this->page_header_toolbar_btn['add_creative_page'] = array(
                'href' => self::$currentIndex . '&addcreativepage&token=' . $this->token,
                'desc' => $this->l('Add new'),
                'icon' => 'process-icon-new',
            );
        }
        parent::initPageHeaderToolbar();
    }

    public function renderView()
    {
        if (($elem = $this->loadObject(true)) && Validate::isLoadedObject($elem)) {
            $link = $this->context->link->getAdminLink('AdminCreativePage') . '&id=' . $elem->id;
            Tools::redirectLink($link);
        }
        return $this->displayWarning($this->trans('Page not found', array(), 'Admin.Notifications.Error'));
    }

    public function renderForm()
    {
        if (($elem = $this->loadObject(true)) && Validate::isLoadedObject($elem)) {
            /** @var Attachment $elem */
            $link = $this->context->link->getAdminLink('AdminCreativePage') . '&id=' . $elem->id;
        }

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->trans('Content', array(), 'Admin.Global'),
                'icon' => 'icon-file-text',
            ),
            'tabs' => array(
                'basic' => $this->trans('Basic', array(), 'Admin.Global'),
                'assignments' => $this->trans('Assignments', array(), 'Admin.Global'),
            ),
            'input' => array(
                'title' => array(
                    'tab' => 'basic',
                    'name' => 'title',
                    'type' => 'text',
                    'label' => $this->trans('Title', array(), 'Admin.Global'),
                    'lang' => true,
                    'col' => 4,
                ),
                'type' => array(
                    'tab' => 'basic',
                    'name' => 'type',
                    'type' => 'select',
                    'label' => $this->trans('Position', array(), 'Admin.Global'),
                    'required' => true,
                    'options' => array(
                        'options' => array(
                            'id' => 'id',
                            'name' => 'id',
                            'query' => 'query',
                        ),
                        'optiongroup' => array(
                            'label' => 'label',
                            'query' => array(
                                array(
                                    'label' => $this->l('Page specific Positions'),
                                    'query' => array(
                                        array('id' => 'displayHome'),
                                        array('id' => 'displayShoppingCart'),
                                        array('id' => 'displayShoppingCartFooter'),
                                        array('id' => 'displayFooterProduct'),
                                    ),
                                ),
                                array(
                                    'label' => $this->l('General Positions'),
                                    'query' => CreativePage::getGeneralPositions(),
                                ),
                            ),
                        ),
                    ),
                    'col' => 3,
                ),
                'content' => array(
                    'tab' => 'basic',
                    'name' => 'content',
                    'type' => 'textarea',
                    'label' => $this->trans('Content', array(), 'Admin.Global'),
                    'lang' => true,
                    'col' => 4,
                ),
                'active' => array(
                    'tab' => 'basic',
                    'name' => 'active',
                    'type' => 'switch',
                    'label' => $this->trans('Displayed', array(), 'Admin.Global'),
                    'required' => false,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->trans('Enabled', array(), 'Admin.Global'),
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->trans('Disabled', array(), 'Admin.Global'),
                        ),
                    ),
                ),
                'assignment' => array(
                    'tab' => 'assignments',
                    'name' => 'assignment',
                    'type' => 'select',
                    'label' => $this->trans('Page assignment', array(), 'Admin.Global'),
                    'class' => 'full-width',
                    'col' => 3,
                    'options' => array(
                        'query' => array(
                            array(
                                'id' => '',
                                'name' => $this->trans('All pages', array(), 'Admin.Global'),
                            ),
                            array(
                                'id' => 1,
                                'name' => $this->trans('Only on selected pages', array(), 'Admin.Global'),
                            ),
                            array(
                                'id' => -1,
                                'name' => $this->trans('All pages except those selected', array(), 'Admin.Global'),
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'hint' => $this->trans('If the selected Position does not exist in the theme used to display a page, the content will not appear even if it is assigned to a specific page', array(), 'Admin.Global'),
                ),
                'pages[]' => array(
                    'tab' => 'assignments',
                    'name' => 'pages[]',
                    'type' => 'select',
                    'label' => $this->l('- Select Pages -'),
                    'class' => 'ce-pages',
                    'multiple' => true,
                    'options' => array(
                        'options' => array(
                            'id' => 'id',
                            'name' => 'name',
                            'query' => 'query',
                        ),
                        'optiongroup' => array(
                            'label' => 'label',
                            'query' => array(
                                array(
                                    'label' => $this->l('Main Pages'),
                                    'query' => array(
                                        array(
                                            'id' => 'index',
                                            'name' => $this->trans('Home', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'product',
                                            'name' => $this->trans('Products', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'cart',
                                            'name' => $this->trans('Cart', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'cms',
                                            'name' => $this->trans('CMS Pages', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'contact-us',
                                            'name' => $this->trans('Contact us', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'stores',
                                            'name' => $this->trans('Our stores', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'sitemap',
                                            'name' => $this->trans('Sitemap', array(), 'Admin.Global'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => $this->l('Listing Pages'),
                                    'query' => array(
                                        array(
                                            'id' => 'category',
                                            'name' => $this->trans('Categories', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'best-sales',
                                            'name' => $this->trans('Best sellers', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'new-products',
                                            'name' => $this->trans('New products', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'prices-drop',
                                            'name' => $this->trans('On sale', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'search',
                                            'name' => $this->trans('Search results', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'brands',
                                            'name' => $this->trans('Brands', array(), 'Admin.Global'),
                                        ),
                                        array(
                                            'id' => 'supplier',
                                            'name' => $this->trans('Suppliers', array(), 'Admin.Global'),
                                        ),
                                    ),
                                ),
                                array(
                                    'label' => $this->l('Other Pages'),
                                    'query' => array(
                                        array(
                                            'id' => 'pagenotfound',
                                            'name' => $this->trans('Page not found', array(), 'Admin.Global'),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'groupBox' => array(
                    'tab' => 'assignments',
                    'name' => 'groupBox',
                    'type' => 'group',
                    'label' => $this->trans('Group access', array(), 'Admin.Catalog.Feature'),
                    'values' => Group::getGroups($this->context->language->id),
                    'info_introduction' => $this->trans('You now have three default customer groups.', array(), 'Admin.Catalog.Help'),
                    // 'unidentified' => $unidentified_group_information,
                    // 'guest' => $guest_group_information,
                    // 'customer' => $default_group_information,
                    'hint' => $this->l('Mark all of the customer groups which you would like to have access to this content.'),
                ),
            ),
            'submit' => array(
                'title' => $this->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true,
            ),
        );

        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'name' => 'checkBoxShopAsso',
                'type' => 'shop',
                'label' => $this->l('Shop association'),
            );
        }

        $this->getFieldsValues($this->loadObject(true));

        return parent::renderForm();
    }

    public function getFieldsValues($obj)
    {
        // Add custom position if needed
        $optgroups = &$this->fields_form['input']['type']['options']['optiongroup']['query'];

        if (array_search($obj->type, array_column($optgroups[0]['query'], 'id')) === false &&
            array_search($obj->type, array_column($optgroups[1]['query'], 'id')) === false
        ) {
            $optgroups[] = array(
                'label' => $this->l('Custom Positions'),
                'query' => array(
                    array('id' => $obj->type),
                ),
            );
        }

        // Assignments
        if ($assign = CreativeElements\get_post_meta($obj->id, 'assign')) {
            foreach ($assign as $key => &$value) {
                $this->fields_value[$key] = &$value;
            }

            if (!empty($assign['pages[]'])) {
                $pages = array();
                $optgroups = &$this->fields_form['input']['pages[]']['options']['optiongroup']['query'];

                foreach ($assign['pages[]'] as $page) {
                    list($ctrl, $id) = explode(':', $page . ':');

                    if ($id) {
                        empty($pages[$ctrl]) ? $pages[$ctrl] = array($id) : $pages[$ctrl][] = $id;
                    } elseif ($page != 'pagenotfound' &&
                        array_search($page, array_column($optgroups[0]['query'], 'id')) === false &&
                        array_search($page, array_column($optgroups[1]['query'], 'id')) === false
                    ) {
                        $optgroups[2]['query'] = array(
                            'id' => $page,
                            'name' => $page,
                        );
                    }
                }
                empty($pages) or $this->generatePageOptions($optgroups[2]['query'], $pages);
            }
        }

        // Added values of object Group
        $content_groups = $obj->getGroups();
        $content_groups_ids = array();
        if (is_array($content_groups)) {
            foreach ($content_groups as $content_group) {
                $content_groups_ids[] = $content_group['id_group'];
            }
        }

        $groups = Group::getGroups($this->context->language->id);

        foreach ($groups as $group) {
            $this->fields_value['groupBox_' . $group['id_group']] = Tools::getValue(
                'groupBox_' . $group['id_group'],
                in_array($group['id_group'], $content_groups_ids) || empty($content_groups_ids) && !$obj->id
            );
        }
    }

    protected function generatePageOptions(&$opts, &$pages)
    {
        $db = Db::getInstance();
        $ctx = "id_lang = {$this->context->language->id} AND id_shop = {$this->context->shop->id}";

        foreach ($pages as $page => $ids) {
            if ($page == 'product' || $page == 'category') {
                $table = _DB_PREFIX_ . $page . '_lang';
                $ids = implode(', ', $ids);
                $res = $db->executeS("SELECT CONCAT('$page', ':', id_{$page}) AS id, name FROM $table WHERE id_{$page} IN ($ids) AND $ctx");
                if ($res) {
                    $opts = array_merge($opts, $res);
                }
            }
        }
    }

    public function processSave()
    {
        if ($obj = parent::processSave()) {
            // Assignments
            CreativeElements\update_post_meta($obj->id, 'assign', array(
                'assignment' => Tools::getValue('assignment'),
                'pages[]' => Tools::getValue('pages'),
            ));
        }
        return $obj;
    }

    protected function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        return empty($this->translator) ? $this->l($id) : parent::trans($id, $parameters, $domain, $locale);
    }

    public function ajaxProcessGetProductList()
    {
        $prods = Product::getSimpleProducts($this->context->language->id);
        $res = array(
            'text' => $this->l('Products'),
            'children' => array(
                array(
                    'id' => 'product',
                    'text' => $this->l('Products'),
                ),
            ),
        );
        foreach ($prods as &$prod) {
            $res['children'][] = array(
                'id' => 'product:' . $prod['id_product'],
                'text' => $prod['name'],
            );
        }
        die(json_encode(array($res)));
    }

    public function ajaxProcessGetCategoryList()
    {
        $cats = Category::getNestedCategories();
        $root = reset($cats);
        $res = array(
            'text' => $this->l('Categories'),
            'children' => array(
                array(
                    'id' => 'category',
                    'text' => $this->l('Categories'),
                ),
            ),
        );
        $this->generateCategoryOptions($res['children'], $root['children']);
        die(json_encode(array($res)));
    }

    protected function generateCategoryOptions(&$opts, &$cats, $level = 1)
    {
        foreach ($cats as &$cat) {
            $opts[] = array(
                'id' => 'category:' . $cat['id_category'],
                'text' => str_repeat('    ', $level) . $cat['name'],
            );
            if (!empty($cat['children'])) {
                $this->generateCategoryOptions($opts, $cat['children'], $level + 1);
            }
        }
    }
}
