<?php
class Types_model extends CI_Model
{

    public function get($id = null)
    {
        if ($id) {
            $query = $this->db->get_where('types', array('id' => $id));
            return $query->first_row();
        } else {
            $query = $this->db->order_by('name', 'ASC')->get('types');
            return $query->result();
        }
    }

    public function insert($data)
    {
        return $this->db->insert('types', $data);
    }

    public function update($data, $id)
    {
        return $this->db->update('types', $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('types', array('id' => $id));
    }
    
}
