<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->BelongsTo('App\User');

    }
    public function cartItems() {
        return $this->hasMany('App\CartItem');
    }
}
