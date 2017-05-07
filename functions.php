<?php
// Functions 11/07/2016
// Recomendamos no modificar este archivo.
// Tambien recomendamos no modificar style.css
// Riesgo de perder enlace con nuestro repositorio.
$dt_info = wp_get_theme();
define('DT_VERSION', '1.0.3'); // 11/07/2016
define('DT_THEME_NAME', 'DooPlay');
define('DT_THEME_SLUG', 'dooplay');
define('DT_KEY', DT_THEME_SLUG . '_license_key_status');
define('DT_KEY_S', DT_THEME_SLUG . '_license_key');
define('DT_TIME','M. d, Y');
define('DT_MAIN_RATING','_starstruck_avg');
define('DT_MAIN_VOTOS', '_starstruck_total');
define('GRC_PUBLIC', get_option('dt_grpublic_key'));
define('GRC_SECRET', get_option('dt_grprivate_key'));
// Idioma
load_theme_textdomain( 'mtms', get_template_directory() . '/lang/' );
require_once 'inc/init.php';
require_once 'inc/assets.php';
// Definir soporte de Imagenes destacadas.
add_theme_support('post-thumbnails');
// Registrar Admin
include_once 'inc/framework/options-init.php';
// Repositorio
function dt_theme_updater() {
    require( get_template_directory() . '/inc/includes/network/ssl.php');
}
add_action('after_setup_theme', 'dt_theme_updater');
// Registrar tipo de elementos
require_once('inc/repeat-player.php');
require_once('inc/includes/peliculas/tipo.php');
require_once('inc/includes/rating/init.php');
require_once('inc/includes/series/tipo.php');
require_once('inc/includes/series/temporadas/tipo.php');
require_once('inc/includes/series/episodios/tipo.php');
require_once('inc/includes/links/tipo.php');
require_once('inc/includes/controladores/taxonomias.php');
require_once('inc/widgets/widgets.php');
require_once('inc/comments.php');
require_once('inc/my-list.php');