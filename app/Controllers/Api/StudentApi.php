<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StudentModel;

class StudentApi extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format    = 'json';

    // GET /api/studentapi
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/studentapi/{id}
    public function show($id = null)
    {
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound('Student not found');
        }
        return $this->respond($student);
    }

    // POST /api/studentapi
    public function create()
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated(['message' => 'Student created successfully']);
    }

    // PUT /api/studentapi/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->find($id)) {
            return $this->failNotFound('Student not found');
        }
        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['message' => 'Student updated successfully']);
    }

    // DELETE /api/studentapi/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Student not found');
        }
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Student deleted successfully']);
    }
}
