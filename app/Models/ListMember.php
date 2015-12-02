<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ListMember extends Model{
	protected $table = 'list_member';

	public function listMailing(){
		return $this->belongsTo('App\Models\ListMailing', 'list_id');
	}

	public function subscriber(){
		return $this->belongsTo('App\Models\Subscriber', 'subscriber_id');
	}
}