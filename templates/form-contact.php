<?php  

$tax = get_query_var('form_type');
?>
<div class="mascara-seccion">
    <div class="contenido">
        <form id="contactForm" action="" class="form-0">
            <h2>
                Compartenos tu inquietud
            </h2>
            <div class="bg-form">
                <div class="bloque-form">
                    <input id="nombre" name="nombre" placeholder="Nombre(s)" type="text" required />
                    <input id="apellido" name="apellido" placeholder="Apellido(s)" type="text" required />
                </div>
                <div class="bloque-form fluid">
                    <input id="email" name="email" placeholder="email@domain.com" type="email" required autocomplete="off" />
                </div>
                <div class="bloque-form fluid">
                    <input id="telefono" name="telefono" placeholder="Telefono" type="text" required autocomplete="off" />
                <!-- 
                    <div class="terminos-condiciones">
                        <input type="checkbox" name="termsConditions" id="termsConditions" class="termsConditionsStyle" onchange="aceptaTerminos(this)">
                        <label for="termsConditions">Acepto terminos y condiciones</label>
                    </div>
                 -->
                </div>
                <div class="bloque-form fluid">
                    <input type="submit" name="submit" id="btn_envio" value="DISPONIBILIDAD" />
                </div>                        
            </div>
        </form>
        <div class="hojas-bg-4-internas">
            <img src="<?php echo get_template_directory_uri(); ?>/img/hojas-bg-4-1.png" alt="">
        </div>
    </div>
</div>
