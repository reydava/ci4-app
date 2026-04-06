<?php

namespace App\Services;

use App\Libraries\LibraryApi;

class LibraryService
{
    protected $api;

    public function __construct()
    {
        $this->api = new LibraryApi();
    }

    // ======================
    // GET DATA
    // ======================
    public function getBooks()
    {
        return $this->api->get('books');
    }

    public function getMembers()
    {
        return $this->api->get('members');
    }

    // ======================
    // POST DATA
    // ======================
    public function createBook($data)
    {
        return $this->api->post('books', $data);
    }

    public function createMember($data)
    {
        return $this->api->post('members', $data);
    }

    // ======================
    // UPDATE DATA
    // ======================
    public function updateBook($id, $data)
    {
        return $this->api->put('books/' . $id, $data);
    }

    public function updateMember($id, $data)
    {
        return $this->api->put('members/' . $id, $data);
    }

    // ======================
    // DELETE DATA
    // ======================
    public function deleteBook($id)
    {
        return $this->api->delete('books/' . $id);
    }

    public function deleteMember($id)
    {
        return $this->api->delete('members/' . $id);
    }
}