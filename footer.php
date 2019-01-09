<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130715956-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130715956-1');
</script>

</body>
</html>
<?php
    wp_footer();
?>
<?php

if ( is_active_sidebar( 'wid-1' ) ) : ?>

    <div class="button-reviews">
        <img src="<?php echo get_template_directory_uri(); ?>/img/google-review.svg" alt="google review">
    </div>
    <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'calibri-web-template' ); ?>">
        <?php
            if ( is_active_sidebar( 'wid-1' ) ) {
                ?>
                    <div class="cerrarModal widget"> Cerrar</div>
                    <div class="widget-column footer-widget-1">
                        <?php dynamic_sidebar( 'wid-1' ); ?>                      
                    </div>
                <?php
            }
        ?>
    </aside><!-- .widget-area -->

<?php endif; ?>
