<?php
/**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com, Elementor.com
 * @copyright 2019 WebshopWorks & Elementor
 * @license   https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace CreativeElements;

defined('_PS_VERSION_') or exit;

class ControlHidden extends ControlBase
{
    public function getType()
    {
        return 'hidden';
    }

    public function contentTemplate()
    {
        ?>
        <input type="hidden" data-setting="{{{ data.name }}}" />
        <?php
    }
}
