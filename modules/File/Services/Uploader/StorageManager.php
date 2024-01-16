<?php

namespace Modules\File\Services\Uploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;

class StorageManager
{
    public function putFileAsPrivate(string $name, UploadedFile $file, string $type, string $directory)
    {
        $path = $directory == '' ? $type : DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;

//        $path = $type . DIRECTORY_SEPARATOR . $this->generatePathAsJalaliDate() . DIRECTORY_SEPARATOR;
        return Storage::disk('private')->putFileAs($path, $file, $name);

    }

    public function putFileAsPublic(string $name, UploadedFile $file, string $type, string $directory)
    {
        $path = $directory == '' ? $type : DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;

//        $path = $type . DIRECTORY_SEPARATOR . $this->generatePathAsJalaliDate() . DIRECTORY_SEPARATOR;
        return Storage::disk('public')->putFileAs($path, $file, $name);
    }


    public function getAbsolutePathOf(string $name, string $path, bool $isPrivate)
    {

        return $this->disk($isPrivate)->path($this->directoryPrefix($path, $name));

    }

    public function isFileExists(string $name, string $path, bool $isPrivate)
    {
        return $this->disk($isPrivate)->exists($this->directoryPrefix($path, $name));
    }

    public function getFile(string $name, string $type, bool $isPrivate)
    {
        return $this->disk($isPrivate)->download($this->directoryPrefix($type, $name));
    }


    public function deleteFile(string $name, string $path, bool $isPrivate)
    {
        if ($this->isFileExists($name, $path, $isPrivate)) {
            return $this->disk($isPrivate)->delete($this->directoryPrefix($path, $name));
        } /*else {
            return throw new \Exception('فایل مورد نظر موجود نیست');
        }*/
    }


    private function directoryPrefix($path, $name)
    {
        return $path . DIRECTORY_SEPARATOR . $name;
    }

    private function disk(bool $isPrivate)
    {
        return $isPrivate ? Storage::disk('private') : Storage::disk('public');
    }

    private function generatePathAsJalaliDate()
    {
        $now = Jalalian::now();
        return
            DIRECTORY_SEPARATOR . $now->getYear() .
            DIRECTORY_SEPARATOR . $now->getMonth() .
            DIRECTORY_SEPARATOR . $now->getDay() .
            DIRECTORY_SEPARATOR;
    }


}
