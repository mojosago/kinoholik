<?php
// Importar datos
if ( !defined( 'ABSPATH' ) ) exit;
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {
	require_once( dirname( __FILE__ ) . '/importer/dt-importer.php' );
	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {
		public $theme_options_framework = 'radium';
		private static $instance;
		public $content_demo_file_name  = 'dooplay_demo.xml';
		public function __construct() {
			$this->demo_files_path = dirname(__FILE__) . '/tmp/'; //can
			self::$instance = $this;
			parent::__construct();
		}
	}
	new Radium_Theme_Demo_Data_Importer;
}