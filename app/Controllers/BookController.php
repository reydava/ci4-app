<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\LibraryService;

class BookController extends BaseController
{
    protected $libraryService;

    public function __construct()
    {
        $this->libraryService = new LibraryService();
    }

    // ======================
    // TAMPILKAN DATA BUKU
    // ======================
    public function index()
    {
        $response = $this->libraryService->getBooks();

        $data['books'] = $response['data'] ?? [];

        return view('books/index', $data);
    }

    // ======================
    // FORM TAMBAH BUKU
    // ======================
    public function create()
    {
        return view('books/create');
    }

    // ======================
    // SIMPAN DATA BUKU
    // ======================
    public function store()
    {
        $data = [
            'title'       => $this->request->getPost('title'),
            'author'      => $this->request->getPost('author'),
            'publisher'   => $this->request->getPost('publisher'),
            'year'        => $this->request->getPost('year'),
        ];

        $this->libraryService->createBook($data);

        return redirect()->to('/books')->with('success', 'Data buku berhasil ditambahkan');
    }

    // ======================
    // FORM EDIT BUKU
    // ======================
    public function edit($id)
    {
        $response = $this->libraryService->getBooks();

        $book = null;
        foreach ($response['data'] as $item) {
            if ($item['id'] == $id) {
                $book = $item;
                break;
            }
        }

        return view('books/edit', ['book' => $book]);
    }

    // ======================
    // UPDATE DATA BUKU
    // ======================
    public function update($id)
    {
        $data = [
            'title'       => $this->request->getPost('title'),
            'author'      => $this->request->getPost('author'),
            'publisher'   => $this->request->getPost('publisher'),
            'year'        => $this->request->getPost('year'),
        ];

        $this->libraryService->updateBook($id, $data);

        return redirect()->to('/books')->with('success', 'Data buku berhasil diupdate');
    }

    // ======================
    // HAPUS DATA BUKU
    // ======================
    public function delete($id)
    {
        $this->libraryService->deleteBook($id);

        return redirect()->to('/books')->with('success', 'Data buku berhasil dihapus');
    }
}