# Базовый каркас темы WP

## Установка
```
composer create-project sau/wp_template {PROJECT_NAME}
```
где *{PROJECT_NAME}* название проэкта

## Используемые пакеты
- **twig/twig** - шблонизатор
- **htmlburger/carbon-fields** - кастомные поля
- **tgmpa/tgm** -plugin-activation - для подключения в тему обязательных плагинов
- **sau/library** - вспомогательный пакет. Пакет по большей части является обёрткой стандартных методов WP для более простого их применения 

## Структура
- **core** - Ядро
- **css** - Файлы стили
- **images** - Изображения
- **js** - Скрипты
- **l10n** - Файлы переводов
- **src** -  Основная логика
- **scss** - scss файлы 
- **views** - Шаблоны (Пространство имён **@template**)

## Carbon Custom Fields
При внедрении планина были дописаны для него обёртки и в результате подключение новых полей свелось к вызову статического метода
```php
Carbon::registerFields($path);
```
где $path путь к файлу с описанием полей относительно 

## Twig
В теме испорльзуется шаблонизатор [twig](https://twig.symfony.com/). 

### Использование
Тема модифицирована для удобства расширения возможностей шаблонизтора.

### Расширение
#### Пути к шаблонам
Для добавления нового пространства имён шаблонов используйте ```SauTwigPath::_path( $namespace, $path);``` 

#### Переменные
Для модификации переменных шаблона или добавления новый используется фильтр ```twig_template_vars```, но для удобства рекомендуется использовать статический метод ```TwigFilter::twigTemplateVars()```:
```php
use Sau\WP\Theme\Extension\Twig\TwigFilter;

// $vars содержит все переменные передаваемые в шаблон
TwigFilter::twigTemplateVars(function($vars){
    $vars['ПЕРЕМЕННАЯ'] =  {ЗНАЧЕНИЕ}
    
    return vars;
});
```
#### Расширения
Для расширения возможностей шаблонизатора используется статичный метод ```SauTwigExtension::_e( {РАСШИРЕНИЕ} );```, где {РАСШИРЕНИЕ} объект унаследованыый от ```Twig_Extension``` 

#### Функции и фильтры
Для функций:
```php
    SauTwigExtension::_s( {ПСЕВДОНИМ}, {CALLBACK} ); //Callback смотреть Twig_SimpleFunction
```
Для фильтров:
```php
    SauTwigExtension::_f( {ПСЕВДОНИМ}, {CALLBACK} ); //Callback смотреть Twig_Filter
```
#### Реалиованные расширения (```реальная_функция() => функция_twig()```):

##### WP
Реальные функции являются базовыми для wp их работу можно узнать из документации WP
```
wp_get_post_tags() => wp_get_post_tags()
have_posts() => have_posts()
the_post() => the_post()
get_posts() => get_posts()
the_excerpt() => the_excerpt()
the_excerpt() => the_introtext()
the_content() => the_content()
get_the_post_thumbnail_url() => get_post_thumbnail_url()
get_post_permalink() => get_post_permalink()
get_stylesheet_directory_uri() => theme_uri()
do_shortcode() => do_shortcode()
is_user_logged_in() => is_user_logged_in()
wp_footer() => wp_footer()
get_footer() => get_footer()
wp_head() => wp_head()
get_header() => get_header()
wp_get_attachment_image_url() => wp_attach_img_src()
language_attributes() => ln_attributes()
wp_nonce_field() => wp_nonce_field()
```
##### Template
Эти функции были добавлены для отладки. Обе выводят переменную в теге \<pre>
```
pre() - использует для вывода print_r()
dump() - использует для вывода var_dimp()
```
##### Carbon Custom Fields
Функции обёртки для ccf. Документация по плагину [тут](https://carbonfields.net/docs/)
```
carbon_get_term_meta() => crb_term()
carbon_get_post_meta() => crb_post()
carbon_get_comment_meta() => crb_com()
carbon_get_nav_menu_item_meta() => crb_nav()
carbon_get_user_meta() => crb_user()
carbon_get_the_post_meta() => crb_the_post()
carbon_get_theme_option() => crb_theme()
```

## Ссылки
- https://carbonfields.net/docs
- https://twig.symfony.com/doc/2.x/
