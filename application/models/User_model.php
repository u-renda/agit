<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    var $table = 'user';
    var $table_id = 'id_user';
    
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
        if (isset($param['username']) == TRUE)
        {
            $where += array('username' => $param['username']);
        }
        if (isset($param['id_user']) == TRUE)
        {
            $where += array('id_user' => $param['id_user']);
        }
        
        $this->db->select('id_user, '.$this->table.'.id_position, '.$this->table.'.id_company, email,
						  username, password, '.$this->table.'.name, role, nik, '.$this->table.'.status,
						  '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  position.name AS position_name, company.name AS company_name');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('position', $this->table.'.id_position = position.id_position');
        $this->db->join('company', $this->table.'.id_company = company.id_company');
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
		$order = 'name';
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
        
        $this->db->select('id_user, '.$this->table.'.id_position, '.$this->table.'.id_company, email,
						  username, password, '.$this->table.'.name, role, nik, '.$this->table.'.status,
						  '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  position.name AS position_name, company.name AS company_name');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('position', $this->table.'.id_position = position.id_position');
        $this->db->join('company', $this->table.'.id_company = company.id_company');
        $this->db->order_by($order, $sort);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }
    
    function lists_count($param)
    {
        $where = array();
        
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