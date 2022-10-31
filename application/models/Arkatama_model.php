<?php

use PhpParser\Builder\Function_;

class Arkatama_model extends CI_Model
{
    public function gettasks($id = null)
    {
        if ($id === null) {
            return $this->db->get('tasks')->result_array();
        } else {
            return $this->db->get_where('tasks', ['id' => $id])->result_array();
        }
    }
    public function deleteTasks($id)
    {
        $this->db->delete('tasks', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function tambahTasks($newData)
    {
        $this->db->insert('tasks', $newData);
        return $this->db->affected_rows();
    }

    public function ubahTasks($newData, $id)
    {
        $this->db->update('tasks', $newData, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
