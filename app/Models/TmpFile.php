<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class TmpFile extends Model
{
    use HasFactory;

    protected $fillable = ['folder', 'name'];

    protected static function boot(){
        parent::boot();
        static::deleting(function($file){
            try{
                File::deleteDirectory(storage_path('app/public/uploads/tmp/'.$file->folder));
            }catch(Exception $e){
                throw new Exception($e->getMessage(), 1);

            }
        });
    }
}
