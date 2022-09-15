<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class MenuInfo extends Model {
    use HasFactory;
    protected $table = 'menu_infos';
    protected $primaryKey = 'menu_id';
    protected $guarded = [];
    public $timestamps = true;

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}