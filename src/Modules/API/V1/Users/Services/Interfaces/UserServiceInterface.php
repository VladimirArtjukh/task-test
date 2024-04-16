<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Services\Interfaces;


interface UserServiceInterface
{
    /**
     * @param array $request
     * @return mixed
     */
    public function save(array $request);

}
