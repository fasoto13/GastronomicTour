<?php
/**
* Plugin Name: WPOrLogin - Customize WordPress login
* Plugin URI: https://oregoom.com/wporlogin/
* Description: Plugin to customize the WordPress login.
* Version: 2.8
* Author: Oregoom
* Author URI:https://oregoom.com/wporlogin/
* License: GPL2
* Text Domain: wporlogin
* Domain Path: /languages/
*/
	


//define("VERSION", 2.5);
define('WPORLOGINBACKGROUNDIMAGE', array(
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-0.jpg', 
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-1.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-2.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-3.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-4.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-5.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-6.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-7.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-8.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-9.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-10.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-11.jpg',
    plugin_dir_url( __FILE__ ).'img/wporlogin-img-fondo-12.jpg'
    ));

require_once plugin_dir_path(__FILE__) .'includes/wporloginpage.php';
require_once plugin_dir_path(__FILE__) .'includes/remove-language-wporlogin.php';


function wporlogin_insert_script_upload(){
    
    wp_enqueue_media();//PARA ABRIR LA BIBLIOTEMA MEDIOS
    
    //REGISTRAR EL SCRIPT JS
    wp_register_script('wporlogin_my_upload', plugin_dir_url( __FILE__ ).'js/img-fondo.js', array('jquery', 'wp-i18n'), '2.1', true );
    wp_enqueue_script('wporlogin_my_upload'); //MOSTRAR EL SCRIPT JS EN ADMIN
    
    wp_set_script_translations('wporlogin_my_upload', 'wporlogin');//Cargar Translation

} 
add_action("admin_enqueue_scripts", "wporlogin_insert_script_upload");





////////////////////////////////////////////////////////////////////////////////
// WP LOGIN: AGREGAR NUEVO LOGO EN LUGAR DE WORDPRESS
////////////////////////////////////////////////////////////////////////////////

