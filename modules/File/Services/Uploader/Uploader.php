<?php

namespace Modules\File\Services\Uploader;

use Modules\File\Exceptions\FileHasExistsException;
use Modules\File\Models\File;
use Illuminate\Http\Request;

class Uploader
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var StorageManager
     */
    private $storageManager;

    private $file;

//    /**
//     * @var FFMpegService
//     */
//    private $ffmpeg;


    public function __construct(StorageManager $storageManager/*, FFMpegService $ffmpeg*/)
    {
        $this->request = request();
        $this->storageManager = $storageManager;
        $this->file = $this->request->file;
//        $this->ffmpeg = $ffmpeg;

    }


    public function upload($directory = '')
    {
        if ($this->isFileExists($directory)) throw new FileHasExistsException('File has already uploaded');

        $this->putFileIntoStorage($directory);

        return $this->saveFileIntoDatabase($directory);
    }


    private function saveFileIntoDatabase($directory = '')
    {
        $type = $this->getType();

        $path = $directory == '' ? $type : $type . DIRECTORY_SEPARATOR . $directory;

        $file = new File([
            'name' => $this->file->getClientOriginalName(),
            'size' => $this->file->getSize(),
            'path' => $path,
            'type' => $this->getType(),
            'is_private' => $this->isPrivate()
        ]);

//        $file->time = $this->getTime($file);
        $file->save();

        return $file;
    }


//    private function getTime(File $file)
//    {
//        if (!$file->isMedia()) return null;
//
//        return $this->ffmpeg->durationOf($file->absolutePath());
//    }

    private function putFileIntoStorage($directory = '')
    {
        $method = $this->isPrivate() ? 'putFileAsPrivate' : 'putFileAsPublic';

        $this->storageManager->$method($this->file->getClientOriginalName(), $this->file, $this->getType(), $directory);

    }


    private function isPrivate()
    {
        return $this->request->has('is_private');
    }

    private function getType()
    {
        return [
            'image/jpeg' => 'image',
            'video/mp4' => 'video',
            'application/zip' => 'archive'
        ][$this->file->getClientMimeType()];
    }

    private function isFileExists($directory = '')
    {
        return $this->storageManager->isFileExists($this->file->getClientOriginalName(), $directory ?? $this->getType(), $this->isPrivate());
    }


}
