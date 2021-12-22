<?php

namespace App\Http\Controllers;

use App\Models\TmpFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function storeImages(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file')[0];

            $fileName = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('uploads/tmp/' . $folder, $fileName, 'public');

            TmpFile::create([
                'folder' => $folder,
                'name' => $fileName
            ]);

            return [
                'folder' => $folder,
                'name' => $fileName,
                'size' => $file->getSize()
            ];
        }
        return "";
    }

    public function deleteFile(Request $request, $fileId)
    {
        return TmpFile::firstWhere('folder', $fileId)->delete();
    }
}
