<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function update($table, $array, $where)
	{
		$this->db->where($where);
		return $this->db->update($table, $array);
	}

	function insert($table, $array, $url=NULL)
	{
		$this->db->set($array);
		$this->db->insert($table);
		if ($url) {
			$this->session->set_flashdata('statusMsg', 'Data Successfully Inserted.');
			redirect($url);
			exit;
		}
		return $this->db->insert_id();
	}

	function getById($table, $fieldId, $id, $select='*')
	{
		$this->db->select($select);
		$this->db->where($fieldId . " = '" . $id . "'");
		$query = $this->db->get($table);
		return $query->row();
	}

	function getAll($table, $orderBy=NULL, $where=NULL, $select=NULL, $group_by=NULL)
	{
		if ($select) {
			$this->db->select($select);
		}

		if ($where)
		$this->db->where($where);
		if ($orderBy)
		$this->db->order_by($orderBy);

		if ($group_by)
		$this->db->group_by($group_by);
		$query = $this->db->get($table);

		return $query->result();
	}

	function get_with_limit($table, $num, $offset, $orderBy = NULL, $search=NULL)
	{
		if ($search)
		$this->db->where($search);
		if ($orderBy)
		$this->db->order_by($orderBy);
		$query = $this->db->get($table, $num, $offset);
		//print_r($this->db->last_query());
		return $query;
	}

	function countTotal($table, $where=NULL)
	{
		if ($where)
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	function getLast($table)
	{
		$query = $this->db->get($table);
		return $query->row();
	}

	function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function get_attribute($table, $attribute, $where)
	{
		$this->db->select($attribute);
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query->num_rows() == 1)
		return $query->row();
		else if ($query->num_rows() > 1)
		return $query->result();
	}

	function getMemberDetail($table, $member_id)
	{
		$sql = "select * from " . $table . " where id = '" . $member_id . "'";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row;
	}

	/**
	 * Find the result based on parameter passed
	 *
	 * @param $tbl
	 * @param $offset
	 * @param $limit
	 * @param $sort
	 * @param $order
	 * @return unknown_type
	 */
	public function find($tbl, $offset = 0, $limit = null, $sort= null, $order = 'asc', $condition = null)
	{
		if ($sort) {
			$this->db->order_by($sort, $order);
		}
		$this->db->limit($limit, $offset);

		if ($condition) {
			$this->db->where($condition);
		}

		$this->db->select('*');
		$query = $this->db->get($tbl);
		return $query->result();
	}
	

	/**
	 * Check duplicate on given table with given predicates
	 *
	 * @param $table
	 * @param $where
	 * @return unknown_type
	 */
	public function check_duplicate($table, $where = null)
	{
		return $this->countTotal($table, $where);
	}

	public function get_single_data($table_name, $field, $where)
	{
		$this->db->select($field);
		$this->db->where($where);
		$query = $this->db->get($table_name)->row();
		if($query) 
		{
			return $query->$field;
		}
		return '';
	}

	public function get_single_row($table_name, $cndt)
	{
		if(!empty($cndt)){
			$this->db->where($cndt);
		}
		$query = $this->db->get($table_name);
		if($query->num_rows() == 1){
			return $query->row();
		}
		return FALSE;
	}
	
	function get_states()
	{
//		return $query = $this->db->query("Call sp_getStates()")->result();
		return $query = $this->db->get("states")->result();
	}
	

}