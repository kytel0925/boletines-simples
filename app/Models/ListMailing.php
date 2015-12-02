<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ListMailing extends Model{
	protected $table = 'list';

	public function listMembers(){
		return $this->hasMany('App\Models\ListMember', 'list_id');
	}

	public function mailing(){
		return $this->belongsTo('App\Models\Mailing', 'mailing_id');
	}

	public function isPending(){
		return $this->status == 'pending';
	}
}