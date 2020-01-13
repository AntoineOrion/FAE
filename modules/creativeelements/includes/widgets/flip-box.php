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

class WidgetFlipBox extends WidgetBase
{
    public function getName()
    {
        return 'flip-box';
    }

    public function getTitle()
    {
        return __('Flip Box', 'elementor');
    }

    public function getIcon()
    {
        return 'flip-box';
    }

    public function getCategories()
    {
        return array('general-elements');
    }

    protected function _registerControls()
    {

        $this->startControlsSection(
            'section_side_a_content',
            array(
                'label' => __('Front', 'elementor'),
            )
        );

        $this->startControlsTabs('side_a_content_tabs');

        $this->startControlsTab('side_a_content_tab', array('label' => __('Content', 'elementor')));

        $this->addControl(
            'graphic_element',
            array(
                'label' => __('Graphic Element', 'elementor'),
                'type' => ControlsManager::CHOOSE,
                'label_block' => false,
                'options' => array(
                    'none' => array(
                        'title' => __('None', 'elementor'),
                        'icon' => 'fa fa-ban',
                    ),
                    'image' => array(
                        'title' => __('Image', 'elementor'),
                        'icon' => 'fa fa-picture-o',
                    ),
                    'icon' => array(
                        'title' => __('Icon', 'elementor'),
                        'icon' => 'fa fa-star',
                    ),
                ),
                'default' => 'icon',
            )
        );

        $this->addControl(
            'image',
            array(
                'label' => __('Choose Image', 'elementor'),
                'type' => ControlsManager::MEDIA,
                'default' => array(
                    'url' => Utils::getPlaceholderImageSrc(),
                ),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlImageSize::getType(),
            array(
                'name' => 'image', // Actually its `image_size`
                'default' => 'thumbnail',
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addControl(
            'icon',
            array(
                'label' => __('Icon', 'elementor'),
                'type' => ControlsManager::ICON,
                'default' => 'fa fa-star',
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_view',
            array(
                'label' => __('View', 'elementor'),
                'type' => ControlsManager::SELECT,
                'options' => array(
                    'default' => __('Default', 'elementor'),
                    'stacked' => __('Stacked', 'elementor'),
                    'framed' => __('Framed', 'elementor'),
                ),
                'default' => 'default',
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_shape',
            array(
                'label' => __('Shape', 'elementor'),
                'type' => ControlsManager::SELECT,
                'options' => array(
                    'circle' => __('Circle', 'elementor'),
                    'square' => __('Square', 'elementor'),
                ),
                'default' => 'circle',
                'condition' => array(
                    'icon_view!' => 'default',
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'title_text_a',
            array(
                'label' => __('Title & Description', 'elementor'),
                'type' => ControlsManager::TEXT,
                'default' => __('This is the heading', 'elementor'),
                'placeholder' => __('Enter your title', 'elementor'),
                'label_block' => true,
                'separator' => 'before',
            )
        );

        $this->addControl(
            'description_text_a',
            array(
                'label' => __('Description', 'elementor'),
                'type' => ControlsManager::TEXTAREA,
                'default' => __('Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'elementor'),
                'placeholder' => __('Enter your description', 'elementor'),
                'separator' => 'none',
                'rows' => 10,
                'show_label' => false,
            )
        );

        $this->endControlsTab();

        $this->startControlsTab('side_a_background_tab', array('label' => __('Background', 'elementor')));

        $this->addGroupControl(
            GroupControlBackground::getType(),
            array(
                'name' => 'background_a',
                'types' => array('classic', 'gradient'),
                'selector' => '{{WRAPPER}} .elementor-flip-box__front',
            )
        );

        $this->addControl(
            'background_overlay_a',
            array(
                'label' => __('Background Overlay', 'elementor'),
                'type' => ControlsManager::COLOR,
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__overlay' => 'background-color: {{VALUE}};',
                ),
                'separator' => 'before',
                'condition' => array(
                    'background_a_image[id]!' => '',
                ),
            )
        );

        $this->endControlsTab();

        $this->endControlsTabs();

        $this->endControlsSection();

        $this->startControlsSection(
            'section_side_b_content',
            array(
                'label' => __('Back', 'elementor'),
            )
        );

        $this->startControlsTabs('side_b_content_tabs');

        $this->startControlsTab('side_b_content_tab', array('label' => __('Content', 'elementor')));

        $this->addControl(
            'title_text_b',
            array(
                'label' => __('Title & Description', 'elementor'),
                'type' => ControlsManager::TEXT,
                'default' => __('This is the heading', 'elementor'),
                'placeholder' => __('Enter your title', 'elementor'),
                'label_block' => true,
            )
        );

        $this->addControl(
            'description_text_b',
            array(
                'label' => __('Description', 'elementor'),
                'type' => ControlsManager::TEXTAREA,
                'default' => __('Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'elementor'),
                'placeholder' => __('Enter your description', 'elementor'),
                'separator' => 'none',
                'rows' => 10,
                'show_label' => false,
            )
        );

        $this->addControl(
            'button_text',
            array(
                'label' => __('Button Text', 'elementor'),
                'type' => ControlsManager::TEXT,
                'default' => __('Click Here', 'elementor'),
                'separator' => 'before',
            )
        );

        $this->addControl(
            'link',
            array(
                'label' => __('Link', 'elementor'),
                'type' => ControlsManager::URL,
                'placeholder' => __('https://your-link.com', 'elementor'),
            )
        );

        $this->addControl(
            'link_click',
            array(
                'label' => __('Apply Link On', 'elementor'),
                'type' => ControlsManager::SELECT,
                'options' => array(
                    'box' => __('Whole Box', 'elementor'),
                    'button' => __('Button Only', 'elementor'),
                ),
                'default' => 'button',
                'condition' => array(
                    'link[url]!' => '',
                ),
            )
        );

        $this->endControlsTab();

        $this->startControlsTab('side_b_background_tab', array('label' => __('Background', 'elementor')));

        $this->addGroupControl(
            GroupControlBackground::getType(),
            array(
                'name' => 'background_b',
                'types' => array('classic', 'gradient'),
                'selector' => '{{WRAPPER}} .elementor-flip-box__back',
            )
        );

        $this->addControl(
            'background_overlay_b',
            array(
                'label' => __('Background Overlay', 'elementor'),
                'type' => ControlsManager::COLOR,
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__overlay' => 'background-color: {{VALUE}};',
                ),
                'separator' => 'before',
                'condition' => array(
                    'background_b_image[id]!' => '',
                ),
            )
        );

        $this->endControlsTab();

        $this->endControlsTabs();

        $this->endControlsSection();

        $this->startControlsSection(
            'section_box_settings',
            array(
                'label' => __('Settings', 'elementor'),
            )
        );

        $this->addResponsiveControl(
            'height',
            array(
                'label' => __('Height', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 100,
                        'max' => 1000,
                    ),
                    'vh' => array(
                        'min' => 10,
                        'max' => 100,
                    ),
                ),
                'size_units' => array('px', 'vh'),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box' => 'height: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->addControl(
            'border_radius',
            array(
                'label' => __('Border Radius', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 200,
                    ),
                ),
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__layer, {{WRAPPER}} .elementor-flip-box__layer__overlay' => 'border-radius: {{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->addControl(
            'flip_effect',
            array(
                'label' => __('Flip Effect', 'elementor'),
                'type' => ControlsManager::SELECT,
                'default' => 'flip',
                'options' => array(
                    'flip' => 'Flip',
                    'slide' => 'Slide',
                    'push' => 'Push',
                    'zoom-in' => 'Zoom In',
                    'zoom-out' => 'Zoom Out',
                    'fade' => 'Fade',
                ),
                'prefix_class' => 'elementor-flip-box--effect-',
            )
        );

        $this->addControl(
            'flip_direction',
            array(
                'label' => __('Flip Direction', 'elementor'),
                'type' => ControlsManager::SELECT,
                'default' => 'up',
                'options' => array(
                    'left' => __('Left', 'elementor'),
                    'right' => __('Right', 'elementor'),
                    'up' => __('Up', 'elementor'),
                    'down' => __('Down', 'elementor'),
                ),
                'condition' => array(
                    'flip_effect!' => array(
                        'fade',
                        'zoom-in',
                        'zoom-out',
                    ),
                ),
                'prefix_class' => 'elementor-flip-box--direction-',
            )
        );

        $this->addControl(
            'flip_3d',
            array(
                'label' => __('3D Depth', 'elementor'),
                'type' => ControlsManager::SWITCHER,
                'label_on' => __('On', 'elementor'),
                'label_off' => __('Off', 'elementor'),
                'return_value' => 'elementor-flip-box--3d',
                'default' => '',
                'prefix_class' => '',
                'condition' => array(
                    'flip_effect' => 'flip',
                ),
            )
        );

        $this->endControlsSection();

        $this->startControlsSection(
            'section_style_a',
            array(
                'label' => __('Front', 'elementor'),
                'tab' => ControlsManager::TAB_STYLE,
            )
        );

        $this->addResponsiveControl(
            'padding_a',
            array(
                'label' => __('Padding', 'elementor'),
                'type' => ControlsManager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->addControl(
            'alignment_a',
            array(
                'label' => __('Alignment', 'elementor'),
                'type' => ControlsManager::CHOOSE,
                'label_block' => false,
                'options' => array(
                    'left' => array(
                        'title' => __('Left', 'elementor'),
                        'icon' => 'fa fa-align-left',
                    ),
                    'center' => array(
                        'title' => __('Center', 'elementor'),
                        'icon' => 'fa fa-align-center',
                    ),
                    'right' => array(
                        'title' => __('Right', 'elementor'),
                        'icon' => 'fa fa-align-right',
                    ),
                ),
                'default' => 'center',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__overlay' => 'text-align: {{VALUE}}',
                ),
            )
        );

        $this->addControl(
            'vertical_position_a',
            array(
                'label' => __('Vertical Position', 'elementor'),
                'type' => ControlsManager::CHOOSE,
                'label_block' => false,
                'options' => array(
                    'top' => array(
                        'title' => __('Top', 'elementor'),
                        'icon' => 'eicon-v-align-top',
                    ),
                    'middle' => array(
                        'title' => __('Middle', 'elementor'),
                        'icon' => 'eicon-v-align-middle',
                    ),
                    'bottom' => array(
                        'title' => __('Bottom', 'elementor'),
                        'icon' => 'eicon-v-align-bottom',
                    ),
                ),
                'selectors_dictionary' => array(
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__overlay' => 'justify-content: {{VALUE}}',
                ),
                'separator' => 'after',
            )
        );

        $this->addGroupControl(
            GroupControlBorder::getType(),
            array(
                'name' => 'border_a',
                'selector' => '{{WRAPPER}} .elementor-flip-box__front',
                'separator' => 'before',
            )
        );

        $this->addControl(
            'heading_image_style',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Image', 'elementor'),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
                'separator' => 'before',
            )
        );

        $this->addControl(
            'image_spacing',
            array(
                'label' => __('Spacing', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addControl(
            'image_width',
            array(
                'label' => __('Size (%)', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'size_units' => array('%'),
                'default' => array(
                    'unit' => '%',
                ),
                'range' => array(
                    '%' => array(
                        'min' => 5,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__image img' => 'width: {{SIZE}}{{UNIT}}',
                ),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addControl(
            'image_opacity',
            array(
                'label' => __('Opacity', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'default' => array(
                    'size' => 1,
                ),
                'range' => array(
                    'px' => array(
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__image' => 'opacity: {{SIZE}};',
                ),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlBorder::getType(),
            array(
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-flip-box__image img',
                'condition' => array(
                    'graphic_element' => 'image',
                ),
                'separator' => 'before',
            )
        );

        $this->addControl(
            'image_border_radius',
            array(
                'label' => __('Border Radius', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 200,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__image img' => 'border-radius: {{SIZE}}{{UNIT}}',
                ),
                'condition' => array(
                    'graphic_element' => 'image',
                ),
            )
        );

        $this->addControl(
            'heading_icon_style',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Icon', 'elementor'),
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
                'separator' => 'before',
            )
        );

        $this->addControl(
            'icon_spacing',
            array(
                'label' => __('Spacing', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_primary_color',
            array(
                'label' => __('Primary Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .elementor-view-framed .elementor-icon, {{WRAPPER}} .elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}}',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_secondary_color',
            array(
                'label' => __('Secondary Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'default' => '',
                'condition' => array(
                    'graphic_element' => 'icon',
                    'icon_view!' => 'default',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->addControl(
            'icon_size',
            array(
                'label' => __('Icon Size', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 6,
                        'max' => 300,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_padding',
            array(
                'label' => __('Icon Padding', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
                ),
                'range' => array(
                    'em' => array(
                        'min' => 0,
                        'max' => 5,
                    ),
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                    'icon_view!' => 'default',
                ),
            )
        );

        $this->addControl(
            'icon_rotate',
            array(
                'label' => __('Icon Rotate', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'default' => array(
                    'size' => 0,
                    'unit' => 'deg',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                ),
            )
        );

        $this->addControl(
            'icon_border_width',
            array(
                'label' => __('Border Width', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon' => 'border-width: {{SIZE}}{{UNIT}}',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                    'icon_view' => 'framed',
                ),
            )
        );

        $this->addControl(
            'icon_border_radius',
            array(
                'label' => __('Border Radius', 'elementor'),
                'type' => ControlsManager::DIMENSIONS,
                'size_units' => array('px', '%'),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
                'condition' => array(
                    'graphic_element' => 'icon',
                    'icon_view!' => 'default',
                ),
            )
        );

        $this->addControl(
            'heading_title_style_a',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Title', 'elementor'),
                'separator' => 'before',
                'condition' => array(
                    'title_text_a!' => '',
                ),
            )
        );

        $this->addControl(
            'title_spacing_a',
            array(
                'label' => __('Spacing', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'description_text_a!' => '',
                    'title_text_a!' => '',
                ),
            )
        );

        $this->addControl(
            'title_color_a',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__title' => 'color: {{VALUE}}',

                ),
                'condition' => array(
                    'title_text_a!' => '',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            array(
                'name' => 'title_typography_a',
                'scheme' => SchemeTypography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__title',
                'condition' => array(
                    'title_text_a!' => '',
                ),
            )
        );

        $this->addControl(
            'heading_description_style_a',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Description', 'elementor'),
                'separator' => 'before',
                'condition' => array(
                    'description_text_a!' => '',
                ),
            )
        );

        $this->addControl(
            'description_color_a',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__description' => 'color: {{VALUE}}',

                ),
                'condition' => array(
                    'description_text_a!' => '',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            array(
                'name' => 'description_typography_a',
                'scheme' => SchemeTypography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .elementor-flip-box__front .elementor-flip-box__layer__description',
                'condition' => array(
                    'description_text_a!' => '',
                ),
            )
        );

        $this->endControlsSection();

        $this->startControlsSection(
            'section_style_b',
            array(
                'label' => __('Back', 'elementor'),
                'tab' => ControlsManager::TAB_STYLE,
            )
        );

        $this->addResponsiveControl(
            'padding_b',
            array(
                'label' => __('Padding', 'elementor'),
                'type' => ControlsManager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->addControl(
            'alignment_b',
            array(
                'label' => __('Alignment', 'elementor'),
                'type' => ControlsManager::CHOOSE,
                'label_block' => false,
                'options' => array(
                    'left' => array(
                        'title' => __('Left', 'elementor'),
                        'icon' => 'fa fa-align-left',
                    ),
                    'center' => array(
                        'title' => __('Center', 'elementor'),
                        'icon' => 'fa fa-align-center',
                    ),
                    'right' => array(
                        'title' => __('Right', 'elementor'),
                        'icon' => 'fa fa-align-right',
                    ),
                ),
                'default' => 'center',
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__overlay' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .elementor-flip-box__button' => 'margin-{{VALUE}}: 0',
                ),
            )
        );

        $this->addControl(
            'vertical_position_b',
            array(
                'label' => __('Vertical Position', 'elementor'),
                'type' => ControlsManager::CHOOSE,
                'label_block' => false,
                'options' => array(
                    'top' => array(
                        'title' => __('Top', 'elementor'),
                        'icon' => 'eicon-v-align-top',
                    ),
                    'middle' => array(
                        'title' => __('Middle', 'elementor'),
                        'icon' => 'eicon-v-align-middle',
                    ),
                    'bottom' => array(
                        'title' => __('Bottom', 'elementor'),
                        'icon' => 'eicon-v-align-bottom',
                    ),
                ),
                'selectors_dictionary' => array(
                    'top' => 'flex-start',
                    'middle' => 'center',
                    'bottom' => 'flex-end',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__overlay' => 'justify-content: {{VALUE}}',
                ),
                'separator' => 'after',
            )
        );

        $this->addGroupControl(
            GroupControlBorder::getType(),
            array(
                'name' => 'border_b',
                'selector' => '{{WRAPPER}} .elementor-flip-box__back',
                'separator' => 'before',
            )
        );

        $this->addControl(
            'heading_title_style_b',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Title', 'elementor'),
                'separator' => 'before',
                'condition' => array(
                    'title_text_b!' => '',
                ),
            )
        );

        $this->addControl(
            'title_spacing_b',
            array(
                'label' => __('Spacing', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'title_text_b!' => '',
                ),
            )
        );

        $this->addControl(
            'title_color_b',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__title' => 'color: {{VALUE}}',

                ),
                'condition' => array(
                    'title_text_b!' => '',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            array(
                'name' => 'title_typography_b',
                'scheme' => SchemeTypography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__title',
                'condition' => array(
                    'title_text_b!' => '',
                ),
            )
        );

        $this->addControl(
            'heading_description_style_b',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Description', 'elementor'),
                'separator' => 'before',
                'condition' => array(
                    'description_text_b!' => '',
                ),
            )
        );

        $this->addControl(
            'description_spacing_b',
            array(
                'label' => __('Spacing', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
                'condition' => array(
                    'description_text_b!' => '',
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'description_color_b',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__description' => 'color: {{VALUE}}',

                ),
                'condition' => array(
                    'description_text_b!' => '',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            array(
                'name' => 'description_typography_b',
                'scheme' => SchemeTypography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .elementor-flip-box__back .elementor-flip-box__layer__description',
                'condition' => array(
                    'description_text_b!' => '',
                ),
            )
        );

        $this->addControl(
            'heading_button',
            array(
                'type' => ControlsManager::HEADING,
                'label' => __('Button', 'elementor'),
                'separator' => 'before',
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_size',
            array(
                'label' => __('Size', 'elementor'),
                'type' => ControlsManager::SELECT,
                'default' => 'sm',
                'options' => array(
                    'xs' => __('Extra Small', 'elementor'),
                    'sm' => __('Small', 'elementor'),
                    'md' => __('Medium', 'elementor'),
                    'lg' => __('Large', 'elementor'),
                    'xl' => __('Extra Large', 'elementor'),
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addGroupControl(
            GroupControlTypography::getType(),
            array(
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .elementor-flip-box__button',
                'scheme' => SchemeTypography::TYPOGRAPHY_4,
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->startControlsTabs('button_tabs');

        $this->startControlsTab(
            'normal',
            array(
                'label' => __('Normal', 'elementor'),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_text_color',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_background_color',
            array(
                'label' => __('Background Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button' => 'background-color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_border_color',
            array(
                'label' => __('Border Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button' => 'border-color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->endControlsTab();

        $this->startControlsTab(
            'hover',
            array(
                'label' => __('Hover', 'elementor'),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_hover_text_color',
            array(
                'label' => __('Text Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button:hover' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_hover_background_color',
            array(
                'label' => __('Background Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button:hover' => 'background-color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_hover_border_color',
            array(
                'label' => __('Border Color', 'elementor'),
                'type' => ControlsManager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button:hover' => 'border-color: {{VALUE}};',
                ),
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->endControlsTab();

        $this->endControlsTabs();

        $this->addControl(
            'button_border_width',
            array(
                'label' => __('Border Width', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 20,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button' => 'border-width: {{SIZE}}{{UNIT}};',
                ),
                'separator' => 'before',
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->addControl(
            'button_border_radius',
            array(
                'label' => __('Border Radius', 'elementor'),
                'type' => ControlsManager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .elementor-flip-box__button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
                'separator' => 'after',
                'condition' => array(
                    'button_text!' => '',
                ),
            )
        );

        $this->endControlsSection();
    }

    protected function render()
    {
        $settings = $this->getSettings();
        $wrapper_tag = 'div';
        $button_tag = 'a';
        $link_url = empty($settings['link']['url']) ? '#' : $settings['link']['url'];
        $this->addRenderAttribute('button', 'class', array(
            'elementor-flip-box__button',
            'elementor-button',
            'elementor-size-' . $settings['button_size'],
        ));

        $this->addRenderAttribute('wrapper', 'class', 'elementor-flip-box__layer elementor-flip-box__back');
        if ('box' === $settings['link_click']) {
            $wrapper_tag = 'a';
            $button_tag = 'button';
            $this->addRenderAttribute('wrapper', 'href', $link_url);
            if ($settings['link']['is_external']) {
                $this->addRenderAttribute('wrapper', 'target', '_blank');
            }
        } else {
            $this->addRenderAttribute('button', 'href', $link_url);
            if ($settings['link']['is_external']) {
                $this->addRenderAttribute('button', 'target', '_blank');
            }
        }

        if ('icon' === $settings['graphic_element']) {
            $this->addRenderAttribute('icon-wrapper', 'class', 'elementor-icon-wrapper');
            $this->addRenderAttribute('icon-wrapper', 'class', 'elementor-view-' . $settings['icon_view']);
            if ('default' != $settings['icon_view']) {
                $this->addRenderAttribute('icon-wrapper', 'class', 'elementor-shape-' . $settings['icon_shape']);
            }
            if (!empty($settings['icon'])) {
                $this->addRenderAttribute('icon', 'class', $settings['icon']);
            }
        }

        ?>
        <div class="elementor-flip-box">
            <div class="elementor-flip-box__layer elementor-flip-box__front">
                <div class="elementor-flip-box__layer__overlay">
                    <div class="elementor-flip-box__layer__inner">
                        <?php if ('image' === $settings['graphic_element'] && !empty($settings['image']['url'])) : ?>
                            <div class="elementor-flip-box__image">
                                <?php echo GroupControlImageSize::getAttachmentImageHtml($settings); ?>
                            </div>
                        <?php elseif ('icon' === $settings['graphic_element'] && !empty($settings['icon'])) : ?>
                            <div <?php echo $this->getRenderAttributeString('icon-wrapper'); ?>>
                                <div class="elementor-icon">
                                    <i <?php echo $this->getRenderAttributeString('icon'); ?>></i>
                                </div>
                            </div>
                        <?php endif;?>

                        <?php if (!empty($settings['title_text_a'])) : ?>
                            <h3 class="elementor-flip-box__layer__title">
                                <?php echo $settings['title_text_a']; ?>
                            </h3>
                        <?php endif;?>

                        <?php if (!empty($settings['description_text_a'])) : ?>
                            <div class="elementor-flip-box__layer__description">
                                <?php echo $settings['description_text_a']; ?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <<?php echo $wrapper_tag; ?> <?php echo $this->getRenderAttributeString('wrapper'); ?>>
            <div class="elementor-flip-box__layer__overlay">
                <div class="elementor-flip-box__layer__inner">
                    <?php if (!empty($settings['title_text_b'])) : ?>
                        <h3 class="elementor-flip-box__layer__title">
                            <?php echo $settings['title_text_b']; ?>
                        </h3>
                    <?php endif;?>

                    <?php if (!empty($settings['description_text_b'])) : ?>
                        <div class="elementor-flip-box__layer__description">
                            <?php echo $settings['description_text_b']; ?>
                        </div>
                    <?php endif;?>

                    <?php if (!empty($settings['button_text'])) : ?>
                    <<?php echo $button_tag; ?> <?php echo $this->getRenderAttributeString('button'); ?>>
                    <?php echo $settings['button_text']; ?>
                </<?php echo $button_tag; ?>>
                <?php endif;?>
            </div>
        </div>
        </<?php echo $wrapper_tag; ?>>
        </div>
        <?php
    }

    protected function _contentTemplate()
    {
        ?>
        <#
        var btnClasses = 'elementor-flip-box__button elementor-button elementor-size-' + settings.button_size;

        if ( 'image' === settings.graphic_element && '' !== settings.image.url ) {
            var image = {
                id: settings.image.id,
                url: settings.image.url,
                size: settings.image_size,
                dimension: settings.image_custom_dimension,
                model: view.getEditModel()
            };

            var imageUrl = elementor.imagesManager.getImageUrl( image );
        }

        var wrapperTag = 'div',
            buttonTag = 'a';

        if ( 'box' === settings.link_click ) {
            wrapperTag = 'a';
            buttonTag = 'button';
        }

        if ( 'icon' === settings.graphic_element ) {
            var iconWrapperClasses = 'elementor-icon-wrapper';
            iconWrapperClasses += ' elementor-view-' + settings.icon_view;
            if ( 'default' !== settings.icon_view ) {
                iconWrapperClasses += ' elementor-shape-' + settings.icon_shape;
            }
        }
        #>

        <div class="elementor-flip-box">
            <div class="elementor-flip-box__layer elementor-flip-box__front">
                <div class="elementor-flip-box__layer__overlay">
                    <div class="elementor-flip-box__layer__inner">
                        <# if ( 'image' === settings.graphic_element && '' !== settings.image.url ) { #>
                        <div class="elementor-flip-box__image">
                            <img src="{{ imageUrl }}">
                        </div>
                        <#  } else if ( 'icon' === settings.graphic_element && settings.icon ) { #>
                        <div class="{{ iconWrapperClasses }}" >
                            <div class="elementor-icon">
                                <i class="{{ settings.icon }}"></i>
                            </div>
                        </div>
                        <# } #>

                        <# if ( settings.title_text_a ) { #>
                        <h3 class="elementor-flip-box__layer__title">{{{ settings.title_text_a }}}</h3>
                        <# } #>

                        <# if ( settings.description_text_a ) { #>
                        <div class="elementor-flip-box__layer__description">{{{ settings.description_text_a }}}</div>
                        <# } #>
                    </div>
                </div>
            </div>
            <{{ wrapperTag }} class="elementor-flip-box__layer elementor-flip-box__back">
            <div class="elementor-flip-box__layer__overlay">
                <div class="elementor-flip-box__layer__inner">
                    <# if ( settings.title_text_b ) { #>
                    <h3 class="elementor-flip-box__layer__title">{{{ settings.title_text_b }}}</h3>
                    <# } #>

                    <# if ( settings.description_text_b ) { #>
                    <div class="elementor-flip-box__layer__description">{{{ settings.description_text_b }}}</div>
                    <# } #>

                    <# if ( settings.button_text ) { #>
                    <{{ buttonTag }} href="#" class="{{ btnClasses }}">{{{ settings.button_text }}}</{{ buttonTag }}>
                <# } #>
            </div>
        </div>
        </{{ wrapperTag }}>
        </div>
        <?php
    }
}
