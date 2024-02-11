<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string $name
 * @property string $document
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $department
 * @property string $city
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';

	protected $fillable = [
		'name',
		'document',
		'email',
		'address',
		'phone',
		'department',
		'city'
	];

	public $rules = [
		'name' => 'required|alpha',
		'email' => 'required|email',
		'phone' => 'required|numeric',
	];
	
	public function orders()
	{
		return $this->hasMany(Order::class, 'id_customer');
	}
}
