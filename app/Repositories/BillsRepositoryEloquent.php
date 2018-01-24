<?php

namespace ApiContas\Repositories;

use ApiContas\Presenters\BillsPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiContas\Repositories\BillsRepository;
use ApiContas\Models\Bills;
use ApiContas\Validators\BillsValidator;

/**
 * Class BillsRepositoryEloquent
 * @package namespace ApiContas\Repositories;
 */
class BillsRepositoryEloquent extends BaseRepository implements BillsRepository
{
   protected $fieldSearchable = [
        'name' => 'like',
        'id' => '='
   ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bills::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BillsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return BillsPresenter::class;
    }
}
