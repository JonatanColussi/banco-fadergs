<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 * @package App
 */
class Agency extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
