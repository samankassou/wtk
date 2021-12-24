<?php

use App\Models\TmpFile;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

if(!function_exists('upload_images')){
    function upload_images(\Illuminate\Database\Eloquent\Model $model, array $imagesData, $collection, $exist = null)
    {
        if(count($imagesData)){
            $foldersNames = collect($imagesData)->pluck('folder');
            $tmpFiles = TmpFile::whereIn('folder', $foldersNames)->get();

            foreach($tmpFiles as $file){

                $model->addMedia(storage_path('app/public/uploads/tmp/'.$file->folder.'/'.$file->name))
                ->toMediaCollection($collection);

            }

            TmpFile::destroy($tmpFiles->pluck('id'));
        }
    }
}
