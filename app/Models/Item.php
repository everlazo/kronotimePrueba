<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * 
 * @property int $id
 * @property float $sale_price
 * @property float $original_price
 * @property int $units
 * @property float $discount
 * @property int $id_product
 * @property int $id_cart
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Cart $cart
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'items';

	protected $casts = [
		'sale_price' => 'float',
		'original_price' => 'float',
		'units' => 'int',
		'discount' => 'float',
		'id_product' => 'int',
		'id_cart' => 'int'
	];

	protected $fillable = [
		'sale_price',
		'original_price',
		'units',
		'discount',
		'id_product',
		'id_cart'
	];

	public $rules = [
		'sale_price' => 'required',
		'units' => 'required|numeric',
		'id_product' => 'required|numeric',
		'id_cart' => 'required|numeric',
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'id_product');
	}

	public function cart()
	{
		return $this->belongsTo(Cart::class, 'id_cart');
	}
}
