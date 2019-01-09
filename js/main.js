// FUNCION DE CONFIGURACIÓN DE ESTADOS Y ELEMENTOS PARA QUE FUNCIONE LA PAGINA CORRECTAMENTE
function onStageReady(_ready , cargaAnimscition){
    if (!_ready) {
        // ubica hojas internas en seccion 0
        if ($('.hojas-bg-internas').length) {
            let widthHeredado = $('.hoja-bg-1').width();
            let heightHeredado = $('.hoja-bg-1').height();
            let leftHeredado = $('.mascara-seccion').position().left + 1;
            let topHeredado = $('.mascara-seccion').position().top + 1;
            $('.hojas-bg-internas').css({
                'width': widthHeredado,
                'height': heightHeredado,
                'left': '-' + Math.round(leftHeredado) + 'px',
                'top': '-' + Math.round(topHeredado) + 'px'
            })
        }
        // ubica hojas internas en seccion 2
        if ($('.hojas-bg-internas-center').length) {
            setTimeout(() => {            
                let widthHeredado = $('.hoja-bg-3').width();
                let heightHeredado = $('.hoja-bg-3').height();
                let leftHeredado = $('.mascara-seccion').position().left;
                let bottomHeredado = $('section#seccion-2>.mascara-seccion').position().top;
                $('.hojas-bg-internas-center').css({
                    'width': widthHeredado,
                    'height': heightHeredado,
                    'left': '50%',
                    'bottom': '-' + bottomHeredado + 'px',
                    'margin-left': '-' + widthHeredado * 0.5 + 'px'
                })
            }, 1000);
        }
        // ACTIVACIÓN DE SLIDER
        slider('.slider-zoom', '.nextSl', '.prevSl');
        // ABRE CIERRA MENU
        $('.boton-menu').on('click' , function(){
            $('.boton-menu-cerrar').css({
                'width':    $('.boton-menu').width(),
                'height':   $('.boton-menu').height()
            });
            let tlMenu = new TimelineMax();
            tlMenu.staggerTo('ul.menu>li', 0.8, { opacity: 1, y: '+10' }, 0.2);
            $('section#menu , .boton-menu-cerrar').fadeIn();
        });
        $('.boton-menu-cerrar').on('click', function () {
            let tlMenu = new TimelineMax();
            tlMenu.staggerTo('ul.menu>li', 0.2, { opacity: 0, y: '-10' }, 0.2);
            tlMenu.eventCallback("onComplete", saleMenu);
        });
        // BOTON DE SCROLL PARA FORMULARIO DE RESERVAS DESDE INICIO
        if ($('.solicitar-reserva')) {
            setTimeout(function(){
                $('.solicitar-reserva').removeAttr('href');
                $('.solicitar-reserva').on('click', function() {
                    let tlMenu = new TimelineMax();
                    tlMenu.staggerTo('ul.menu>li', 0.2, { opacity: 0, y: '-10' }, 0.2);
                    tlMenu.eventCallback("onComplete", saleMenu);
                    TweenMax.to(window, 1, {scrollTo:"section#seccion-3"});
                });
            }, 2500);
        }
        // EVENTO DE BOTONES DE REVIEWS
        if ('.button-reviews') {
            let revAnim = new TimelineMax({ paused: true });
            revAnim.to('.button-reviews', 0.2, {opacity: 0})
            revAnim.to('aside.widget-area', 0.5, {left: $(window).width() - $('aside.widget-area').width() });
            $('.button-reviews').on('click', function() {
                revAnim.play();
            });
            if ($('.cerrarModal.widget')) {
                $('.cerrarModal.widget').on('click', function() {
                    revAnim.reverse();
                });
            }
        }
        // ANIMACIONES DE LOS BOTONES EN EVENTO OVER
        const botonesScale = [ '.boton-menu' , '.scroll-boton', '.scroll-habitacion>img', '.nextSl', '.prevSl' , '.button-reviews' , '.cerrarModal'];
        for (let key in botonesScale) {
            let $el = botonesScale[key];
            window['tlScale' + key] = new TimelineMax({ paused: true });
            window['tlScale' + key].to($el, 0.2, { scale: 1.12});
            $($el).mouseover(function () {
                window['tlScale' + key].play();
            }).mouseout(function () {
                window['tlScale' + key].reverse();
            });
        }
        $('.scroll-boton').on('click', function() {
            TweenMax.to(window, 1, {scrollTo:"section#seccion-1"});
        });
        $('.scroll-habitacion').on('click', function() {
            TweenMax.to(window, 1, {scrollTo:"section#seccion-2"});
        });
        renderForm();
        _ready = true;
        cargaAnimscition(_ready);
        return _ready;        
    }

}
// FUNCION DE CONTROL DE MOVIMIENTO DEL MOUSE PARA ANIMACIÓN
function mouseMove(arrSecciones){
    for (const key in arrSecciones) {
        if (arrSecciones.hasOwnProperty(key)) {
            const $el = arrSecciones[key][0];
            const $elAnim1 = arrSecciones[key][1];
            const $elAnim2 = arrSecciones[key][2];
            const $elAnim3 = arrSecciones[key][2];
            if ($($el).length) {
                $($el).mousemove(function (e) {

                    if ($($elAnim1).length) {
                        $($elAnim1).parallax(-90, e);
                    }
                    if ($($elAnim2).length) {
                        $($elAnim2).parallax(180, e);
                    }
                    if ($($elAnim3).length) {
                        $($elAnim3).parallax(180, e);
                    }
                });
            }
        }
    }
}
// SLIDER DE LANDING PAGE
function slider(idSlider , nextSl , prevSl) {
    $('#featuredproducts .owl-nav').click(function () {
        $(this).removeClass('disabled');
    });
    let slider = $(idSlider);
    slider.owlCarousel({
        loop: true,
        margin: 0,
        center: true,
        navigation: false,
        video: true,
        responsiveClass: true,
            responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1024: {
                items: 3,
            }
        }
    }) 
    $(prevSl).on('click' , function(){
        slider.trigger('prev.owl.carousel');
    })
    $(nextSl).on('click' , function(){
        slider.trigger('next.owl.carousel');
    })
    $('.owl-item').each(function(index, el) {
        let that = $(this);
        $(this).on('click', function() {
            const title = that.find('div #titleModal').text();
            const desc = that.find('div #descModal').text();
            const imgUrl = that.find('div #imgUrl').attr('src');
            const comodidades = that.find('div #comodidades').text();
            console.log(title , imgUrl , desc , comodidades);
            $.ajax({
              url: MyAjax.ajaxurl,
              type: 'post',
              data: {
                action: 'modalResponse',
                _title: title,
                _desc: desc,
                _imgUrl: imgUrl,
                _comodidades: comodidades,
                _tipo: 'zoom'
              },
              success: function (data) {
                openModal(data);
              }
            });
        });
    });
}
// FUNCION PARA DESPLEGAR EL MENU
function saleMenu(){
    $('section#menu , .boton-menu-cerrar').fadeOut();
}
// FUNCION PARA DESPLEGAR EL MENU
function navScroll(){
    setTimeout(function(){
        // CONTROLADOR GLOBAL
        const controller = new ScrollMagic.Controller();
        // ANIMACION ESCENA 1
        let tlScrollSc1 = new TimelineMax({ force3D: true });
        tlScrollSc1.fromTo('section#seccion-1', .8, {opacity: 0} , {opacity: 1});
        tlScrollSc1.from('section#seccion-1 .mascara-seccion', 0.9 , {y: 250 ,ease: Power1.easeOut} , 0);
        const scene1 = new ScrollMagic.Scene({
            triggerElement: "section#seccion-1",
        })
        .setTween(tlScrollSc1)
        .addTo(controller);
        // ANIMACION ESCENA 2
        let tlScrollSc2 = new TimelineMax({ force3D: true });
        tlScrollSc2.fromTo('section#seccion-2', .8, {opacity: 0} , {opacity: 1});
        tlScrollSc2.from('section#seccion-2 .mascara-seccion .contenido .owl-carousel', 0.9 , {y: 5, ease: Power1.easeOut } , 0);

        const scene2 = new ScrollMagic.Scene({
            triggerElement: "section#seccion-2",
        })
        .setTween(tlScrollSc2)
        .addTo(controller);
        // ANIMACION ESCENA 3
        let tlScrollSc3 = new TimelineMax({ force3D: true });
        tlScrollSc3.fromTo('section#seccion-3', .8, {opacity: 0} , {opacity: 1});
        tlScrollSc3.from('section#seccion-3 .mascara-seccion', 0.9 , {y: 250 , ease: Power1.easeOut} , 0);
        const scene3 = new ScrollMagic.Scene({
            triggerElement: "section#seccion-3",
        })
        .setTween(tlScrollSc3)
        .addTo(controller);
    }, 1500 );
}

