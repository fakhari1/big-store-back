<?php

namespace Modules\Market\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\File\Models\File;
use Modules\File\Services\Uploader\StorageManager;
use Modules\Vendor\Models\Vendor;

class Brand extends Model
{
    use HasFactory;

    protected $appends = ['logo_path'];
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }

    public function logo()
    {
        return $this->belongsTo(File::class, 'logo_id');
    }

    public function getLogoPathAttribute()
    {
        if ($this->logo) {
            $image = $this->logo;
            return env('APP_URL') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $image->path . DIRECTORY_SEPARATOR . $image->name;
        } else {
            return null;
        }
    }

    public function deleteLogo()
    {
        $image = $this->logo;
        if ($image) {
            $storageManager = new StorageManager();

            $this->image->delete();

            return $storageManager->deleteFile($image->name, $image->path, $image->is_private);
        } else
            return true;
    }
}
