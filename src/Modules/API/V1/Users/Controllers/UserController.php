<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Controllers;

use Modules\API\V1\Users\Requests\SaveRequest;
use Modules\API\V1\Users\Services\Interfaces\UserServiceInterface;

class UserController extends BaseController
{
    /**
     * @var UserServiceInterface
     */
    private UserServiceInterface $service;

    /**
     * @param  UserServiceInterface  $service
     */
    public function __construct(UserServiceInterface $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * @param SaveRequest $request
     * @return mixed
     */
    public function save(SaveRequest $request)
    {
        return $this->service->save($request->all());
    }

}
