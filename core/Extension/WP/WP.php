<?php
/**
 * Created by PhpStorm.
 * User: AkinaySau
 * Date: 02.03.2018
 * Time: 17:35
 */

namespace Sau\WP\Theme\Extension\WP;

use Sau\WP\Theme\ExtendTemplate;
use Sau\WP\Theme\Extension\Twig\SauTwigExtension;

class WP extends ExtendTemplate {
	public function __construct() {

		SauTwigExtension::_e( new Twig() );
	}
}