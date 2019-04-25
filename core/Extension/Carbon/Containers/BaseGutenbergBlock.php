<?php


namespace Sau\WP\Theme\Extension\Carbon\Containers;


use Carbon_Fields\Block;
use Carbon_Fields\Container\Container;
use Sau\Lib\Media;
use Sau\WP\Theme\Extension\Carbon\CarbonActions;

abstract class BaseGutenbergBlock
{

    /**
     * @var Container|mixed
     */
    protected $block;

    /**
     * @param $title
     */
    public static function init($title)
    {
        $obj = static::class;
        CarbonActions::carbonFieldsRegisterFields(
            function () use ($title, &$obj) {
                $obj = new $obj($title);
            }
        );
        static::extends();
    }

    /**
     * Container constructor.
     *
     * @param string $title Title
     */
    protected function __construct($title)
    {
        $this->block = Block::make($title);
        $this->block->set_category('tutmee', __('Tutmee'), 'tutmee')
                    ->set_render_callback(
                        function ($fields, $attributes, $inner_blocks) {
                            echo $this->render($fields, $attributes, $inner_blocks);
                        }
                    )
                    ->set_preview_mode($this->getPreviewMod())
                    ->add_fields($this->getFields());
    }

    /**
     * Setup fields
     * @return array
     */
    abstract function getFields(): array;

    /**
     * Render content
     *
     * @param array  $fields       Массив с введенными данными в блоке
     * @param array  $attributes   Массив с атрибутами блока, такими как пользовательский класс CSS, выравнивание и т. д.
     * @param string $inner_blocks Строка с содержимым всех вложенных блоков
     *
     * @return string
     */
    abstract function render(array $fields, array $attributes, string $inner_blocks): string;

    protected static function extends()
    {
    }

    /**
     * @return Container
     */
    public function getBlock(): Container
    {
        return $this->block;
    }

    /**
     * For not render preview in Gutenberg (set preview mod(default true))
     *
     * @return bool
     */
    protected function getPreviewMod(): bool
    {
        return true;
    }
}
