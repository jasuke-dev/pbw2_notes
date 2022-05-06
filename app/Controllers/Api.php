<?php

namespace App\Controllers;

use App\Models\Note;
use Myth\Auth\Models\UserModel;
use CodeIgniter\API\ResponseTrait;


class Api extends BaseController
{
    use ResponseTrait;
    protected $notes;
    public function __construct()
    {
        $this->notes = new Note();
    }
    public function getNote($user_id)
    {
        dd($this->notes->getNotesbyUid($user_id));
    }

    public function insertNote($user_id, $content){
        $this->notes->insertNote($user_id,$content);

        return $this->respondCreated();
    }

    public function editNote($id, $content){
        if($this->notes->editById($id, $content)){
            $this->respond(200);
        }
        

    }

    public function deleteNote($id){
        $this->notes->deleteById($id);

        $this->respondDeleted($id);
    }

}
