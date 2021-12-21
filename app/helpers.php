<?php

use App\Models\TmpFile;

if(!function_exists('upload_images')){
    function upload_images($model, $imagesNames, $collection)
    {
        if($imagesNames){
            $foldersNames = explode(',', $imagesNames);
            $tmpFiles = TmpFile::whereIn('folder', $foldersNames)->get();

            foreach($tmpFiles as $file){
                $model->addMedia(storage_path('app/uploads/tmp/'.$file->folder.'/'.$file->name))
                ->toMediaCollection($collection);
            }

            TmpFile::destroy($tmpFiles->pluck('id'));
        }
    }
}
