<?php
/**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com
 * @copyright 2019 WebshopWorks
 * @license   One domain support license
 */

defined('_PS_VERSION_') or exit;

class CeAssetManager
{
    private $emptyStyles;
    private $emptyScripts;

    private $styleMan;
    private $styleListRef;
    private $styleList;

    private $scriptMan;
    private $scriptListRef;
    private $scriptList;

    private static function cccReducer()
    {
        static $cccReducer;
        if (null === $cccReducer) {
            $controller = Context::getContext()->controller;
            $cccReducerRef = new ReflectionProperty($controller, 'cccReducer');
            $cccReducerRef->setAccessible(true);
            $cccReducer = $cccReducerRef->getValue($controller);
        }
        return $cccReducer;
    }

    public static function instance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }
        return $instance;
    }

    private function __construct()
    {
        $controller = Context::getContext()->controller;
        $emptyList = array(
            'external' => array(),
            'inline' => array(),
        );

        $this->emptyStyles = $emptyList;
        $this->emptyScripts = array(
            'head' => $emptyList,
            'bottom' => $emptyList,
        );

        $styleManRef = new ReflectionProperty($controller, 'stylesheetManager');
        $styleManRef->setAccessible(true);
        $this->styleMan = $styleManRef->getValue($controller);

        $this->styleListRef = new ReflectionProperty($this->styleMan, 'list');
        $this->styleListRef->setAccessible(true);

        $scriptManRef = new ReflectionProperty($controller, 'javascriptManager');
        $scriptManRef->setAccessible(true);
        $this->scriptMan = $scriptManRef->getValue($controller);

        $this->scriptListRef = new ReflectionProperty($this->scriptMan, 'list');
        $this->scriptListRef->setAccessible(true);
    }

    private function getStyleList()
    {
        return $this->styleListRef->getValue($this->styleMan);
    }

    private function getScriptList()
    {
        return $this->scriptListRef->getValue($this->scriptMan);
    }

    private function setStyleList($list)
    {
        $this->styleListRef->setValue($this->styleMan, $list);
    }

    private function setScriptList($list)
    {
        $this->scriptListRef->setValue($this->scriptMan, $list);
    }

    public function store()
    {
        $this->styleList = $this->getStyleList();
        $this->scriptList = $this->getScriptList();
        $this->setStyleList($this->emptyStyles);
        $this->setScriptList($this->emptyScripts);

        $this->registerOutputFilter();
    }

    public function clean()
    {
        Context::getContext()->smarty->assign(array(
            'stylesheets' => $this->emptyStyles,
            'javascript' => $this->emptyScripts,
        ));
    }

    public function restore()
    {
        $styleList = $this->getStyleList();
        $this->styleList['external'] += $styleList['external'];
        $this->styleList['inline'] += $styleList['inline'];
        $this->setStyleList($this->styleList);

        $scriptList = $this->getScriptList();
        $this->scriptList['head']['external'] += $scriptList['head']['external'];
        $this->scriptList['head']['inline'] += $scriptList['head']['inline'];
        $this->scriptList['bottom']['external'] += $scriptList['bottom']['external'];
        $this->scriptList['bottom']['inline'] += $scriptList['bottom']['inline'];
        $this->setScriptList($this->scriptList);
    }

    public function fetchAssets()
    {
        $styles = $this->styleMan->getList();
        $scripts = $this->scriptMan->getList();

        if (Configuration::get('PS_CSS_THEME_CACHE')) {
            $styles = self::cccReducer()->reduceCss($styles);
        }
        if (Configuration::get('PS_JS_THEME_CACHE')) {
            $scripts = self::cccReducer()->reduceJs($scripts);
        }

        $assets = new stdClass();
        $smarty = Context::getContext()->smarty;

        $smarty->assign('stylesheets', $styles);
        $assets->head = $smarty->fetch('_partials/stylesheets.tpl');

        $smarty->assign('javascript', $scripts['head']);
        $assets->head .= $smarty->fetch('_partials/javascript.tpl');

        $smarty->assign('javascript', $scripts['bottom']);
        $assets->bottom = $smarty->fetch('_partials/javascript.tpl');

        return $assets;
    }

    private function registerOutputFilter()
    {
        $ctx = Context::getContext();

        $templateRef = new ReflectionProperty($ctx->controller, 'template');
        $templateRef->setAccessible(true);
        $template = $templateRef->getValue($ctx->controller);

        $ctx->smarty->registerFilter('output', function ($out, $tpl) use ($template) {
            if ($tpl->template_resource === $template) {
                CreativeElements\Plugin::instance()->frontend->printGoogleFonts();

                $assetMan = CeAssetManager::instance();
                $assetMan->restore();
                $assets = $assetMan->fetchAssets();

                $needle = '<script';
                $pos = strpos($out, $needle);
                if ($pos !== false) {
                    $out = substr_replace($out, $assets->head . $needle, $pos, strlen($needle));
                }

                $needle = '</body';
                $pos = strpos($out, $needle);
                if ($pos !== false) {
                    $out = substr_replace($out, $assets->bottom . $needle, $pos, strlen($needle));
                }
            }
            return $out;
        });
    }
}
