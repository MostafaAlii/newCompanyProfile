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
}
