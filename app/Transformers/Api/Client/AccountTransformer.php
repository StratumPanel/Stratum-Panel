<?php

namespace Stratum\Transformers\Api\Client;

use League\Fractal\TransformerAbstract;
use Stratum\Models\User;

/**
 * Class AccountTransformer.
 *
 * @package namespace Stratum\Transformers\Transformers\Api;
 */
class AccountTransformer extends TransformerAbstract
{
    /**
     * Transform the Client entity.
     *
     * @param \Stratum\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'admin'      => $model->root_admin,
            'name'       => $model->name,
            'email'      => $model->email,
            'language'   => $model->language,
            'created_at' => $model->created_at->diffForHumans(),
        ];
    }
}
