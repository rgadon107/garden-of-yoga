<?php
/**
 * Twentyfifteen Child theme footer template.
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package spiralWebDB\gardenOfYoga
 * @subpackage Twentyfifteen Child
 * @since version 1.0.0
 */
namespace spiralWebDB\gardenOfYoga;

$has_active_sidebar = is_active_sidebar( 'main-content-footer-widget' );
?>
	</div><!-- .site-content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( $has_active_sidebar  ) { ?>

        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'main-content-footer-widget' ); ?>
        </div>

        <?php } ?>

        <div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
			?>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}
			?>
			<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>" class="imprint">
				<?php echo 'Proudly powered by WordPress'; ?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>