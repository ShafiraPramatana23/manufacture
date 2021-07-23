<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

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
		$this->load->helper('number');
	}

	public function index()
	{
		$data['content'] = "home";
		$this->load->view('main', $data);
	}

	public function maps()
	{
		// $rs = $this->m_maps->get_rs();
		$category = $this->m_maps->getcategory();
		$city = $this->m_maps->getcity();
		$manuf = $this->m_maps->getmanufacture(0,0,0,0,0,0,0,0,0);
		$data['dtCat'] = $category;
		$data['dtCt'] = $city;
		$data['dtManuf'] = $manuf;
		$data['content'] = "maps";
		$this->load->view('main', $data);
	}

	public function about()
	{
		$data['content'] = "about";
		$this->load->view('main', $data);
	}

	public function detail($id)
	{
		$data['content'] = "detail";
		$manuf = $this->m_maps->getDetail($id);
		$data['dtManuf'] = $manuf;
		$this->load->view('main', $data);
	}

	public function filterData()
	{
		header('Content-Type: application/json');

		$city = floatval($this->input->post('city'));
		$category = floatval($this->input->post('category'));
		$popularity = floatval($this->input->post('popularity'));
		$employee = floatval($this->input->post('employee'));
		$workhour = floatval($this->input->post('work_hour'));
		$salaryMin = empty($this->input->post('salaryMin')) ? 0 : floatval($this->input->post('salaryMin'));
		$salaryMax = empty($this->input->post('salaryMax')) ? 0 : floatval($this->input->post('salaryMax'));
		$distanceMin = empty($this->input->post('distanceMin')) ? 0 : floatval($this->input->post('distanceMin'));
		$distanceMax = empty($this->input->post('distanceMax')) ? 0 : floatval($this->input->post('distanceMax'));

		// echo $employee;

		echo json_encode($this->m_maps->getmanufacture($category, $city, $popularity, $employee , $workhour ,$distanceMin, $distanceMax, $salaryMin, $salaryMax));
	}
}
