<?php 

$tax = get_query_var('tax');
?>
<div class="hoja-bg-3">
    <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-3.png" alt="">
</div>
<div class="mascara-seccion">
    <div class="contenido">
		<div class="owl-carousel owl-theme slider-zoom">
		    <?php
		    $args = array(
		        'post_type' => 'servicio-calibri',
		        'order'  => 'ASC',
		        'category_name' => $tax
		    );
		     $query = new WP_Query( $args );        
		    if ( $query->have_posts() ) : 
		        while ( $query->have_posts() ) : $query->the_post();    
		            $iconoComent = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		            $title = get_the_title();
		            $desc = rwmb_meta('texto-descripcion');
		            $comodidades = rwmb_meta('comodidades');
		    ?>
		    <div>
		        <img id="imgUrl" src="<?php echo $iconoComent; ?>" alt="<?php echo $title; ?>">
		        <p id="titleModal"> <?php echo $title; ?> </p>
			    <div id="descModal" class="descripcionHiden"><?php echo $desc; ?></div>
			    <?php 
			    if(!empty($comodidades)){
			    ?>
			    <div id="comodidades" class="descripcionHiden">
			    <?php
					foreach($comodidades as $comodidad){
			    		echo $comodidad. ' - ';
			    	}
			    ?>
			    </div>
			    <?php	
			    }
			    ?>
		    </div>
		    <?php
		        endwhile;
		        wp_reset_postdata();
		    else :
		        esc_html_e("la categoria: " . $tax . " no tiene servicios asignados");
		    endif;
		    ?>
		</div>
		<div class="nextSl">
		    <img src="<?php echo get_template_directory_uri(); ?>/img/next-slider.svg" alt="">
		</div>
		<div class="prevSl">
		    <img src="<?php echo get_template_directory_uri(); ?>/img/prev-slider.svg" alt="">                    
		</div>
		<div class="hojas-bg-internas-center">
		    <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-3-1.png" alt="">
		</div>
    </div>
</div>
