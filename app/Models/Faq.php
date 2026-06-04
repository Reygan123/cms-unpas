<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'id_category',
        'question',
        'answer',
    ];    

    public function category()
    {
        return $this->belongsTo(Faq_category::class, 'id_category');
    }

}
