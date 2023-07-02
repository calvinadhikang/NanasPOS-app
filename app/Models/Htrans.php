<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Htrans extends Model
{
    use HasFactory;
    protected $table = "htrans";

    public function user(): HasOne {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function dtrans(): HasMany {
        return $this->hasMany(Dtrans::class, 'htrans_id', 'id');
    }
}
