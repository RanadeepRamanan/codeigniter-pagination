<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaginationModel extends CI_Model {

/**
* Funtion to select results for search 
* @return mixed[int,varchar]
*/
public function getSearchResults($data,$limit,$start)
{
	$this->db->select('*');
	$this->db->where('sample_field', $data['search_key']);
	$this->db->limit($limit, $start);
	$query = $this->db->get('sample_table');
	return $query->result();
}


/**
* Funtion to count  results of  user's request from earch 
* @return int
*/
public function countSearchResults($data)
{
	$this->db->select('*');
	$this->db->where('sample_field', $data['search_key']);
	$count=$this->db->count_all_results('sample_table');
	return $count;
}

/**
* Funtion to select results for search 
* @return mixed[int,varchar]
*/
public function getDatas($data,$limit,$start)
{
	$this->db->select('*');
	$this->db->where('sample_field', $data['value']);

	$this->db->limit($limit, $start);
	$query = $this->db->get('sample_table');
	return $query->result();
}


/**
* Funtion to count  results of  user's request from earch 
* @return int
*/
public function countDatas($data)
{
	$this->db->select('*');
	$this->db->where('sample_field', $data['value']);
	$count=$this->db->count_all_results('sample_table');
	return $count;
}
}
