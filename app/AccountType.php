<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountType
 * @package App
 */
class AccountType extends Model
{
    use SoftDeletes;
}
