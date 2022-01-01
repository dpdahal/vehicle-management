<?php

namespace App\Models\Order;
use App\Models\User\User;
use App\Models\Vehicle\Vehicle;
use App\Models\TripPage\TripPage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicleId',
        'ordered_date',
        'last_updated',
        'notes',
        'tripId',//destination from to and cost will be find from there
        'status',
        'payment_status'
    ];

    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function customer(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'customer_id', 'id');
    // }

    /**
     * Get the vehicle that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(TripPage::class, 'trip_id', 'id');
    }

    public function customers() {
       return $this->belongsTo(User::class, 'customer_id', 'id');
    }

}
