<?php

namespace ApiContas\Presenters;

use ApiContas\Transformers\BillsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillsPresenter
 *
 * @package namespace ApiContas\Presenters;
 */
class BillsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillsTransformer();
    }
}
