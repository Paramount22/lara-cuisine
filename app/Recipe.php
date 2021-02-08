<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Recipe extends Model
{


    protected $fillable = ['user_id', 'categorie_id', 'title', 'duration', 'procedure', 'ingredients', 'slug', 'cover'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }

    /**
     * Vztah medzi Category a receptami
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    /**
     * Recipe can mane comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    /**
     * Pomocou fumkcie explode pretransformujeme string na array
     * @param $ing
     * @return array
     */
    public function format_ingredients($ing)
    {
        return $ing->ingredients =  $ing->ingredients ? explode(",", $ing->ingredients) : [];
    }

    /** MUTATOR
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
        $this->attributes['slug'] = slugify($value); // vygeneruje sa v db aj slug
    }

    /** ACCESSOR
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute ($value)
    {
        return date('j M Y', strtotime($value) ); // upravime zobrazenie datumov a casou
    }

    /** ACCESSOR
     * @return false|string
     */
    public function getDatetimeAttribute()
    {
        return date('Y-m-d', strtotime($this->created_at));
    }


    /** ACCESSOR
     * @return mixed|string
     */
    public function getRichTextAttribute ()
    {
        return add_paragraphs( filter_url( e($this->procedure) ) ); // vytvorime odstavce v postoch budu osetrene proti csrf
    }


    public function totalRecipe()
    {
        return app('db')->select(" -- noinspection SqlDialectInspectionForFile
        
        select count(id) as total from recipes        
        ");
    }

}
