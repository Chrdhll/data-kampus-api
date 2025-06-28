<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kampus extends Model{
    protected $table = "campus";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = ['id', 'namaKampus', 'alamat', 'noTelp', 'kategori', 'lat', 'lng', 'jurusan'];

    // public $timestamps = false;
}