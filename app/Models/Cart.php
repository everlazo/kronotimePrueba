<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property int $id
 * @property float $discount
 * @property float $total
 * @property float $subtotal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Item[] $items
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'carts';

	protected $casts = [
		'discount' => 'float',
		'total' => 'float',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'discount',
		'total',
		'subtotal'
	];

	public $rules = [
		'total' => 'required',
	];
	
	public function items()
	{
		return $this->hasMany(Item::class, 'id_cart');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'id_cart');
	}
}
