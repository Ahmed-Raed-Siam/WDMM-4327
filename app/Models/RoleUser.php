<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory, HasTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id',
    ];
    /**
     * @var mixed
     */
    private $user_id;


    /**
     * @param int $user_id
     * @return string
     */
    public function getUserName(int $user_id): string
    {
        $user_name = User::withoutTrashed()->where('id', $user_id)->first();
        return (string)($user_name->name);
    }
}
