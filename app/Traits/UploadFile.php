<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile {

    public function uploadFileDisk($request, $disk, $fieldname, $destination, $oldFileName = null)
    {
        if($request->file($fieldname)){
            $this->removeFileDisk($disk, $destination, $oldFileName);

            $fileName = Storage::disk($disk)->put(
                $destination, $request->file($fieldname)
            );

            return basename($fileName);
        }

        return null;
    }

    public function multipleUploadFileDisk($request, $disk, $fieldname, $destination, $oldFileName = null)
    {
        if($multipleFieldFile = $request->file($fieldname)){
            $fileName = [];
            
            foreach($multipleFieldFile as $idItem => $item){
                $this->removeFileDisk($disk, $destination, $oldFileName);

                $name = Storage::disk($disk)->put(
                    $destination, $item
                );

                $fileName[$idItem] = basename($name);
            }

            return $fileName;
        }

        return null;
    }

    public function removeFileDisk($disk, $destination, $oldFileName)
    {
        if($oldFileName){ // exists file
            Storage::disk($disk)->delete($destination . $oldFileName);
        }
    }

    public function multipleRemoveFileDisk($disk, $destination, $oldFileName)
    {
        if($oldFileName){ // exists file
            foreach($oldFileName as $item){
                Storage::disk($disk)->delete($destination . $item);
            }
        }
    }
}
