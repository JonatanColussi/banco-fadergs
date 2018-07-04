<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * @package App
 */
class Account extends Model
{
    /**
     * @var array
     */
    protected $dates = ['start_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return mixed
     */
    public function accountType()
    {
        return $this->belongsTo(AccountType::class)->withTrashed();;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    /**
     * @param Movement $movement
     */
    public function updateLimit(Movement $movement)
    {
        if ($movement->type->type == 'D') {
            $this->decrement('limit', $movement->value);
        } else {
            $this->increment('limit', $movement->value);
        }
    }
}
