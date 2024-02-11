<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property string $number_order
 * @property int $id_customer
 * @property int $id_cart
 * @property int $id_payment_method
 * @property int $id_shipping_method
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Cart $cart
 * @property PaymentMethod $payment_method
 * @property ShippingMethod $shipping_method
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'id_customer' => 'int',
		'id_cart' => 'int',
		'id_payment_method' => 'int',
		'id_shipping_method' => 'int'
	];

	protected $fillable = [
		'number_order',
		'id_customer',
		'id_cart',
		'id_payment_method',
		'id_shipping_method'
	];

	public $rules = [
		'id_customer' => 'required|numeric',
        'id_cart' => 'required|numeric',
        'id_payment_method' => 'required|numeric',
        'id_shipping_method' => 'required|numeric',
	];
	
	public function customer()
	{
		return $this->belongsTo(Customer::class, 'id_customer');
	}

	public function cart()
	{
		return $this->belongsTo(Cart::class, 'id_cart');
	}

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class, 'id_payment_method');
	}

	public function shipping_method()
	{
		return $this->belongsTo(ShippingMethod::class, 'id_shipping_method');
	}
}
