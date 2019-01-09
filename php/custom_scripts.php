<?php  
// REGISTRANDO LIBERIAS DE JAVASCRIPT
function my_scripts_method() {
   // Jquery
   wp_register_script('Jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array('jquery') );
   // enqueue the script
   wp_enqueue_script('Jquery');
   // Jquery UI
   wp_register_script('JqueryUI', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array('jquery') );
   // enqueue the script
   wp_enqueue_script('JqueryUI');

   // TweenMax
   wp_register_script('TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js', array('jquery') );
   // enqueue the script
   wp_enqueue_script('TweenMax');
   // TimeLineMax
   wp_register_script('TimeLineMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TimelineMax.min.js', array('jquery'));
   // enqueue the script
   wp_enqueue_script('TimeLineMax');
   // ScrollMagic
   wp_register_script('ScrollMagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js', array('jquery'));
   // enqueue the script
   wp_enqueue_script('ScrollMagic');
   wp_register_script('AddIndicators', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/ScrollToPlugin.min.js', array('jquery'));
   // enqueue the script
   wp_enqueue_script('AddIndicators');   
   // Gsap Animation
   wp_register_script('Gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js', array('jquery'));
   // enqueue the script
   wp_enqueue_script('Gsap');
   // Form Validator
   wp_register_script('FormValid', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js', array('jquery'));
   // enqueue the script
   wp_enqueue_script('FormValid');
   // Animsition
   wp_register_script('Animsition', get_template_directory_uri() . '/js/animsition.js' , array('jquery'));
   // enqueue the script
   wp_enqueue_script('Animsition');
   // Carousel
   wp_register_script('Owl', get_template_directory_uri() . '/js/jsSlider/owl.carousel.js' , array('jquery'));
   // enqueue the script
   wp_enqueue_script('Owl');
   // MouseMove
   wp_register_script('MouseMove', get_template_directory_uri() . '/js/jquery-moveMouse.js' , array('jquery'));
   // enqueue the script
   wp_enqueue_script('MouseMove');
   // Custom Scripts
   wp_register_script('Main', get_template_directory_uri() . '/js/main.js' , array('jquery'), '3.1.1', true);
   wp_localize_script( 'Main', 'MyAjax', array(
    // URL to wp-admin/admin-ajax.php to process the request
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
   ));
   // enqueue the script
   wp_enqueue_script('Main');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');


// CONFIGURANDO FUNCION DE ENVIO DE CORREO POR LLAMADOS AJAX
function envio_formulario() {

   // VALORES ENVIADOS DE FORMULARIO
   $nombre =sanitize_text_field($_POST['_nombre']);
   $apellido =sanitize_text_field($_POST['_apellido']);
   $correo =sanitize_text_field($_POST['_correo']);
   $telefono =sanitize_text_field($_POST['_telefono']);
   $fechaInicio =sanitize_text_field($_POST['_fechaInicio']);
   $fechaFinal =sanitize_text_field($_POST['_fechaFinal']);
   $tipoAcomodacion =sanitize_text_field($_POST['_tipoAcomodacion']);

   // ENVIAR CORREO DE ACTUALIZACIÓN DE DATOS
   $ms = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="https://www.w3.org/1999/xhtml/" xml:lang="en">
      <head>
         <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
         <title>Calibri - la casa libre del rio</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      </head>
      <body>
      <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: center; color: #666666; font-size: 13px;">
         <tr>
            <td bgcolor="#009e1e" style="border: 5px solid #009e1e; border-bottom: 0px; padding: 10px;">
               <h1 style="margin: 0px; font-size: 31px; line-height: 37px; color: #FFFFFF; font-weight: bold; text-align: left;"> Calibrí - la casa libre del Rio </h1>
               <h2 style="margin: 5px 0px 0px 0px; font-family: Arial; font-size: 20px; line-height: 24px; color: #FFFFFF; font-weight: normal; text-align: left;">Solicitud de Reserva</h2>
            </td>
         </tr>
         <tr>
            <td style="border: 5px solid #009e1e; padding: 10px;" align="left">
               <h2 style="line-height: 30px; text-decoration: none;font-weight: normal;margin: 0px 0px 10px 0px; font-weight: normal; font-size: 20px; color: #666666; text-align: left;">
                  La persona interesada: '.$nombre.' '.$apellido.'
               </h2>
               <p style="margin: 0px 0px 10px 0px;line-height: 22px;">
                  Solicitó averiguar disponibilidad de: <strong>'.$tipoAcomodacion.'</strong>
               </p>
               <p style="margin: 0px 0px 10px 0px;line-height: 22px;" >
                  entre las fechas: '.$fechaInicio.' y '.$fechaFinal.'.
               </p>
               <p style="margin: 0px 0px 10px 0px;line-height: 22px;" >
                  Registró el siguiente número de teléfono: '.$telefono.'.
               </p>   
               <p style="margin: 0px 0px 10px 0px;line-height: 22px;" >
                  Registró el siguiente correo electrónico: '.$correo.'.
               </p>
            </td>
         </tr>
      </table>
      </body>
      </html>';
   $headers = array('Content-Type: text/html; charset=UTF-8');
   wp_mail('info@calibrimedellin.com', 'Solicitud Reserva Calibrí' , $ms, $headers);
   echo 'true';
   die();
}
//Add Ajax Actions
add_action('wp_ajax_envio_formulario', 'envio_formulario');
add_action('wp_ajax_nopriv_envio_formulario', 'envio_formulario');

// CONFIGURANDO FUNCION DE ENVIO DE CORREO POR LLAMADOS AJAX
function modalResponse() {
   $nombre =sanitize_text_field($_POST['_nombre']);
   $tipo =sanitize_text_field($_POST['_tipo']);
   $title =sanitize_text_field($_POST['_title']);
   $desc =sanitize_text_field($_POST['_desc']);
   $imgUrl =sanitize_text_field($_POST['_imgUrl']);
   $comodidades =sanitize_text_field($_POST['_comodidades']);
   $comodidadesArr = explode(', ', $comodidades );
   if($tipo == 'reserva'){
      $modalContent = '<div class="modalbg"><div class="modalContent"><div class="content"> ';
      $modalContent .= '<img style="max-width:320px;margin: 0% auto 2%;" src="'.get_stylesheet_directory_uri().'/img/logo.png" />';
      $modalContent .= '<h2>'.$nombre .' su petición ha sido enviada con exito</h2>';
      $modalContent .= '<p class="warning">Calibrí rechaza la explotación sexual y otras formas de abuso infantil de acuerdo con las leyes 679 de 2001, 1336 de 2009, 1098 de 2006 y 1329 de 2009. De la misma manera estamos en contra del trabajo infantil. Advertimos a nuestros clientes que estas formas de comportamiento están sujetas a sanciones penales y administrativas, de acuerdo con las leyes de Colombia.</p>';
   }
   if($tipo == 'zoom'){
      $modalContent = '<div class="modalbg"><div class="modalContent"><div class="content zoom">';
      $modalContent .= '<div class="contentImg"><img style="width: 85%;margin: 0% auto 2%;" src="'.$imgUrl .'" alt="'.$title.'" /></div>';
      $modalContent .= '<div class="contentText">';
      $modalContent .= '<h4>'.$title .'</h4>';
      $modalContent .= '<p>'.$desc .'</p>';
      $modalContent .= '<p>Comodidades:</p>';
      if (!empty($comodidadesArr)) {
         $modalContent .= '<p style="color: rgba(0, 0, 0, 0.4); margin: 2%; text-align: center">'.$comodidades .'</p>';

      }
      $modalContent .= '</div>';
   }
   $modalContent .= '</div><div class="cerrarModal"> Cerrar</div>';
   $modalContent .= '</div></div>';
   echo $modalContent;
   die();
}
//Add Ajax Actions
add_action('wp_ajax_modalResponse', 'modalResponse');
add_action('wp_ajax_nopriv_modalResponse', 'modalResponse');


?>