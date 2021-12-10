<?php

class Bio_model extends CI_Model 
{
    public function input_data($table, $data)
    {
        return $this->db->insert($table,$data);  
    }

    public function tampil_data($table) 
    {
        return $this->db->get($table);
    }

    public function gets_data($table, $id)
    {
        return $this->db->get_where($table, ['id' => $id])->row();
    }
    public function update_data($table, $id, $data)
    {
        return $this->db->update($table, $data,['id' => $id]);
    }
    public function drop_data($table, $id)
    {
        return $this->db->delete($table, ['id' => $id]);
    }

    public function chart() {
        $this->db->group_by('jenis_kelamin');
        $this->db->select('jenis_kelamin');
        $this->db->select('count(*) as total');
        return $this->db->from('bio')->get()->result();
    }
}