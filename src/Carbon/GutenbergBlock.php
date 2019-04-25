<?php


namespace Sau\WP\Theme\Source\Carbon;


use Carbon_Fields\Block;
use Carbon_Fields\Field\Field;
use Sau\Lib\Media;
use Sau\WP\Theme\Extension\Carbon\Containers\BaseGutenbergBlock;

class GutenbergBlock extends BaseGutenbergBlock {

	function getFields(): array {
		return [
		    //Write your fields
			//Field::make( 'text', 'title', 'Title' )
		];
	}

	/**
	 * Render content
	 *
	 * @param array  $fields       Массив с введенными данными в блоке
	 * @param array  $attributes   Массив с атрибутами блока, такими как пользовательский класс CSS, выравнивание и т. д.
	 * @param string $inner_blocks Строка с содержимым всех вложенных блоков
	 *
	 * @return string
	 */
	function render( array $fields, array $attributes, string $inner_blocks ): string {
	    //
        //return SauTwig::render( '@template/block/banner.html.twig', $fields );
	}

	private function getPageList() {
		$posts = get_posts( [
			'numberpost'  => - 1,
			'post_type'   => 'page',
			'post_status' => 'publish',
		] );
		$tmp   = [];
		foreach ( $posts as $post ) {
			if ( $post instanceof \WP_Post ) {
				$tmp[ $post->ID ] = $post->post_title;
			}
		}

		return $tmp;
	}

    /**
     * For not render preview in Gutenberg (set preview mod(default true))
     *
     * @return bool
     */
	protected static function extends()
    {
        // modify block
        // $this->block->set_category( ... );
        // or custom code
        // Media::addThumbnailSize( ... );
    }

    /**
     * For not render preview in Gutenberg
     *
     * @return bool
     */
    protected function getPreviewMod(): bool {
        return false;
    }
}
