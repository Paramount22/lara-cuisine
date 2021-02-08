<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = ['user_id', 'title', 'text', 'slug', 'file_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');

    }

    /** ACCESSOR
     * @return mixed|string
     */
    public function getSaveTextAttribute ()
    {
        return add_paragraphs( filter_url( e($this->text) ) ); // vytvorime odstavce v postoch budu osetrene proti csrf
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
     * @return string
     */
    public function getTeaserAttribute()
    {
        return word_limiter($this->text, 30); // vytvorime limiter slov
    }



    /** MUTATOR
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
        $this->attributes['slug'] = slugify($value); // vygeneruje sa v db aj slug
    }
}
