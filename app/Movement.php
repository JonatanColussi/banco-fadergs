<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movement
 * @package App
 */
class Movement extends Model
{
    /**
     * @var array
     */
    protected $dates = ['date'];

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(MovementType::class, 'movement_type_id')->withTrashed();;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
