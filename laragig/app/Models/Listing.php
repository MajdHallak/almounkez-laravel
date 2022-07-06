<?php

namespace App\Models;

use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Providers\AppServiceProvider;

class Listing extends Model {
    use HasFactory;

    /* AppServiceProvider */
    // protected $fillable = ['title', 'company', 'website', 'location', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters) {
        // dd($filters);
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
