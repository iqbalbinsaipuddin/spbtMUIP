<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

	protected $table = 'maklumat_pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama',
        'no_kp',
        'katalaluan',
        'jawatan',
        'bahagian_unit'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'katalaluan'
    ];

    public function aktiviti()
    {
        return $this->belongsTo(Aktiviti::class, 'rid_pengguna', 'id_pengguna');
    }

}
