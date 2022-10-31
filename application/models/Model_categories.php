<?php

use PhpParser\Builder\Function_;


class Model_categories extends CI_Model
{
    public function getCategories($id = null)
    {
        if ($id === null) {
            return $this->db->get('task_categories')->result_array();
        } else {
            return $this->db->get_where('task_categories', ['id' => $id])->result_array();
        }
    }

    public function deleteTasks($id)
    {
        $this->db->delete('task_categories', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function tambahTasks($newData)
    {
        $this->db->insert('task_categories', $newData);
        return $this->db->affected_rows();
    }

    public function ubahTasks($newData, $id)
    {
        $this->db->update('task_categories', $newData, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
