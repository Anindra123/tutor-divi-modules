<?php

class TutorDiviModules extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'tutor-divi-modules';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'tutor-divi-modules';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * TUDM_TutorDiviModules constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'tutor-divi-modules', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );

		$this->load_dependencies();

		add_action('wp_enqueue_scripts', [$this, 'enqueue_divi_styles'], 99);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_divi_scripts'], 99);
	}

	public function load_dependencies() {
		require_once $this->plugin_dir . 'functions.php';
		require_once $this->plugin_dir . 'classes/Helper.php';
		require_once $this->plugin_dir . 'classes/Template.php';
	}

    public function enqueue_divi_styles(){
		$css_file = DTLMS_ENV == 'DEV' ? "css/tutor-divi-style.css" : "css/tutor-divi-style.min.css"; 
        wp_enqueue_style(
            'tutor-divi-styles',
            DTLMS_ASSETS . $css_file,
            array(), 
            time(),
        );
    }

    public function enqueue_divi_scripts(){

    }	
}

new TutorDiviModules;
