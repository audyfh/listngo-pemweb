<?php

class TodoModel extends Model
{

    function getTodos(
        $is_done,
        $today_only = false
    ) {
        $is_done = (int) $is_done;

        $query = "SELECT * FROM todos WHERE is_done = $is_done ORDER BY due_date ASC";

        if ($today_only) {
            $query = "SELECT * FROM todos WHERE is_done = $is_done AND due_date = CURDATE()  ORDER BY due_date ASC";
        }

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function toggleDone($id)
    {
        $id = intval($id);
        $query = "UPDATE todos SET is_done = NOT is_done WHERE id = $id";
        return $this->db->query($query);
    }

    function deleteTodo($id)
    {
        $id = intval($id);
        $query = "DELETE FROM todos WHERE id = $id";
        return $this->db->query($query);
    }
}
