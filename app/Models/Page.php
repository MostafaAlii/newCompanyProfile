<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Page extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'pages';
    protected $guarded = [];
    public $timestamps = true;

    // get Page where status = 1 and sorting = 1 (primary page)
    public function scopePrimary($query) {
        return $query->whereStatus(1)->whereSorting(1)->first();
    }



    public function status() {
        return $this->status ? 'فعــال' : 'غير فعــال';
    }
}