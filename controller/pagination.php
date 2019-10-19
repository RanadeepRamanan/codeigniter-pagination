

<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*Codeignite-v3.1.0
*
*/


public function __construct()
{
	parent::__construct();
	$this->load->model('paginationmodel');
	$this->load->library('pagination');
}

class ControllerName extends CI_Controller {
/**
*Function for pagination for get request
*@return void
*/
public funtion paginationForGetRequest(){


	if($this->input->get()){

		$data = array(
			'search_key' =>$this->input->get('search_key') ,
			);

		$this->load->library('pagination');

		$total_rows=$this->paginationmodel->countResults($data);
		
		if(empty($total_rows)) {
			$total_rows=0;
		}

		$query_string = $_GET;
		if (isset($query_string['page']))
		{
			unset($query_string['page']);
		}

		if (count($query_string) > 0)
		{
			$config['suffix'] = '&' . http_build_query($query_string, '', "&");
		}
		$config['base_url'] = base_url().$this->uri->segment(1);
		$config['first_url'] = $config['base_url'] . '?' . http_build_query($query_string, '', "&");
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 8;
		$config["uri_segment"] = 2;	
		$config['query_string_segment'] = 'page';
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<div class="text-center margin-top-60"><ul class="pagination">';	
		$config['full_tag_close'] = ' </ul><div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li >';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		if(!empty($_GET['page'])){
			$page = $_GET['page'] ;
		}
		else{
			$page = 0;
		}
		$data['link']=$this->pagination->create_links();
		$data['results']=$this->paginationmodel->getResults($data,$config['per_page'],$page)
		if(!$data['results'])
		{
			//show view with results
		} else {
			//show view with no result msg
		}
	} else { 
		//show view
	}

}

/**
*Function for pagination for Listing 
*@return void
*/
public function paginationForListing(){	
		$data = array(
			'value' =>"some value"s
			);
		
		$total_rows=$this->paginationmodel->countDatas($data);
		if(!$total_rows) {
			$total_rows=0;
		}
		$config['base_url'] = base_url().$this->uri->segment(1);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 10;
		$config['first_url'] = base_url().$this->uri->segment(1);	
		$config["uri_segment"] = 2;	
		$config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';	
		$config['full_tag_close'] = ' </ul></div> ';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li >';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['last_link'] = '&rsaquo;&rsaquo;';
		$config['first_link'] = '&lsaquo;&lsaquo;';
		$config['num_links'] = 1;

		$this->pagination->initialize($config);
		$num = $this->uri->segment(2);
		if(!empty($num)){
			$page = $num ;
		}
		else{
			$page = 0;
		}
		$data['link']=$this->pagination->create_links();
		$data['results']=$this->paginationmodel->getDatas($gender,$config['per_page'],$page);
		if(!$data['results'])
		{
			//show view with results
		} else {
			//show view with no result msg
		}
}
