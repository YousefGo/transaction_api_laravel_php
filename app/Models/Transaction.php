<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;
class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['category_id', 'transaction_date', 'amount', 'description','user_id'];
    protected $casts =['transaction_date'=>'date:m/d/Y'];



            public function category()
            {
                return $this->belongsTo(Category::class);
            }


    public function setAmountAttribute($value){
      $this->attributes['amount']=$value*100;
    }

    public function setTransactionDateAttribute($value)
    {
        $this->attributes['transaction_date'] = Carbon::createFromFormat('m/d/Y', $value)
            ->format('Y-m-d');
    }

}
