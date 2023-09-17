<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktiviti extends Model
{
    use HasFactory;
    public $timestamps = false;

	protected $table = 'maklumat_aktiviti';
    protected $primaryKey = 'id_aktiviti';

    public function pengguna()
	{
		return $this->belongsTo(Pengguna::class, 'rid_pengguna', 'id_pengguna');
	}

}
