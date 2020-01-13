<?php

/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
class SampleBlocks {

    public function initData($base_url) {
        $content_block1 = '
            <div id="promotion-section" class="promotion-section">
    <div class="promotion-block">
        <div class="promotion-wrapper">
            <div class="container">
                <div class="row">
                    <div class="promotion-inner"><a href="#"><img src="img/cms/bizkick-male-watch1.png" alt="watch1"></a></div>
                    <div class="promotion-inner"><a href="#"><img src="img/cms/bizkick-male-watch2.png" alt="watch2"></a></div>
                    <div class="promotion-inner"><a href="#"><img src="img/cms/bizkick-male-watch3.png" alt="watch3"></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
';
        $content_block2 = '
            <div id="parallax-section" class="parallax-section">
    <div class="latest-offer-section">
        <div class="offer-inner">
            <p>ONLY THIS MONTH</p>
            <h1>SAVE 60% OFF SALE</h1>
            <a href="#">Shop Now</a></div>
    </div>
</div>
';
        $content_block3 = '
            <div id="service-section" class="service-section">
<div class="home-advantage-block">
    <div class="container">
        <div class="hab-row">
            <div class="hab-inner">
                <div class="home-advantage-block-inner">
                    <span> 
                        <em class="fa fa-usd"></em> 
                    </span>
                    <p>30-Day Money Back</p>
                </div>
            </div>
            <div class="hab-inner">
                <div class="home-advantage-block-inner">
                    <span> 
                        <em class="fa fa-headphones"></em> 
                    </span>
                    <p>1 year Free Support</p>
                </div>
            </div>
            <div class="hab-inner">
                <div class="home-advantage-block-inner">
                    <span> 
                        <em class="fa fa-undo"></em> 
                    </span>
                    <p>Free Lifetime Update</p>
                </div>
            </div>
            <div class="hab-inner">
                <div class="home-advantage-block-inner">
                    <span> 
                        <em class="fa fa-thumbs-up"></em> 
                    </span>
                    <p>100% Satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
';
        $content_block4 = '
            <div id="testimonial-section" class="testimonial-section">
    <div class="testimonial-block">
        <div class="container">
            <div class="section-title">
                <strong>What Our Customer Says</strong>
            </div>
            <div class="row">
                <div class="testimonial-inner owl-carousel owl-theme testimonial-slider">
                    <div class="testimonial-content">
                        <div class="testimonial-desc">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="testimonial-detail"><img src="img/cms/testimonial-1.png" alt="testimonial1" />
                            <div class="profile">
                                <h4>Joh Doe</h4>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-desc">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which do not look even slightly believable.</p>
                        </div>
                        <div class="testimonial-detail"><img src="img/cms/testimonial-2.png" alt="testimonial1" />
                            <div class="profile">
                                <h4>Joh Doe</h4>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
';
        $content_block5 = '
            <div id="blog-section" class="blog-section">
    <div class="blogpost-block">
        <div class="container">
            <div class="blog-section-title"><strong>Latest Posts</strong></div>
            <div class="row">
                <div class="blog-block owl-carousel owl-theme blog-slider">
                    <div class="blog-inner">
                        <div class="blog-inner-block">
                            <div class="blog-image"><img src="img/cms/bizkick-blog-1.png" alt="blog1" /></div>
                            <div class="blog-content">
                                <h3><a href="#">Lorem ipsum is dolor sit amet.</a></h3>
                                <p>Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet.</p>
                                <span> 25 Jul 2016 </span>
                            </div>
                        </div>
                    </div>
                    <div class="blog-inner">
                        <div class="blog-inner-block">
                            <div class="blog-image"><img src="img/cms/bizkick-blog-2.png" alt="blog2" /></div>
                            <div class="blog-content">
                                <h3><a href="#">Lorem ipsum is dolor sit amet.</a></h3>
                                <p>Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet.</p>
                                <span> 25 Jul 2016 </span>
                            </div>
                        </div>
                    </div>
                    <div class="blog-inner">
                        <div class="blog-inner-block">
                            <div class="blog-image"><img src="img/cms/bizkick-blog-1.png" alt="blog1" /></div>
                            <div class="blog-content">
                                <h3><a href="#">Lorem ipsum is dolor sit amet.</a></h3>
                                <p>Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet. Lorem ipsum is dolor sit amet.</p>
                                <span> 25 Jul 2016 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
        $content_block6 = '
            <div id="contactinfo-section" class="contactinfo-section">
    <div class="footer-links-column">
        <div class="footer-colum-title footer-block-title">
            <h3>
                Quick Contact
            </h3>
        </div>
        <div class="footer-column-content footer-block-toggle-content">
            <div class="content">
                <p class="address">
                    <strong>
                        <em class="fa fa-home"></em>&nbsp;&nbsp;<span>Address: </span>
                    </strong> 
                    <span>265, Surat, Gujarat, India</span>
                </p>
                <p class="email">
                    <strong>
                        <em class="fa fa-send"></em>&nbsp;&nbsp;<span>Mail us: </span>
                    </strong>
                    <span>
                        <a href="mailto:info@hiddentechies.com" title="info@hiddentechies.com">info@hiddentechies.com</a>
                    </span>
                </p>
                <p class="phone">
                    <strong>
                        <em class="fa fa-phone"></em>&nbsp;&nbsp;<span>Phone: </span>
                    </strong>
                    <span>(123)-456-7890</span>
                </p>
            </div>
        </div>
    </div>
</div>
';

        $displayHome = Hook::getIdByName('displayHome');
        $displayFooter = Hook::getIdByName('displayFooter');
        $displayHomeTop1 = Hook::getIdByName('displayHomeTop1');
        $displayHomeTop2 = Hook::getIdByName('displayHomeTop2');
        $displayHomeTop3 = Hook::getIdByName('displayHomeTop3');
        $displayHomeBottom1 = Hook::getIdByName('displayHomeBottom1');
        $displayHomeBottom2 = Hook::getIdByName('displayHomeBottom2');
        $displayHomeBottom3 = Hook::getIdByName('displayHomeBottom3');
        $id_shop = Configuration::get('PS_SHOP_DEFAULT');

        /* install static Block */
        $result = true;
        $result &= Db::getInstance()->Execute('INSERT INTO `' . _DB_PREFIX_ . 'ht_staticblocks` (`id_ht_staticblocks`, `hook`, `active`) 
			VALUES
			(1, "displayHomeTop2", 1),
                        (2, "displayHomeBottom1", 1),
                        (3, "displayHomeBottom3", 1),
                        (4, "displayHomeBottom3", 1),
                        (5, "displayHomeBottom3", 1),
                        (6, "displayFooter", 1)
			;');

        $result &= Db::getInstance()->Execute('INSERT INTO `' . _DB_PREFIX_ . 'ht_staticblocks_shop` (`id_ht_staticblocks`, `id_shop`,`active`) 
			VALUES 
			(1,' . $id_shop . ', 1),
			(2,' . $id_shop . ', 1),
			(3,' . $id_shop . ', 1),
			(4,' . $id_shop . ', 1),
			(5,' . $id_shop . ', 1),
			(6,' . $id_shop . ', 1)
			;');

        foreach (Language::getLanguages(false) as $lang) {
            $result &= Db::getInstance()->Execute('INSERT INTO `' . _DB_PREFIX_ . 'ht_staticblocks_lang` (`id_ht_staticblocks`, `id_shop`, `id_lang`, `title`, `content`) 
			VALUES 
			("1", "' . $id_shop . '","' . $lang['id_lang'] . '","Home Promotion", \'' . $content_block1 . '\'),
			("2", "' . $id_shop . '","' . $lang['id_lang'] . '","Home Parallax Block", \'' . $content_block2 . '\'),
			("3", "' . $id_shop . '","' . $lang['id_lang'] . '","Home Services Block", \'' . $content_block3 . '\'),
			("4", "' . $id_shop . '","' . $lang['id_lang'] . '","Home Testimonials Block", \'' . $content_block4 . '\'),
			("5", "' . $id_shop . '","' . $lang['id_lang'] . '","Home Blogs", \'' . $content_block5 . '\'),
			("6", "' . $id_shop . '","' . $lang['id_lang'] . '","Footer Contact Block", \'' . $content_block6 . '\')
			
                ;');
        }
        return $result;
    }

}
