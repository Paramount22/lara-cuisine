<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categorie extends Model
{
    protected $fillable = ['category_name', 'slug'];

    public $timestamps = false;


    /**
     * Vztah medzi Category a receptami
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }

    /** MUTATOR
     * @param $value
     */
    public function setCategory_nameAttribute($value)
    {
        $this->attributes['category_name'] = ucfirst($value);
        $this->attributes['slug'] = slugify($value); // vygeneruje sa v db aj slug
    }


    /**
     * All categories
     * @return array
     */
    public function getCategories()
    {
        return app('db')->select("-- noinspection SqlNoDataSourceInspectionForFile
		select id, category_name as name
		from categories	
	");
    }
    
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function recipesOrderBy()
    {
        return DB::table('recipes')->where('categorie_id', $this->id)->latest()->paginate(9);
    }



}
