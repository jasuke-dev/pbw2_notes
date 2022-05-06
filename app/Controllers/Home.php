<?php

namespace App\Controllers;

use App\Models\Note;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function home($id)
    {
        $NoteModel = new Note();
        $Notes = $NoteModel->getNotesbyUid($id);
        $data = [
            'notes' => $Notes
        ];
        return view('home', $data);
    }
}
