<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Menu extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'menus';
    protected $guarded = [];
    public $timestamps = true;

    public function submenus() {
        return $this->hasMany(SubMenu::class);
    }

    public function scopeActiveMenu($query) {
        return $query->whereStatus(1)->whereNull('deleted_at');
    }

    public function menu_info() {
        return $this->hasOne(MenuInfo::class, 'menu_id', 'id')->withDefault();
    }
}
