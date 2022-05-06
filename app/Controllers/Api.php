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
        $data = $this->notes->getNotesbyUid($user_id);

        return $this->setResponseFormat('json')->respond(['error' => false, 'data' => $data]);
    }

    public function insertNote($user_id, $content){
        $id = $this->notes->insertNote($user_id,$content);
        // header('Content-Type: application/json');        
        // echo json_encode(['id'=>$id]);
        return $this->setResponseFormat('json')->respond(['error' => false, 'id' => $id]);
    }

    public function editNote($id, $content){
        $this->notes->editById($id, $content);
        
        return $this->setResponseFormat('json')->respond(['error' => false, 'data' => 'success update']);
        

    }

    public function deleteNote($id){
        $this->notes->deleteById($id);

        return $this->setResponseFormat('json')->respond(['error' => false, 'message' => 'note deleted']);
    }

}
