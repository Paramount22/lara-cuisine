<?php

namespace App\Service;

use App\File;
use App\Recipe;


class UploadService
{

    /**
     * Save cover to disk
     *
     * @param $model
     * @param $cover
     *
     * @return static
     */
    public function saveCover( $model, $cover ) {
        // create new file
        $dirname = strtolower( class_basename( $model ) ) . 's';

        $filepath = public_path( "../coverimg/$dirname/{$model->id}" );
        
        $extension = $cover->getClientOriginalExtension();

        $filename = str_replace(
            ".$extension",
            "-" . rand( 11111, 99999 ) . ".$extension",
            $cover->getClientOriginalName()
        );

        //save the file
        $cover->move( $filepath, $filename );

        $post = Recipe::find( $model->id);
        // update cover 
        $post->cover = $filename;
        $post->save();

        // add cover to db
        return $this->addFileToDatabase($cover, $filename, $model);

    }

    /**
     * Add file meta-data to DB
     *
     * @param $file
     * @param $filename
     * @param $model
     * @return mixed
     */
    public function addFileToDatabase($file, $filename, $model)
    {

        // store in db
        return File::create([
            'fileable_id' => $model->id,
            'fileable_type' => get_class($model),
            'name' => $file->getClientOriginalName(),
            'filename' => $filename,
            'mime' => $file->getClientMimeType(),
            'ext' => $file->getClientOriginalExtension(),

        ]);
    }

}
