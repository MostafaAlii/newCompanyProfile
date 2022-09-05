<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;
class Category extends Model {
    use HasFactory, SoftDeletes, Sluggable, SearchableTrait;
    protected $table = 'categories';
    protected $guarded = [];
    public $timestamps = true;

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'categories.name' => 10,
        ]
    ];

    public function projects() {
        return $this->hasMany(Project::class);    
    }
}
