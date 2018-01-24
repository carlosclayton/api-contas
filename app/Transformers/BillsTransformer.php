<?php

namespace ApiContas\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use ApiContas\Models\Bills;

/**
 * Class BillsTransformer
 * @package namespace ApiContas\Transformers;
 */
class BillsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Bills entity
     * @param \Bills $model
     *
     * @return array
     */
    public function transform(Bills $model)
    {
        return [
            'id'         => (int) $model->id,
            'name' =>$model->name,
            'value' =>$model->value,
            'done' =>$model->done,
            'created_at' => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'),
            'updated_at' => $model->updated_at
        ];
    }
}
