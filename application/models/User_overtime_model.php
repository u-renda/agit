<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_overtime_model extends CI_Model {

    var $table = 'user_overtime';
    var $table_id = 'id_user_overtime';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $param['created_date'] = date('Y-m-d H:i:s');
		$param['updated_date'] = date('Y-m-d H:i:s');
		
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		return $query;
    }
    
    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
    
    function info($param)
    {
        $where = array();
		if (isset($param['id_user_overtime']) == TRUE)
		{
			$where += array('id_user_overtime' => $param['id_user_overtime']);
		}
        
        $this->db->select('id_user_overtime, id_user, id_project, id_project_task, type, category,
						  description, date, status, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
		$order = 'created_date';
		$sort = 'asc';
		$limit = 20;
		$offset = 0;
		
		if (isset($param['order']) == TRUE)
		{
			$order = $param['order'];
		}
		if (isset($param['sort']) == TRUE)
		{
			$sort = $param['sort'];
		}
		if (isset($param['limit']) == TRUE)
		{
			$limit = $param['limit'];
		}
		if (isset($param['offset']) == TRUE)
		{
			$offset = $param['offset'];
		}
		
		if (isset($param['id_user']) == TRUE)
		{
			$where += array('id_user' => $param['id_user']);
		}
		if (isset($param['category']) == TRUE)
		{
			$where += array('category' => $param['category']);
		}
        
        $this->db->select('id_user_overtime, id_user, id_project, id_project_task, type, category,
						  description, date, status, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($order, $sort);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }
    
    function lists_count($param)
    {
        $where = array();
		if (isset($param['id_user']) == TRUE)
		{
			$where += array('id_user' => $param['id_user']);
		}
		if (isset($param['category']) == TRUE)
		{
			$where += array('category' => $param['category']);
		}
        
        $this->db->select($this->table_id);
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->count_all_results();
        return $query;
    }
    
    function update($id, $param)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->update($this->table, $param);
        return $query;
    }
}