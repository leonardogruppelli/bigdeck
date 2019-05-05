<?php
class Classes_model extends CI_Model
{

    public function get($id = null)
    {
        if ($id) {
            $query = $this->db->get_where('classes', array('id' => $id));
            return $query->first_row();
        } else {
            $query = $this->db->order_by('name', 'ASC')->get('classes');
            return $query->result();
        }
    }

    public function insert($data)
    {
        return $this->db->insert('classes', $data);
    }

    public function update($data, $id)
    {
        return $this->db->update('classes', $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('classes', array('id' => $id));
    }
    
}
