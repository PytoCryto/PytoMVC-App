<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderByScope implements Scope
{
    /**
     * Sort by these column(s), defaults to the primary key
     * 
     * @var array
     */
    private $orderByKeys;

    /**
     * Sort in either ascending or descending mode
     * 
     * @var string
     */
    private $criteria;

    /**
     * Description
     * 
     * @param  string|array|null $orderByKeys 
     * @param  string            $criteria 
     * @return void
     */
    public function __construct($orderByKeys = null, $criteria = 'desc')
    {
        $this->orderByKeys = $orderByKeys;
        $this->criteria = $criteria;
    }
    
    /**
     * Apply the scope to a given Eloquent query builder
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (is_array($this->orderByKeys)) {
            foreach ($this->orderByKeys as $key => $criteria) {
                if (empty($key)) {
                    list($key, $criteria) = [$criteria, $this->criteria];
                }

                $builder->orderBy($key, $criteria);
            }

            return;
        }

        $key = empty($this->orderByKeys) ? $model->getKeyName() : $this->orderByKeys;

        $builder->orderBy($key, $this->criteria);
    }
}
