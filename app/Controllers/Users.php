<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $userModel = new UserModel();
        
        $img = $this->request->getFile('avatar');
        $avatarName = null;

        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $avatarName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $userModel->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar'    => $avatarName,
        ]);

        return redirect()->to('/users')->with('success', 'Staff member added successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        $avatarName = $user['avatar'];
        $img = $this->request->getFile('avatar');

        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $avatarName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $dataToUpdate = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName,
        ];

        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $dataToUpdate['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $dataToUpdate);

        return redirect()->to('/users')->with('success', 'Staff member updated successfully.');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/users')->with('success', 'Staff member deleted successfully.');
    }
}