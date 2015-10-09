?php

namespace GlobProject\Presenters;

use GlobProject\Transformers\ProjectTasksTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectTasksPresenter
 *
 * @package namespace GlobProject\Presenters;
 */
class ProjectTasksPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectTasksTransformer();
    }
}
