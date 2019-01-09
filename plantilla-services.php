<?php
/* 
 * Template Name: Plantilla Pages
 * Plantilla para las paginas de servicios
 * 06.12.2018
*/
wp_head();
global $post;
$post_slug=$post->post_name;
// SECCION 1
$textoPrincipalSeccion1 = rwmb_meta('texto-introduccion');
$imagenesPrincipal = rwmb_meta('img-principal');
$imagenesBg = rwmb_meta('img-bg');
// SECCION 2
$tituloSeccion2 = rwmb_meta('titulo-seccion-2');
$textoSeccion2 = rwmb_meta('texto-seccion-2');
$imagenSeccion2 = rwmb_meta('img-seccion-2');
$subImagenSeccion2 = rwmb_meta('subImg-seccion-2');
$taxonomy = rwmb_meta('select_taxonomy');
$tipoFormulario = rwmb_meta('select_form');
$indSlider = "";
switch ($post_slug) {
    case 'co-working':
        $indSlider = 'Ver escritorios';
        break;
    case 'co-creating':
        $indSlider = 'Ver proyectos';
        break;
    case 'pagina-inicio':
        $indSlider = 'Ver habitaciones';
        break;        
    default:
        $indSlider = 'Ver habitaciones';
}
get_header();
?>
<section id="seccion-0">
    <div class="hoja-bg-1">
        <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-1.png" alt="">
    </div>
    <div class="hoja-bg-2">
        <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-2.png" alt="">
    </div>
    <div class="mascara-seccion">
        <div class="contenido">
            <div class="inner-contenido logo">
                <?php  
                if (!empty($imagenesPrincipal) ):
                    foreach ($imagenesPrincipal as $image):
                    ?>
                        <img src="<?php echo $image['full_url']; ?>" alt="<?php echo $image['title']; ?>">
                    <?php
                    endforeach;
                else:
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
                    <?php
                endif;
                echo $textoPrincipalSeccion1;
                ?>
            </div>
            <div class="hojas-bg-internas">
                <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-1-1.png" alt="">
            </div>
            <div class="fondo-contenido">
                <?php  
                if (!empty($imagenesBg) ):
                    foreach ($imagenesBg as $imageBg):
                    ?>
                        <img src="<?php echo $imageBg['full_url']; ?>" alt="<?php echo $imageBg['title']; ?>">
                    <?php
                    endforeach;
                else:
                    ?>
<!--                     <img src="<?php // echo get_template_directory_uri(); ?>/img/cama-1-coliving-sample.png" alt=""> -->
                    <?php
                endif;
                ?>                    
            </div>
        </div>
    </div>
    <div class="scroll-boton">
        <img src="<?php echo get_template_directory_uri(); ?>/img/boton-scroll.svg" alt="">
    </div>
</section>
<section id="seccion-1">
    <div class="hoja-bg-1">
        <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-1.png" alt="">
    </div>
    <div class="mascara-seccion">
        <div class="contenido">
            <div class="inner-contenido">
                <h1>
                     <?php echo $tituloSeccion2;  ?>
                </h1>
                <?php echo $textoSeccion2; ?>
                <div class="scroll-habitacion">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/boton-scroll-1.svg" alt="">
                    <span><?php echo $indSlider ?></span>
                </div>
            </div>
            <?php  
            if ($post_slug == 'pagina-inicio') {
                ?>
                <div class="tribal-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/tribal-1.svg" alt="">
                </div>
                <?php
            }
            ?>
            <div class="planta-1">
                <?php  
                if (!empty($subImagenSeccion2) ):
                    foreach ($subImagenSeccion2 as $subimageSeccion2):
                    ?>
                        <img src="<?php echo $subimageSeccion2['full_url']; ?>" alt="<?php echo $subimageSeccion2['title']; ?>">
                    <?php
                    endforeach;
                else:
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/planta-1.svg" alt="">
                    <?php
                endif;
                ?>
            </div>
            <div class="planta-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/planta-2.svg" alt="">
            </div>

        </div>
    </div>
    <div class="bg-cama">
        <?php  
        // INCLUIR IMAGEN DE PAGINA
        if (!empty($imagenSeccion2) ):
            foreach ($imagenSeccion2 as $imageSeccion2):
            ?>
                <img src="<?php echo $imageSeccion2['full_url']; ?>" alt="<?php echo $imageSeccion2['title']; ?>">
            <?php
            endforeach;
        else:
            ?>
             <!-- <img src="<?php //echo get_template_directory_uri(); ?>/img/bg-cama-2.png" alt="">  -->
            <?php
        endif;
        ?>
    </div>
 </section>
<section id="seccion-2">
    <?php
        // INCLUIR VARIABLE EN TEMPLATE DE SLIDER
        set_query_var( 'tax', $taxonomy );
        get_template_part( 'templates/owl-slider');
    ?>
</section>
<section id="seccion-3">
    <?php
    // INCLUIR VARIABLE EN TEMPLATE DE FORMULARIO
    set_query_var( 'form_type', $tipoFormulario );
    if ($tipoFormulario == 'Reservas'){
        get_template_part( 'templates/form-reservas');
    }
    else{
        get_template_part( 'templates/form-contact');
    }
    ?>
</section>
<?php
    if ( is_active_sidebar( 'Informacion_footer' ) ) {
        dynamic_sidebar( 'Informacion_footer' );
    }
?>

<section class="footer">
<p>
<span>© Calibri, la casa libre del rio. Todos los derechos reservados </span><b>|</b>
<span class="redes"><a href="https://www.facebook.com/calibrimedellin/"><i class="fab fa-facebook-f"></i></a></span>
<span class="redes"><a href="https://www.instagram.com/calibrimedellin/"><i class="fab fa-instagram"></i></a></span>
<span class="redes"><a href="https://api.whatsapp.com/send?phone=573187129648"><i class="fab fa-whatsapp"></i></a></span>
<span class="redes-movil">
<a href="https://www.facebook.com/calibrimedellin/"><i class="fab fa-facebook-f"></i></a>
<a href="https://www.instagram.com/calibrimedellin/"><i class="fab fa-instagram"></i></a>
<a href="https://api.whatsapp.com/send?phone=573187129648"><i class="fab fa-whatsapp"></i></a>
</span>
<b>|</b><span>318 712.96.48</span>
</p>
</section>
</main>
<?php  
    get_footer();
?>