<?php

namespace App\Controllers;

use App\Models\Note;

class Home extends BaseController
{
    
    public function index()
    {
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function home($id)
    {
        $userId = user_id();    
        $username = user()->username;

        if($userId != $id){
            return redirect()->to('/'.$userId.'/home');
        }
        $NoteModel = new Note();
        $Notes = $NoteModel->getNotesbyUid($id);
        $data = [
            'notes' => $Notes,
            'user_id' => $userId,
            'username' => $username
        ];
        return view('home', $data);
    }
}
