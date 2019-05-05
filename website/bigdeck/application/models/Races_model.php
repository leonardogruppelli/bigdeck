<?php
class Races_model extends CI_Model
{

    public function get($id = null)
    {
        if ($id) {
            $query = $this->db->get_where('races', array('id' => $id));
            return $query->first_row();
        } else {
            $query = $this->db->order_by('name', 'ASC')->get('races');
            return $query->result();
        }
    }

    public function insert($data)
    {
        return $this->db->insert('races', $data);
    }

    public function update($data, $id)
    {
        return $this->db->update('races', $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('races', array('id' => $id));
    }
    
}
