<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $stock_keeping_unit
 * @property float $price
 * @property float $compare_price
 * @property int $units
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'price' => 'float',
		'compare_price' => 'float',
		'units' => 'int'
	];

	protected $fillable = [
		'name',
		'stock_keeping_unit',
		'price',
		'compare_price',
		'units',
		'image',
		'id_category'
	];

	public $rules = [
		'name' => 'required|alpha',
		'stock_keeping_unit' => 'required',
		'price' => 'required',
		'id_category' => 'required|numeric',
    ];

	public function items()
	{
		return $this->hasMany(Item::class, 'id_product');
	}

	public function category()
	{
		return $this->belongsTo(Customer::class, 'id_category');
	}
}
