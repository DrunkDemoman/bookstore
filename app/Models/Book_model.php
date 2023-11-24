<?php


namespace App\Models;

use CodeIgniter\Model;
class Books_model extends Model {

public function get_all_books() {
    $this->db->select('*');
    $this->db->from('books');
    $query = $this->db->get();
    return $query->result();
}

public function get_book_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('books');
    return $query->row();
}

public function insert_book($data) {
    $this->db->insert('books', $data);
}

public function update_book($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('books', $data);
}

public function delete_book($id) {
    $this->db->where('id', $id);
    $this->db->delete('books');
}
}