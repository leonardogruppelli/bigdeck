<?php
class Rarities_model extends CI_Model
{

    public function get($id = null)
    {
        if ($id) {
            $query = $this->db->get_where('rarities', array('id' => $id));
            return $query->first_row();
        } else {
            $query = $this->db->get('rarities');
            return $query->result();
        }
    }

    public function insert($data)
    {
        return $this->db->insert('rarities', $data);
    }

    public function update($data, $id)
    {
        return $this->db->update('rarities', $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('rarities', array('id' => $id));
    }

}
