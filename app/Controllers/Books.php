<?php


namespace App\Controllers;


class Books extends BaseController {

public function index() {
    $this->load->model('Book_model');
    $data['books'] = $this->Book_model->get_all_books();
    $this->load->view('books/index', $data);
}

public function create() {
    $this->load->view('books/create');
}

public function save() {
    $data = [
        'author' => $this->input->post('author'),
        'title' => $this->input->post('title'),
        'isbn' => $this->input->post('isbn'),
        'amount' => $this->input->post('amount'),
        'price' => $this->input->post('price'),
    ];

    $this->load->model('Book_model');
    $this->Book_model->insert_book($data);

    redirect('books');
}

public function edit($id) {
    $this->load->model('Book_model');
    $data['book'] = $this->Book_model->get_book_by_id($id);
    $this->load->view('books/edit', $data);
}

public function update($id) {
    $data = [
        'author' => $this->input->post('author'),
        'title' => $this->input->post('title'),
        'isbn' => $this->input->post('isbn'),
        'amount' => $this->input->post('amount'),
        'price' => $this->input->post('price'),
    ];

    $this->load->model('Book_model');
    $this->Book_model->update_book($id, $data);

    redirect('books');
}

public function delete($id) {
    $this->load->model('Book_model');
    $this->Book_model->delete_book($id);

    redirect('books');
}
}