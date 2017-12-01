<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model {

	protected $fillable = ['entity_id', 'name', 'type', 'description', 'phase', 'facets', 'entities', 'status', 'usability', 'website', 'get_involved', 'rss', 'twitter', 'images_url', 'images_small', 'images_large', 'geographic_reach', 'locations', 'abbreviation', 'resources', 'additional_information', 'internal_notes', 'date_added', 'slug', 'iid', 'uid', 'source', 'source_date_added'];
	protected $table = 'entity';
	public $timestamps = false;

	public function facets()
	{
		return $this->belongsTo('\App\Models\Facets');
	}

	public function entity()
	{
		return $this->belongsTo('\App\Models\Entity');
	}
}