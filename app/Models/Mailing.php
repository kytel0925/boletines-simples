<?php


namespace App\Models;


use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Str;

class Mailing extends Model implements AuthorizableContract{
	use Authorizable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mailing';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['subject', 'body', 'code', 'created_by'];

	public function createdBy(){
		return $this->belongsTo('App\User');
	}

	public static function generateCode(){
		$data = [
			'time' => time(),
			'unique' => Str::random(60)
		];

		return sha1(base64_encode(json_encode($data)));
	}
}