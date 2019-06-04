<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 07.03.18
 * Time: 11:16
 */

namespace Sau\WP\Theme\Source;


use Sau\Lib\HF;
use Sau\Lib\Theme;
use Sau\WP\Theme\Extension\Twig\SauTwigExtension;
use Sau\WP\Theme\Extension\Twig\TwigFilter;
use Sau\WP\Theme\InitTemplateClass;
use Sau\WP\Theme\Source\Carbon\GutenbergBlock;
use Sau\WP\Theme\Source\Extension\Ru\Ru;

class ST extends InitTemplateClass
{
    protected function customCode()
    {
        new  Ru();
        Theme::addSupportTitleTag();
        Theme::loadThemeTextdomain(THEME_LANG, get_stylesheet_directory().DS.'l10n');

        HF::addStyle('sau-style', get_stylesheet_directory_uri().'/css/style.css');
        HF::addScript('sau-script', get_stylesheet_directory_uri().'/js/bundle.js', [], false, true);

        //add twig extension
        $this->twig();

        add_filter(
            'allowed_block_types',
            function ($allowed_blocks) {
                return array(
                    'carbon-fields/banner',
                );
            }
        );

    }

    protected function carbon()
    {
        GutenbergBlock::init('Gutenberg block');
    }

    private function twig()
    {
        //SauTwigExtension::_e($twig_extension);
        //SauTwigExtension::_s($name, $callback);
        //SauTwigExtension::_f($name, $callback)
    }
}
