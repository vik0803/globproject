<?php

namespace GlobProject\Presenters;

use GlobProject\Transformers\ProjectFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectFilePresenter
 *
 * @package namespace GlobProject\Presenters;
 */
class ProjectFilePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectFileTransformer();
    }
}
