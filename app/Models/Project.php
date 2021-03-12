<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['title','image','position','description'];

    protected $appends = ['full_path'];

    public function getFullPathAttribute() {
        return $this->image ? Storage::url($this->image) : Storage::url('uploads/game.png');
    }
}
