<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['category_id', 'transaction_date', 'amount', 'description'];
    protected $casts =['transaction_date'=>'date:m/d/Y'];


          
            public function category() 
            {
                return $this->belongsTo(Category::class);
            }
      
    
}
