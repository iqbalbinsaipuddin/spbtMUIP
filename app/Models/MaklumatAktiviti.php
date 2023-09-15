<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaklumatAktiviti extends Model
{
    use HasFactory;

	protected $table = 'maklumat_aktiviti';
    protected $primaryKey = 'id_aktiviti';
    // protected $incrementing = false;
    protected $timestamp = false;

}
