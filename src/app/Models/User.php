<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * @return HasOne
     */
    public function phoneBook(): HasOne
    {
        return $this->hasOne(PhoneBook::class);
    }

    /**
     * @return HasOne
     */
    public function userCountry(): HasOne
    {
        return $this->hasOne(UserCountry::class);
    }
}
