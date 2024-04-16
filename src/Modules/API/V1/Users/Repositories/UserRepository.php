<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Repositories;


use App\Models\User;
use Modules\API\V1\Users\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private User $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * @param string $email
     *
     * @return mixed
     */
    public function save(array $request)
    {
        return $this->model::create($request);
    }

    /**
     * @param $model
     * @param array $request
     * @return mixed
     */
    public function saveUserCountry($model, array $request)
    {
        return $model->userCountry()->create($request);
    }

    /**
     * @param $model
     * @param array $request
     * @return mixed
     */
    public function savePhoneBook($model, array $request)
    {
        return $model->phoneBook()->create($request);
    }
}
