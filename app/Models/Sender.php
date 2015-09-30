<?php


namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Sender extends Model implements AuthorizableContract{
	use Authorizable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sender';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['alias', 'username', 'password', 'domain', 'maximum_per_day'];
}