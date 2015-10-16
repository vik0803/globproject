<?php

namespace GlobProject\Presenters;

use GlobProject\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectNotePresenter
 *
 * @package namespace GlobProject\Presenters;
 */
class ProjectNotePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectNoteTransformer();
    }
}