function wporlogin_page_login() {

    ////////////////////////////////////////////////////////////////////////////
    //              WP LOGIN: DISEÑO ESTANDAR AND PREMIUM (LOGO and BACKGROUND-IMAGE)
    //              Version: 1.0
    ////////////////////////////////////////////////////////////////////////////
    

    //FUNCION PARA OPTENER IMG DE FONDO
    function wporlogin_url_img_fondo_css(){

        //COMPROBANDO SI LA VARIABLE ES NULO O VACIO
        if( get_option('wporlogin_background_images') ){

            if(get_option('wporlogin_background_images') == 'wporlogin_free_images'){

                ////////////////////////////////////////////////////////////////////////////
                //           WP LOGIN: VARIABLE DE IMAGEN DE FONDO PARA CSS
                ////////////////////////////////////////////////////////////////////////////
                ?> <style>
                    :root{
                        --wporlogin-img-fondo: url(<?php echo esc_html(get_option('wporlogin-background-free-image')); ?>); /*URL DE IMAGEN GRATIS*/
                    }
                </style> <?php

            } elseif ( get_option('wporlogin_background_images') == 'wporlogin_my_images' ){

                if(get_option('wporlogin_url_img_fondo')){ //URL DEL MY IMAGEN

                    ////////////////////////////////////////////////////////////////////////////
                    //           WP LOGIN: VARIABLE DE IMAGEN DE FONDO PARA CSS
                    ////////////////////////////////////////////////////////////////////////////
                    ?> <style>
                    :root{
                        --wporlogin-img-fondo: url(<?php echo esc_html(get_option("wporlogin_url_img_fondo")); ?>);
                    }
                    </style> <?php

                }

            }

        }
    }


    //FUNCION PARA OPTENER URl DE LOGOTIPO
    function wporlogin_url_logo_css(){

        if(get_option("wporlogin_url_logotipo")){

            ?><style>
            :root{
                --wporlogin-logo: url(<?php echo esc_url(get_option('wporlogin_url_logotipo')); ?>);
                --wporlogin-width: 200px;
                --wporlogin-height: 84px;
            }                    
            </style><?php 

        } else {
    
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );    
            /*
                *  CONDICIÓN PARA SABER SI EL TEMA YA LO TIENE
                *  ASIGNADO UN LOGO
                * 
                *  SI ES VERDAD, ENTONCES MUESTRA EL LOGO ASIGNADO
                *  SI ES FALSO, MUESTRA EL LOGO DE WORDPRESS
                */
            if( has_custom_logo() ){
                ?><style>
                :root{
                    --wporlogin-logo: url(<?php echo esc_url( $image[0] ); ?>);
                    --wporlogin-width: 200px;
                    --wporlogin-height: auto;
                }                    
                </style><?php
            } else {
                ?><style>
                :root{
                    --wporlogin-logo: url(<?php echo home_url( '/wp-admin/images/wordpress-logo.svg?ver=20131107' ); ?>);
                    --wporlogin-width: 84px;
                    --wporlogin-height: 84px;
                }                    
                </style><?php
            }
        }

    }



    //remove language
    function remove_language_wporlogin_css(){

        if( get_option("remove_language_wporlogin") == 1 ){ //CUANDO MENÚ LANGUAJE ELIMINADO

            //function yes_recaptcha_active_login_and_register_wporlogin_style() -> includes/remove-language-wporlogin.php
            yes_recaptcha_active_login_and_register_wporlogin_style();
            yes_remove_language_wporlogin_style_lostpassword();

        } else { //CUANDO MENÚ LANGUAJE "NO" ELIMINADO

            //function not_remove_language_wporlogin_style() -> includes/remove-language-wporlogin.php
            not_remove_language_wporlogin_style_login();
            not_remove_language_wporlogin_style_register();
            not_remove_language_wporlogin_style_lostpassword();

        }

    }

    
    ////////////////////////////////////////////////////////////////////////////
    // WP LOGIN: CONDICIÓN PARA APLICAR CSS A PAGE LOGIN
    ////////////////////////////////////////////////////////////////////////////

    if (get_option('wporlogin_design') == 'wporlogin_design_basic'){

        //function remove_language_wporlogin_css()
        remove_language_wporlogin_css();

        wp_enqueue_style( 'wporlogin-style-design-basic', plugin_dir_url( __FILE__ ). 'css/wporlogin-style-design-basic.css', array(), '1.3', false );

    } elseif (get_option('wporlogin_design') == 'wporlogin_design_standard'){

        //function wporlogin_url_img_fondo_css()
        wporlogin_url_img_fondo_css();
        //function wporlogin_url_logo_css()
        wporlogin_url_logo_css();
        //function remove_language_wporlogin_css()
        remove_language_wporlogin_css();

        wp_enqueue_style( 'wporlogin-style-design-standard', plugin_dir_url( __FILE__ ). 'css/wporlogin-style-design-standard.css', array(), '1.3', false );
        
    } elseif (get_option('wporlogin_design') == 'wporlogin_design_premium'){

        if(get_option('wporlogin-design-img-premium')) {

            if(get_option('wporlogin-design-img-premium') == 'wporlogin_design_img_premium_one'){

                //function wporlogin_url_img_fondo_css()
                wporlogin_url_img_fondo_css();
                //function wporlogin_url_logo_css()
                wporlogin_url_logo_css();
                //function remove_language_wporlogin_css()
                remove_language_wporlogin_css();

                wp_enqueue_style( 'wporlogin-style-design-premium-one', plugin_dir_url( __FILE__ ). 'css/wporlogin-style-design-premium-one.css', array(), '1.3', false );

            } elseif (get_option('wporlogin-design-img-premium') == 'wporlogin_design_img_premium_two'){

                //function wporlogin_url_img_fondo_css()
                wporlogin_url_img_fondo_css();
                //function wporlogin_url_logo_css()
                wporlogin_url_logo_css();
                //function remove_language_wporlogin_css()
                remove_language_wporlogin_css();

                wp_enqueue_style( 'wporlogin-style-design-premium-two', plugin_dir_url( __FILE__ ). 'css/wporlogin-style-design-premium-two.css', array(), '1.3', false );

            } elseif (get_option('wporlogin-design-img-premium') == 'wporlogin_design_img_premium_three'){

                //function wporlogin_url_img_fondo_css()
                wporlogin_url_img_fondo_css();
                //function wporlogin_url_logo_css()
                wporlogin_url_logo_css();
                //function remove_language_wporlogin_css()
                remove_language_wporlogin_css();

                wp_enqueue_style( 'wporlogin-style-design-premium-three', plugin_dir_url( __FILE__ ). 'css/wporlogin-style-design-premium-three.css', array(), '1.3', false );

            }

        }
        
    }  
    

    //Cuando esta activo Google reCAPTCHA
    if(get_option( 'recaptcha_v2_wporlogin' ) == 1){
        
        //script de ReCaptcha de Google
        //version 2.5
        wp_register_script('recaptcha_login', 'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
        wp_enqueue_script('recaptcha_login');

    }



    
}
add_action('login_enqueue_scripts', 'wporlogin_page_login');




