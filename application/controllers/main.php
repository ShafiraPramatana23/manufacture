<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_maps');
	}

	public function index()
	{
		$data['content'] = "home";
        $this->load->view('main', $data);
	}

	public function maps()
	{
		$rs = $this->m_maps->get_rs();
		$data['dtRS'] = $rs;
		$data['content'] = "maps";
        $this->load->view('main', $data);
	}

	public function about()
	{
		$data['content'] = "about";
        $this->load->view('main', $data);
	}

	public function detail()
	{
		$data['content'] = "detail";
        $this->load->view('main', $data);
	}
}
