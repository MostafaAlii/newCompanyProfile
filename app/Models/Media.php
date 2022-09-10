<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Media extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'media';
    protected $guarded = [];
    public $timestamps = true;

    public function mediable(): MorphTo {
        return $this->morphTo();
    }
}