// define the login_footer callback 
function wporlogin_add_menu_login_footer() { 

///////////////////////////////////////////////////////////////////////////////////////
//         WP LOGIN: Si el Diseño es Premium 
///////////////////////////////////////////////////////////////////////////////////////
    if(get_option('wporlogin_design') == 'wporlogin_design_premium'){ ?>

        <div class="login_oregoom">

            Desarrollado por <a href="https://oregoom.com/wporlogin/" target="_black" class="text-info">Oregoom.com</a>

        </div> <?php 
    
    }

}
add_action( 'login_footer', 'wporlogin_add_menu_login_footer', 10, 2 ); 





///////////////////////////////////////////////////////////////////////////////////////
//         WP LOGIN: CAMBIAR LA URL POR DEFECTO DEL LOGO - versión 1.0
///////////////////////////////////////////////////////////////////////////////////////

function wporlogin_mostrar_ruta_url_logotipo( $url ) {

    if(get_option("wporlogin_ruta_url_logotipo") ){

        return esc_url(get_option('wporlogin_ruta_url_logotipo'));

    } else {

        if(get_option('wporlogin_design') == 'wporlogin_design_basic'){

            //return home_url();
            return get_bloginfo( 'url' );

        } else {

            return $url;

        }

    }

}
add_filter('login_headerurl', 'wporlogin_mostrar_ruta_url_logotipo', 10, 1); 






function wporlogin_mostrar_logotipo_title() {
    
    ////////////////////////////////////////////////////////////////////////////
    // WP LOGIN: CONDICIÓN PARA APLICAR CSS A PAGE LOGIN
    ////////////////////////////////////////////////////////////////////////////
    
    $wporlogin_design = get_option('wporlogin_design', false);
    
    if( ($wporlogin_design != false) && ($wporlogin_design == 'wporlogin_design_standard') ){ //Cuando existe diseño seleccionado    
        
        if(get_option("wporlogin_titulo_logotipo")){
            
            return esc_html(get_option('wporlogin_titulo_logotipo'));
            
        }
        
    } else { //cuando el diseño es Default
    
        if(isset($_GET['action'])){
            
            $wporlogin_action = $_GET['action'];
            
            if($wporlogin_action == 'register'){
                
                return __('Sign Up', 'wporlogin');
                
            } else {
                
                if($wporlogin_action == 'lostpassword'){
                    
                    return __('Reset Password', 'wporlogin');  
                    
                } else {
                    
                    return __('Log In', 'wporlogin');
                    
                }
                
            }
        } else {
            
            return __('Log In', 'wporlogin');
            
        }
    } 
    
}
add_filter('login_headertext', 'wporlogin_mostrar_logotipo_title');




/**
 * Cargar traducciones de texto
 *
 * @since	1.0.0
 *
 */
