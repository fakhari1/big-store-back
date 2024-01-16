<?php

namespace Modules\File\Models;

use Modules\File\Services\Uploader\StorageManager;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public $appends = ['public_path'];

    public function isMedia()
    {
        return $this->type == 'video';
    }

    public function absolutePath()
    {
        return resolve(StorageManager::class)->getAbsolutePathOf($this->name, $this->path, $this->is_private);
    }

    public function download()
    {
        return resolve(StorageManager::class)->getFile($this->name, $this->type, $this->is_private);
    }

    public function delete()
    {
        resolve(StorageManager::class)->deleteFile($this->name, $this->type, $this->is_private);

        parent::delete();
    }

    public function getPublicPathAttribute()
    {
        return !$this->is_private ? env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $this->path . DIRECTORY_SEPARATOR . $this->name : null;
    }
}
