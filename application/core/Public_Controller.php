<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login/setting_model');
		$this->ci =& get_instance();
		// Load the current theme so we can set the assets right away
		$this->ci->theme = $this->ci->setting_model->getTheme();

		$this->config->set_item('theme_asset_dir', dirname($this->ci->theme->default_theme).'/');
		$this->config->set_item('theme_asset_url', dirname($this->ci->theme->default_theme).'/');

		$this->template
			->set_theme($this->ci->theme->default_theme);

	}
}