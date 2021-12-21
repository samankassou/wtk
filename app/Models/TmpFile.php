<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpFile extends Model
{
    use HasFactory;

    protected $fillable = ['folder', 'name'];

    protected static function boot(){
        parent::boot();
        static::deleting(function($file){
            try{
                rmdir(storage_path('app/uploads/tmp/'.$file->folder));
            }catch(Exception $e){

            }
        });
    }
}
