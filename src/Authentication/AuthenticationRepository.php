<?php namespace Anomaly\SocialModule\Authentication;

use Anomaly\SocialModule\Authentication\Contract\AuthenticationRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class AuthenticationRepository extends EntryRepository implements AuthenticationRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var AuthenticationModel
     */
    protected $model;

    /**
     * Create a new AuthenticationRepository instance.
     *
     * @param AuthenticationModel $model
     */
    public function __construct(AuthenticationModel $model)
    {
        $this->model = $model;
    }
}
