<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
class Media extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'media';
}