function renderForm(){
        $("input[name='date']").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $.validate({
            lang: 'es',
            form : '#reservaForm',
            onSuccess : function($form) {
                $("input#btn_envio").prop("disabled",true);
                let dataForm = {
                    action: 'envio_formulario',
                    _nombre: $("input#nombre").val(),
                    _apellido: $("input#apellido").val(),
                    _correo: $("input#email").val(),
                    _telefono: $("input#telefono").val(),
                    _fechaInicio: $('input#fecha-inicio').val(),
                    _fechaFinal: $("input#fecha-final").val(),
                    _tipoAcomodacion: $("select#acomodacion").val(),
                };
                $.ajax({
                  url: MyAjax.ajaxurl,
                  type: 'post',
                  data: dataForm,
                  success: function (data) {
                    if (data == 'true') {
                        $.ajax({
                          url: MyAjax.ajaxurl,
                          type: 'post',
                          data: {
                            action: 'modalResponse',
                            _nombre: $("input#nombre").val(),
                            _tipo: 'reserva'
                          },
                          success: function (data) {
                            openModal(data);
                          }
                        });
                        setTimeout(function(){
                            resetForm();
                            $("input#btn_envio").prop("disabled",false);
                        }, 2500);
                    }
                  }
                });
            return false; // Will stop the submission of the form
            }
        });
}
// RESETAR FORMULARIO
function resetForm(){
    $("input#nombre").val("");
    $("input#apellido").val("");
    $("input#email").val("");
    $("input#telefono").val("");
    $('input#fecha-inicio').val("");
    $("input#fecha-final").val("");
    $("select#acomodacion").val("");
}
// ABRIR MODAL BOX
function openModal(resp){
    $('body').append(resp);
    TweenMax.to('.modalbg', 0.4, {scale: 1, opacity: 1, ease: Circ.easeOut });
    TweenMax.to('.modalContent', 0.6, {scaleY: 1, opacity: 1, delay: 0.5, ease: Circ.easeOut });

    if ($('.modalbg')) {
        $('.cerrarModal').on('click', function() {
            // TweenMax.to('.modalbg', 0.8, {scale: 0, opacity: 0, ease: Circ.easeOut });
            TweenMax.to('.modalbg', 0.6, {scale: 0, opacity: 0, delay: 0.3, ease: Circ.easeOut });
            TweenMax.to('.modalContent', 0.4, {scaleY: 1.2, opacity: 0, ease: Circ.easeOut });
            setTimeout(function(){
                $('.modalbg').remove();
            }, 1500);
        });
    }
}
// INICIO DE CARGA DEL DOM
$(document).ready(function(){
    let $ready = false;
    onStageReady($ready , function(_verif){
        if (_verif) {
            $(".animsition").animsition({
                inClass: 'fade-in-down-sm',
                outClass: 'fade-out-down-sm',
                inDuration: 1500,
                outDuration: 800,
                linkElement: '.animsition-link',
                
                loading: true,
                loadingParentElement: 'body', //animsition wrapper element
                loadingClass: 'animsition-loading',
                loadingInner: '', // e.g '<img src="loading.svg" />'
                timeout: false,
                timeoutCountdown: 5000,
                onLoadEvent: true,
                browser: ['animation-duration', '-webkit-animation-duration'],
                overlay: false,
                overlayClass: 'animsition-overlay-slide',
                overlayParentElement: 'body',
                transition: function (url) { window.location.href = url; }
            }).promise().done(function (arg1) {
                if ($(window).width() >= 768) {
                    mouseMove(
                        [
                            ['section#seccion-0', '.hojas-bg-internas', '.inner-contenido.logo'],
                            ['section#seccion-1', '.planta-1', '.planta-2'],
                            ['section#seccion-2', '.hojas-bg-internas-center', '.hoja-bg-3']
                        ]
                    );                    
                    navScroll();    
                }
            });            
        }
    });

});