<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Tasks extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Arkatama_model', "tasks");
    }

    //Menampilkan Data
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $data = $this->tasks->gettasks();
        } else {
            $data = $this->tasks->gettasks($id);
        }

        if ($data) {
            $this->response([
                'status' => true,
                'data' => $data
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
            if ($this->tasks->deleteTasks($id) > 0) {
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
            'category_id' => $this->post('category_id'),
            'title' => $this->post('title'),
            'description' => $this->post('description'),
            'start_date' => $this->post('start_date'),
            'finish_date' => $this->post('finish_date'),
            'status' => $this->post('status')
        ];

        if ($this->tasks->tambahTasks($newData) > 0) {
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
            'category_id' => $this->put('category_id'),
            'title' => $this->put('title'),
            'description' => $this->put('description'),
            'start_date' => $this->put('start_date'),
            'finish_date' => $this->put('finish_date'),
            'status' => $this->put('status')
        ];
        if ($this->tasks->ubahTasks($newData, $id) > 0) {
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
