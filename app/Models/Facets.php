<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model {

	protected $fillable = ['facet_id', 'name', 'type', 'description', 'facets', 'entities', 'source', 'resources', 'slug', 'importance'];
	protected $table = 'facets';
	public $timestamps = false;

	public function entity()
	{
		return $this->belongsTo('\App\Models\Entity');
	}

	public function facets()
	{
		return $this->belongsTo('\App\Models\Facets');
	}
}