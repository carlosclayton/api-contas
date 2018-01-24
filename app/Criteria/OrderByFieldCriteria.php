<?php

namespace ApiContas\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class OrderByFieldCriteria
 * @package namespace ApiContas\Criteria;
 */
class OrderByFieldCriteria implements CriteriaInterface
{
    private $name;
    private $order;
    /**
     * OrderByFieldCriteria constructor.
     */
    public function __construct($name, $order)
    {
        $this->name = $name;
        $this->order = $order;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->orderBy($this->name, $this->order);
    }
}
