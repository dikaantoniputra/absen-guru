<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenPulang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules = [
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15048',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
