<?php

namespace App\Controllers;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();

        // Search
        $search = $this->request->getVar('search');
        if ($search) {
            $students = $studentModel
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('course', $search)
                ->paginate(10);
        } else {
            $students = $studentModel->paginate(10);
        }

        $data = [
            'students' => $students,
            'pager'    => $studentModel->pager
        ];

        return view('students/index', $data);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        $studentModel = new StudentModel();
        $studentModel->save([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'course'=> $this->request->getPost('course'),
        ]);

        return redirect()->to('/students');
    }

    public function edit($id)
    {
        $studentModel = new StudentModel();
        $data['student'] = $studentModel->find($id);

        return view('students/edit', $data);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();
        $studentModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'course'=> $this->request->getPost('course'),
        ]);

        return redirect()->to('/students');
    }

    public function delete($id)
    {
        $studentModel = new StudentModel();
        $studentModel->delete($id);

        return redirect()->to('/students');
    }
}
