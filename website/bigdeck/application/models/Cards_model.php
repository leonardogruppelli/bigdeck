<?php
class Cards_model extends CI_Model
{

    public $last_id;

    public function get($id = null)
    {
        if ($id) {
            $query = $this->db->select('c.*, r.name AS rarity, t.name AS type, rc.name AS race, cl.name AS class')
            ->from('cards c')
            ->join('rarities r', 'c.rarity_id = r.id', 'LEFT')
            ->join('types t', 'c.type_id = t.id', 'LEFT')
            ->join('races rc', 'c.race_id = rc.id', 'LEFT')
            ->join('classes cl', 'c.class_id = cl.id', 'LEFT')
            ->where('c.id', $id)
            ->get();

            return $query->first_row();
        } else {
            $query = $this->db->select('c.*, r.name AS rarity, t.name AS type, rc.name AS race, cl.name AS class')
            ->from('cards c')
            ->join('rarities r', 'c.rarity_id = r.id', 'LEFT')
            ->join('types t', 'c.type_id = t.id', 'LEFT')
            ->join('races rc', 'c.race_id = rc.id', 'LEFT')
            ->join('classes cl', 'c.class_id = cl.id', 'LEFT')
            ->order_by('c.name', 'ASC')
            ->get();

            return $query->result();
        }
    }

    public function insert($data)
    {
        $query = $this->db->insert('cards', $data);

        $this->last_id = $this->db->insert_id();

        return $query;
    }

    public function update($data, $id)
    {
        return $this->db->update('cards', $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete('cards', array('id' => $id));
    }
    
}