function wporlogin_textdomain() {
    load_plugin_textdomain( 'wporlogin', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
//Cargar traducciones de texto
add_action( 'plugins_loaded', 'wporlogin_textdomain' );






//Formulario reCaptcha de Google
//FORMULARIO DE LOGIN

//version 2.5
//fuente 1: https://stackoverflow.com/questions/54032404/how-to-integrate-recaptcha-into-default-login-form-comment-in-wordpress
//fuente 2: https://stackoverflow.com/questions/54382995/wordpress-filter-wp-authenticate-user-not-getting-user-data
add_action('login_form','add_captcha_to_login'); // Login Form Hook
function add_captcha_to_login(){

    if(get_option( 'recaptcha_v2_wporlogin' ) == 1){ 
        
        if( get_option('recaptcha_v2_site_key_wporlogin') && get_option('recaptcha_v2_secret_key_wporlogin') ){

            if(get_option('activa_acceso_recaptcha_v2_wporlogin') == 1){
            
                $sitekey = get_option('recaptcha_v2_site_key_wporlogin'); ?>

                <script type="text/javascript">
                    var onloadCallback = function() {
                        grecaptcha.render('html_element', {
                            'sitekey' : '<?php echo $sitekey; ?>'
                        });
                    };
                </script><?php
            
            
                //Captcha Display Code ?>    
                <div id="html_element" style="margin-bottom: 10px;"></div><?php

            }

        }

    }

}



//Comprobando reCaptcha de Google
//FORMULARIO DE LOGIN


//version 2.5
add_filter('wp_authenticate_user', 'captcha_login_check', 10, 2); // Check Login Hook
function captcha_login_check($user, $password){

    if(get_option( 'recaptcha_v2_wporlogin' ) == 1){

        if( get_option('recaptcha_v2_site_key_wporlogin') && get_option('recaptcha_v2_secret_key_wporlogin') ){ 

            if( get_option('activa_acceso_recaptcha_v2_wporlogin') == 1 ){

                //Captcha Check Code
                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
                    // Google reCAPTCHA API secret key 
                    $secretKey = get_option('recaptcha_v2_secret_key_wporlogin'); 
                    
                    // Verify the reCAPTCHA response 
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
                    
                    // Decode json data 
                    $responseData = json_decode($verifyResponse); 
                    
                    // If reCAPTCHA response is valid 
                    if($responseData->success){ 
                        // Posted form data 
                        return $user;

                    }else{ 

                        return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: La verificación del robot falló, inténtelo de nuevo."));

                    } 
                    
                }else{

                    return new WP_Error("Captcha Invalid", __("<strong>ERROR</strong>: Por favor Marque la casilla reCAPTCHA.")); 

                }

            } else {

                return $user;

            }

        } else {

            return $user;
            
        }

    } else { 

        return $user;

    }    
    

}




//Formulario de Registro WP
//
//Formulario reCaptcha de Google
//version 2.5
//fuente 1: https://stackoverflow.com/questions/54032404/how-to-integrate-recaptcha-into-default-login-form-comment-in-wordpress
//fuente 2: https://stackoverflow.com/questions/54382995/wordpress-filter-wp-authenticate-user-not-getting-user-data
add_action('register_form','add_captcha_to_register'); // Register Form Hook
function add_captcha_to_register(){

    if(get_option( 'recaptcha_v2_wporlogin' ) == 1){ 
        
        if( get_option('recaptcha_v2_site_key_wporlogin') && get_option('recaptcha_v2_secret_key_wporlogin') ){
            
            if(get_option('activa_registro_recaptcha_v2_wporlogin') == 1){

                $sitekey = get_option('recaptcha_v2_site_key_wporlogin'); ?>

                <script type="text/javascript">
                    var onloadCallback = function() {
                        grecaptcha.render('html_element', {
                            'sitekey' : '<?php echo $sitekey; ?>'
                        });
                    };
                </script><?php        
            
                //Captcha Display Code ?>    
                <div id="html_element" style="margin-bottom: 10px;"></div><?php

            }

        }

    }

}




//Comprobando reCaptcha de Google
//FORMULARIO DE REGISTRO

//version 2.5
add_filter('registration_errors', 'recaptcha_user_register_check', 10, 3); // Check register user Hook
function recaptcha_user_register_check($errors, $sanitized_user_login, $user_email){

    if(get_option( 'recaptcha_v2_wporlogin' ) == 1){

        if( get_option('recaptcha_v2_site_key_wporlogin') && get_option('recaptcha_v2_secret_key_wporlogin') ){ 

            if(get_option('activa_registro_recaptcha_v2_wporlogin') == 1){

                //Captcha Check Code
                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
                    // Google reCAPTCHA API secret key 
                    $secretKey = get_option('recaptcha_v2_secret_key_wporlogin'); 
                    
                    // Verify the reCAPTCHA response 
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
                    
                    // Decode json data 
                    $responseData = json_decode($verifyResponse); 
                    
                    // If reCAPTCHA response is valid 
                    if($responseData->success){ 
                        // Posted form data 
                        return $errors;

                    }else{ 

                        $errors->add( 'captcha_error', __( '<strong>Error</strong>: La verificación del robot falló, inténtelo de nuevo.', 'my_textdomain' ) );
                        return $errors;

                    } 
                    
                }else{

                    $errors->add( 'captcha_error', __( '<strong>Error</strong>: Por favor Marque la casilla reCAPTCHA.', 'my_textdomain' ) );
                    return $errors;

                }
                
            } else {

                return $errors;

            }

        } else {

            return $errors;
            
        }

    } else { 

        return $errors;

    }    

}