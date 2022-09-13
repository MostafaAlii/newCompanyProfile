<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Page extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'pages';
    protected $guarded = [];
    public $timestamps = true;

    public function getImagePathAttribute() {
        return asset('uploads/website/' . $this->image);
    }

    public function status() {
        return $this->status ? 'فعــال' : 'غير فعــال';
    }
}