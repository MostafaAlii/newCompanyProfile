<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model {
    use HasFactory;
    protected $table = 'settings';
    protected $guarded = [];
    public $timestamps = true;
    public function getImagePathAttribute() {
        return asset('uploads/setting_images/');
    }
}
