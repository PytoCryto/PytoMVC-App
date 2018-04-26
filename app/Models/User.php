<?php

namespace App\Models;

use PytoMVC\System\Auth\User as BaseUser;
#use Capsule;
#use PytoMVC\System\Database\Sluggable\SlugOptions;
#use PytoMVC\System\Database\Traits\HasSlug;
#use PytoMVC\System\Database\Traits\ValidatingTrait;
#use Sofa\Eloquence\Eloquence;
#use Sofa\Eloquence\Mappable;

class User extends BaseUser
{
    //use ValidatingTrait, HasSlug, Eloquence, Mappable;

    /**
     * Form validation rules
     *
     * @var array
     */
    protected $rules = [];

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
    protected $table = 'users';

    /**
     * Primary Key of the Table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username'];
}
