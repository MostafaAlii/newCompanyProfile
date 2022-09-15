<?php

namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SubMenu extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'sub_menus';
    protected $guarded = [];
    public function menu():BelongsTo {
        return $this->belongsTo(Menu::class);
    }

    /** get active menu where status 1 */
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    /** get menu with parent menu */
    public function scopeWithMenu($query) {
        return $query->with('menu');
    }

    //* get menu with parent menu and active */
    public function scopeWithMenuActive($query) {
        return $query->withMenu()->active();
    }

    public function scopeWithMenuId($query, $menu_id) {
        return $query->withMenu()->where('menu_id', $menu_id);
    }

    public function status () {
        switch ($this->status) {
            case 0:
                return '<span class="badge badge-danger">غير فعال</span>';
                break;
            case 1:
                return '<span class="badge badge-success">فعال</span>';
                break;
            default:
                return '<span class="badge badge-danger">غير فعال</span>';
                break;
        }
    }
}
