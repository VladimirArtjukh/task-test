<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2023 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * @param  array  $request
     *
     * @return mixed
     */
    public function save(array $request);
}
