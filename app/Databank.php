<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Databank extends Model
{	
	protected $fillable = [
		'account_id',
		'bank_code',
		'agencia',
		'agencia_dv',
		'conta',
		'conta_dv',
		'document_number',
		'legal_name',
		'user_id',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
