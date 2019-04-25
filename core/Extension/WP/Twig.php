<?php
/**
 * Created for cartest.
 * User: AkinaySau akinaysau@gmail.ru
 * Date: 26.09.2017
 * Time: 13:45
 */

namespace Sau\WP\Theme\Extension\WP;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class Twig extends AbstractExtension
{

    public function getName()
    {
        return 'SauTwigWpExtension';
    }

    public function getFilters()
    {
        return [
            //base
            new TwigFilter('wp_do_shortcode', 'do_shortcode'),
            //custom
            new TwigFilter('wp_the_content', [$this, 'filterTheContent'], ['is_safe' => ['html']]),
        ];
    }

    public function filterTheContent($content)
    {
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);

        return $content;
    }

    /**
     * TODO: Check name functions
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            /**
             * wp_
             */ new TwigFunction('wp_get_post_tags', 'wp_get_post_tags'),
            new TwigFunction('home_url', 'home_url'),

            /**
             * Posts
             */ new TwigFunction('have_posts', 'have_posts'),
            new TwigFunction('the_post', 'the_post'),
            new TwigFunction('get_posts', 'get_posts'),
            new TwigFunction('the_excerpt', 'the_excerpt'),
            new TwigFunction('the_introtext', 'the_excerpt'),
            new TwigFunction('the_content', 'the_content'),
            new TwigFunction('get_post_thumbnail_url', 'get_the_post_thumbnail_url'),
            new TwigFunction('get_post_permalink', 'get_post_permalink'),

            /**
             * Theme
             */ new TwigFunction('theme_uri', 'get_stylesheet_directory_uri'),
            new TwigFunction('do_shortcode', 'do_shortcode'),

            /**
             * Users
             */ new TwigFunction('is_user_logged_in', 'is_user_logged_in'),

            /**
             * Footer
             */ new TwigFunction('wp_footer', 'wp_footer'),
            new TwigFunction('get_footer', 'get_footer'),

            /**
             * Header
             */ new TwigFunction('wp_head', 'wp_head'),
            new TwigFunction('get_header', 'get_header'),

            /**
             * Attachment
             */ new TwigFunction('wp_attach_img_src', 'wp_get_attachment_image_url'),

            /**
             * Trash
             */

            new TwigFunction('ln_attributes', 'language_attributes'),

            /**
             * Nonce
             */ new TwigFunction('wp_nonce_field', 'wp_nonce_field'),

            new TwigFunction(
                'wp_test', function ($i) {
                echo (string)$i;
            }
            ),
        ];
    }
}
