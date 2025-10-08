<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'new'       => 'Yangi buyurtma',
        'rejected'  => 'Bekor Qilingan',
        'completed' => 'Tugallangan',
    ];

    protected $fillable = [
        'total_amount',
        'phone',
        'status',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orderOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
