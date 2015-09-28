<?php


namespace App\Models;


use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Subscriber extends Model implements AuthorizableContract{
	use Authorizable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subscriber';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email'];

}