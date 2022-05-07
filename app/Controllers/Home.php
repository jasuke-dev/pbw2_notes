<?php

namespace App\Controllers;

use App\Models\Note;
helper('auth');
helper('url');

class Home extends BaseController
{
    // use \Myth\Auth\AuthTrait;
    // public function __construct() 
    // {
    //     $this->restrict( site_url('/login') );
    // }
    
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
        $userId = user_id();

        if($userId != $id){
            return redirect()->to('/'.$userId.'/home');
        }
        $NoteModel = new Note();
        $Notes = $NoteModel->getNotesbyUid($id);
        $data = [
            'notes' => $Notes,
            'user_id' => $userId,
        ];
        return view('home', $data);
    }
}
