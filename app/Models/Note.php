<?php
namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class Note extends Model{
	protected $table      = 'notes';

	protected $useAutoIncrement = true;

	protected $allowedFields = ['content','user_id'];

	public function getNotesbyUid($user_id){
			$data = $this->where(['user_id' => $user_id])->findAll();
			return $data;

	}

	public function insertNote($user_id,$content){
		$data = [
			'content' => $content,
			'user_id'    => $user_id,
		];

		$this->insert($data);
		$insertId = $this->getInsertID();

		return $insertId;
	}

	public function editById($id, $content){
		$data = [
			'content'    => $content,
		];

		$this->update($id, $data);
	}

	public function deleteById($id){
		$this->delete($id);
	}

}
?>