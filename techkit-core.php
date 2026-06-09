<?php
/*
Plugin Name: Techkit Core
Plugin URI: https://www.radiustheme.com
Description: Techkit Core Plugin for Techkit Theme
Version: 2.0
Author: RadiusTheme
Author URI: https://www.radiustheme.com
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) exit;

if (!defined('TECHKIT_CORE')) {
	define('TECHKIT_CORE', (WP_DEBUG) ? time() : '1.1');
	define('TECHKIT_CORE_THEME_PREFIX',      'techkit');
	define('TECHKIT_CORE_THEME_PREFIX_VAR',  'techkit');
	define('TECHKIT_CORE_CPT_PREFIX',        'techkit');
	define('TECHKIT_CORE_BASE_DIR',      plugin_dir_path(__FILE__));

	define( 'TECHKIT_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );
	define( 'RDTHEME_CORE_DEMO_CONTENT', plugin_dir_path( __FILE__ ) . '/demo-content/' );
	define( 'RDTHEME_CORE_BASE_URL', plugin_dir_url( __FILE__ ) . 'demo-content/' );

	require_once RDTHEME_CORE_DEMO_CONTENT . 'demo-content.php';
}

class Techkit_Core
{

	public $plugin  = 'techkit-core';
	public $action  = 'techkit_theme_init';

	public function __construct()
	{
		$prefix = TECHKIT_CORE_THEME_PREFIX_VAR;

		add_action('plugins_loaded', array($this, 'load_textdomain'), 16);
		add_action('after_setup_theme', array($this, 'post_meta'), 15);
		add_action('after_setup_theme', array($this, 'elementor_widgets'));
		add_action($this->action,       array($this, 'after_theme_loaded'));
		add_shortcode('techkit-single-event-info', array($this, 'techkit_single_event_info'));

		// Redux Flash permalink after options changed
		add_action("redux/options/{$prefix}/saved", array($this, 'flush_redux_saved'), 10, 2);
		add_action("redux/options/{$prefix}/section/reset", array($this, 'flush_redux_reset'));
		add_action("redux/options/{$prefix}/reset", array($this, 'flush_redux_reset'));
		add_action('init', array($this, 'rewrite_flush_check'));
		add_action('redux/loaded', array($this, 'techkit_remove_demo'));
		add_action('plugins_loaded',       array($this, 'php_version_check'));

		require_once 'module/rt-post-share.php';
		require_once 'module/rt-post-views.php';
		require_once 'module/rt-post-length.php';

		// Widgets
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/rt-recent-post-widget.php';
		require_once 'widget/rt-post-box.php';
		require_once 'widget/rt-post-tab.php';
		require_once 'widget/rt-feature-post.php';
		require_once 'widget/rt-open-hour-widget.php';
		require_once 'widget/search-widget.php'; // override default
		require_once 'widget/rt-product-box.php';
		require_once 'widget/rt-download-widget.php';

		require_once 'widget/widget-settings.php';
		require_once 'lib/optimization/__init__.php';
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	 */
	public function php_version_check()
	{

		if (version_compare(phpversion(), '7.2', '<')) {
			add_action('admin_notices', [$this, 'php_version_message']);
		}

		if (version_compare(phpversion(), '7.2', '>')) {
			require_once TECHKIT_CORE_BASE_DIR . 'lib/optimization/__init__.php';
		}
	}

	public function php_version_message()
	{

		$class = 'notice notice-warning settings-error';
		/* translators: %s: html tags */
		$message = sprintf(__('The %1$sTechkit Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'techkit-core'), '<strong>', '</strong>');
		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses_post($message));
	}

	public function techkit_remove_demo()
	{
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if (class_exists('ReduxFrameworkPlugin')) {
			remove_filter('plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
			), null, 2);

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
		}
	}

	public function load_textdomain()
	{
		load_plugin_textdomain($this->plugin, false, dirname(plugin_basename(__FILE__)) . '/languages');
	}
	public function post_meta()
	{
		if (!did_action($this->action) || !defined('RT_FRAMEWORK_VERSION')) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}
	public function elementor_widgets()
	{
		if (did_action($this->action) && did_action('elementor/loaded')) {

			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded()
	{
		require_once TECHKIT_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url()
	{

		$file = dirname(dirname(__FILE__));

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit(dirname(dirname(get_stylesheet_directory_uri())));
		$content_dir = untrailingslashit(WP_CONTENT_DIR);

		// Fix path on Windows
		$file = wp_normalize_path($file);
		$content_dir = wp_normalize_path($content_dir);

		$url = str_replace($content_dir, $content_url, $file);

		return $url;
	}

	// Flush rewrites
	public function flush_redux_saved($saved_options, $changed_options)
	{
		if (empty($changed_options)) {
			return;
		}
		$prefix = TECHKIT_CORE_THEME_PREFIX_VAR;
		$flush  = false;

		if ($flush) {
			update_option("{$prefix}_rewrite_flash", true);
		}
	}

	public function flush_redux_reset()
	{
		$prefix = TECHKIT_CORE_THEME_PREFIX_VAR;
		update_option("{$prefix}_rewrite_flash", true);
	}

	public function rewrite_flush_check()
	{
		$prefix = TECHKIT_CORE_THEME_PREFIX_VAR;
		if (get_option("{$prefix}_rewrite_flash") == true) {
			flush_rewrite_rules();
			update_option("{$prefix}_rewrite_flash", false);
		}
	}

	/*Event Single Shortcode*/
	public function techkit_single_event_info()
	{
		ob_start();
		$techkit_event_title   	= get_post_meta(get_the_ID(), 'techkit_event_title', true);
		$techkit_event_text   	= get_post_meta(get_the_ID(), 'techkit_event_text', true);
		$techkit_event_address   = get_post_meta(get_the_ID(), 'techkit_event_address', true);
		$techkit_event_phone   	= get_post_meta(get_the_ID(), 'techkit_event_phone', true);
		$techkit_event_mail   	= get_post_meta(get_the_ID(), 'techkit_event_mail', true);
		$techkit_event_open   	= get_post_meta(get_the_ID(), 'techkit_event_open', true);

		$techkit_event_button   	= get_post_meta(get_the_ID(), 'techkit_event_button', true);
		$techkit_event_url   	= get_post_meta(get_the_ID(), 'techkit_event_url', true);
?>

		<?php if ((TechkitTheme::$options['event_title'])  && !empty($techkit_event_title) || (TechkitTheme::$options['event_text'])  && !empty($techkit_event_text) || (TechkitTheme::$options['event_address']) && !empty($techkit_event_address) || (TechkitTheme::$options['event_phone'])  && !empty($techkit_event_phone) || (TechkitTheme::$options['event_mail']) && !empty($techkit_event_mail) || (TechkitTheme::$options['event_open']) && !empty($techkit_event_open)) { ?>
			<div class="rtin-event-wrap">
				<?php if ((TechkitTheme::$options['event_title']) && !empty($techkit_event_title)) { ?>
					<h3><?php echo wp_kses_post($techkit_event_title); ?></h3>
				<?php }
				if ((TechkitTheme::$options['event_text']) && !empty($techkit_event_text)) { ?>
					<p><?php echo esc_html($techkit_event_text); ?></p>
				<?php } ?>
				<ul class="rtin-event-info">
					<?php if ((TechkitTheme::$options['event_address']) && !empty($techkit_event_address)) { ?>
						<li><i class="fas fa-map-marker-alt"></i><?php echo esc_html($techkit_event_address); ?></li>
					<?php }
					if ((TechkitTheme::$options['event_phone']) && !empty($techkit_event_phone)) { ?>
						<li><i class="fas fa-phone-alt"></i><?php echo esc_html($techkit_event_phone); ?></li>
					<?php }
					if ((TechkitTheme::$options['event_mail']) && !empty($techkit_event_mail)) { ?>
						<li><i class="far fa-envelope"></i><?php echo esc_html($techkit_event_mail); ?></li>
					<?php }
					if ((TechkitTheme::$options['event_open']) && !empty($techkit_event_open)) { ?>
						<li><i class="far fa-clock"></i><?php echo wp_kses_post($techkit_event_open); ?></li>
					<?php } ?>
				</ul>
				<?php if (TechkitTheme::$options['event_button']) { ?>
					<?php if (!empty($techkit_event_button) || !empty($techkit_event_url)) { ?>
						<div class="single-event-button">
							<a href="<?php echo esc_url($techkit_event_url); ?>" class="btn-fill-dark"><?php echo wp_kses($techkit_event_button, 'alltext_allow'); ?></a>
						</div>
				<?php }
				} ?>
			</div>
<?php }
		return ob_get_clean();
	}
}

new Techkit_Core;
