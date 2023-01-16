<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

        //
        protected $fillable = [
            'bill_id','user_id','product_id',
        ];
        public function user()
        {
            return $this->belongsTo('App\User');
        }
        public function product()
        {
            return $this->belongsTo('App\Product');
        }
}
