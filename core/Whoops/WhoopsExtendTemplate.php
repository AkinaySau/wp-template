<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 01.03.2018
 * Time: 11:17
 */

namespace Sau\WP\Theme\Whoops;


use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\STheme;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Whoops extend for Template
 * @package Sau\WP\Theme\Whoops
 * @since   2.0
 */
class WhoopsExtendTemplate extends ExtendTemplate {
    /**
     * SauWhoops constructor.
     */
    public function __construct() {
        if (STheme::getConfigs('debug')) {
            $whoops = new Run;
            $whoops->pushHandler(new PrettyPageHandler);
            $whoops->register();
        }
    }
}