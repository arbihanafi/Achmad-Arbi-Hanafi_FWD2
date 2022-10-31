<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Categories extends RestController
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Model_categories', 'ctg');
    }

    //Menampilkan Data
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $categories = $this->ctg->getCategories();
        } else {
            $categories = $this->ctg->getCategories($id);
        }

        if ($categories) {
            $this->response([
                'status' => true,
                'data' => $categories
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    //Menghapus Data
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'tentukan id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->ctg->deleteTasks($id) > 0) {
                //oke
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => "deleted"
                ], RestController::HTTP_NOT_ACCEPTABLE);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    //Menambahkan Data
    public function index_post()
    {
        $newData = [
            'name' => $this->post('name')
        ];

        if ($this->ctg->tambahTasks($newData) > 0) {
            $this->response([
                'status' => true,
                'message' => "data telah dibuat"
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'tidak berhasil ditambahkan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    //Mengubah Data
    public function index_put()
    {
        $id = $this->put('id');
        $newData = [
            'name' => $this->put('name')
        ];
        if ($this->ctg->ubahTasks($newData, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => "data telah diubah"
            ], RestController::HTTP_NOT_ACCEPTABLE);
        } else {
            $this->response([
                'status' => false,
                'message' => 'tidak berhasil diubah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
