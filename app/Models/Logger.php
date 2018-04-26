<?php

namespace App\Models;

use App\Scopes\OrderByScope;
use App\Models\EloquentModel;

class Logger extends EloquentModel
{
    /**
     * Disable Timestamps
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';

    /**
     * Primary Key of the Table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public static function getLogTypes()
    {
        return ['critical', 'success', 'failure', 'warning', 'general'];
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByScope('timestamp'));
    }
}
