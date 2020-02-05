<?php 
/*------------------------------------*\
    CONFIGURACIÓN DE NUESTRO BACKEND
\*------------------------------------*/


/*------------------------------------*\
    AGREGANDO FAVICON AL ADMINISTRADOR
\*------------------------------------*/
 function admin_head_example() {
    echo '<link rel="icon" type="image/png" href="' . get_bloginfo('template_directory') . '/library/img/admin-favicon.png" />';
}

add_action( 'admin_head', 'admin_head_example' );


/*------------------------------------*\
    ACTIVAR BOTONES EN EDITOR DE TEXTO
\*------------------------------------*/
function todos_los_botones($buttons) {

$buttons[] = 'fontselect'; //Selector de tipo de fuente
$buttons[] = 'fontsizeselect'; //Selector de tamaño de fuente
$buttons[] = 'styleselect'; //Selector de estilos de párrafo mucho más amplio
$buttons[] = 'backcolor'; //Color de fondo de párrafo
$buttons[] = 'newdocument'; //Nuevo documento inline
$buttons[] = 'cut'; //Cortar texto
$buttons[] = 'copy'; //Copiar texto
$buttons[] = 'charmap'; //Mapa de caracteres
$buttons[] = 'hr'; //Línea horizontal
$buttons[] = 'visualaid'; //Ayudas visuales del editor

return $buttons;
}
add_filter("mce_buttons_3", "todos_los_botones");


/*------------------------------------*\
    AUTENTICACIÓN CON EMAIL
\*------------------------------------*/
function bainternet_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}

add_filter('authenticate', 'bainternet_allow_email_login', 20, 3);
 

function addEmailToLogin( $translated_text, $text, $domain ) {
    if ( "Nombre de usuario" == $translated_text )
        $translated_text .= __( ' O Email');
    return $translated_text;
}

add_filter( 'gettext', 'addEmailToLogin', 20, 3 );


/*------------------------------------*\
    LOGO FORMULARIO AUTENTICACIÓN
\*------------------------------------*/
// Gargar css del formulario de autenticacion
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false);
}

// Cargar url link del logo
function bones_login_url() {  return home_url('/'); }

// Cargar el texto Alt del logo
function bones_login_title() { return get_option( 'blogname' ); }

add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );



/*------------------------------------*\
    ACTUALIZACIONES AUTO DE PLUGINS
\*------------------------------------*/
add_filter( 'auto_update_plugin', '__return_true' );


/*------------------------------------*\
    REMOVER LA VERSION DE WORDPRESS
\*------------------------------------*/
remove_action('wp_head', 'wp_generator');


/*------------------------------------*\
    DESACTIVAR MENSAJE DE ACTUALIZACION WP
\*------------------------------------*/
add_filter( 'auto_core_update_send_email', '__return_false' );