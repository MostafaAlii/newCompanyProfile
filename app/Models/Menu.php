<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Menu extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'menus';
    protected $guarded = [];
    public $timestamps = true;
}
