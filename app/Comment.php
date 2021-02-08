<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'recipe_id'];

    /**
     * A comment belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');

    }
    
    /**A comment belongs to a recipe
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');

    }

    /**
     * @return array
     */
    public function totalComments()
    {
        return app('db')->select(" -- noinspection SqlDialectInspectionForFile
        
        select count(id) as total from comments        
        ");
    }


}
