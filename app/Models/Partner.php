<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Partner extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'partners';
    protected $guarded = [];
    public $timestamps = true;

    public function getImagePathAttribute() {
        return asset('uploads/partner_images/' . $this->image);
    }

    public function status() {
        return $this->status ? 'فعــال' : 'غير فعــال';
    }
}