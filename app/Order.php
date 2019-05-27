<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'status','transaction_id', 'boleto_url'
    ];

    public function statusOrder($id)
    {

    	$order = $this->find($id);
    	if ($order->status == 'paid') {
    		return 'Pago';
    	}
    }

    public function total($id)
    {
    	$subtotal = OrderItem::where('order_id', $id)->sum('value');
    	$discount = OrderItem::where('order_id', $id)->sum('discount');
    	$total = $subtotal-$discount;
    	return $total;
    }

    public function items()
    {
    	return $this->hasMany('App\OrderItem');
    }
}
