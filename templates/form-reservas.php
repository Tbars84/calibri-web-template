<?php  

$tax = get_query_var('form_type');
?>
<div class="mascara-seccion">
    <div class="contenido">

        <form id="reservaForm" action="" method="POST" class="form-0">
            <h2>
                Haz tu reserva
            </h2>
            <div class="bg-form">
                <div class="bloque-form">
                    <input type="text" id="fecha-inicio" name="date" data-validation="date"autocomplete="off" readonly="readonly" data-validation-format="dd-mm-yyyy"/>
                    <input type="text" id="fecha-final" name="date" data-validation="date"autocomplete="off" readonly="readonly" data-validation-format="dd-mm-yyyy"/>
                </div>
                <div class="bloque-form fluid">
                    <select class="acomodacion" id="acomodacion" required>
                        <option acom="00">Seleccionar el tipo de Acomodación</option>
                        <option acom="01">Acomodación Sencilla Compartida</option>
                        <option acom="02">Acomodación Doble Compartida</option>
                        <option acom="03">Acomodación Sencilla Individual</option>
                    </select>
                </div>
                <div class="bloque-form">
                    <input id="nombre" name="nombre" placeholder="Nombre(s)" type="text" required data-validation="length" data-validation-length="3 - 25" />
                    <input id="apellido" name="apellido" placeholder="Apellido(s)" type="text" data-validation="length" data-validation-length="3 - 50" />
                </div>
                <div class="bloque-form fluid">
                    <input id="email" name="email" placeholder="email@domain.com" type="email" data-validation="email" required autocomplete="off" />
                </div>
                <div class="bloque-form fluid">
                    <input id="telefono" name="telefono" placeholder="Telefono" type="text" required data-validation="number" />
                </div>
                <div class="bloque-form fluid">
                <!-- 
                    <div class="terminos-condiciones">
                        <input type="checkbox" name="termsConditions" id="termsConditions" class="termsConditionsStyle">
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