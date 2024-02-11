<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingMethod
 * 
 * @property int $id
 * @property string $name
 * @property float $monetary_value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class ShippingMethod extends Model
{
	protected $table = 'shipping_methods';

	protected $casts = [
		'monetary_value' => 'float'
	];

	protected $fillable = [
		'name',
		'monetary_value'
	];

	public $rules = [
		'name' => 'required',
		'monetary_value' => 'required',
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'id_shipping_method');
	}
}
