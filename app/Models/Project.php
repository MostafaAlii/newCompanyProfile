<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Cviebrock\EloquentSluggable\Sluggable;
class Project extends Model {
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'projects';
    protected $guarded = [];
    public $timestamps = true;

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function status() {
        return $this->status ? 'فعــال' : 'غير فعــال';
    }

    public function firstMedia() {
        return $this->MorphOne(Media::class, 'mediable')->orderBy('file_sort', 'asc');
    }

    public function media() {
        return $this->MorphMany(Media::class, 'mediable');
    }
}
