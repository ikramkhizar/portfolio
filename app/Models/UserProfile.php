<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','avatar','designation','about'];

    protected $appends = ['full_path'];

    public function getFullPathAttribute() {
        return Storage::url($this->avatar);
    }

    public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
