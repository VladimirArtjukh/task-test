<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Services;

use Modules\API\V1\Users\Jobs\NotificationUserCreateJob;
use Modules\API\V1\Users\Jobs\UserCreateJob;
use Modules\API\V1\Users\Repositories\BaseRepository;
use Modules\API\V1\Users\Repositories\Interfaces\UserRepositoryInterface;
use Modules\API\V1\Users\Resources\SaveResource;
use Modules\API\V1\Users\Services\Interfaces\UserServiceInterface;

class UserService extends BaseRepository implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function save(array $request)
    {
        $countryData = json_decode($request['selectCountry']);
        $country = $countryData->name;
        $phone = $countryData->idd . $request['phone'];

        $saveUser = $this->repository->save($request);

        $this->saveUserCountry($saveUser, $country);

        $this->savePhoneBook($saveUser, $phone);

        $this->sendEmail($request['email']);

        $this->sendSMS($saveUser);

        return new SaveResource($saveUser);
    }

    /**
     * @param $model
     * @param $country
     * @return void
     */
    protected function saveUserCountry($model, $country)
    {
        $this->repository->saveUserCountry($model, ['country' => $country]);
    }

    /**
     * @param $model
     * @param $phone
     * @return void
     */
    protected function savePhoneBook($model, $phone)
    {
        $this->repository->savePhoneBook($model, ['phone' => $phone]);
    }

    /**
     * @param $email
     * @return void
     */
    protected function sendEmail($email)
    {
        dispatch (new UserCreateJob($email));
    }

    /**
     * @param $user
     * @return void
     */
    protected function sendSMS($user)
    {
        dispatch (new NotificationUserCreateJob($user));
    }
}
