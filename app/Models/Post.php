<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory ;

    protected $fillable = [
        'title','content','book_id'
    ];

    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }
 

}
