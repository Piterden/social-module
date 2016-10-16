<?php namespace Anomaly\SocialModule\Http\Controller;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Contracts\Config\Repository;
use Laravel\Socialite\Contracts\Factory;

/**
 * Class SocialController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SocialController extends PublicController
{

    /**
     * The Socialite factory.
     *
     * @var Factory
     */
    protected $socialite;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new SocialController instance.
     *
     * @param Factory $socialite
     * @param ExtensionCollection $extensions
     * @param Repository $config
     */
    public function __construct(Factory $socialite, ExtensionCollection $extensions, Repository $config)
    {
        parent::__construct();

        $this->config     = $config;
        $this->socialite  = $socialite;
        $this->extensions = $extensions;
    }


    /**
     * Return the login redirect.
     *
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login($provider)
    {
        if ($this->request->has('code')) {

            $user = $this->auth($provider);

            /* @var UserAuthenticator $authenticator */
            $authenticator = app(UserAuthenticator::class);

            $authenticator->login($user);

            return $this->redirect->to('admin/dashboard');
        }

        if ($extension = $this->extensions->find('anomaly.module.social::provider.' . $provider)) {
            return $extension->redirect();
        }

        $this->config->set(
            'services.' . $provider . '.redirect',
            $this->url->to('social/' . $provider . '/login')
        );

        return $this->socialite
            ->driver($provider)
            ->redirect();
    }

    /**
     * Authenticate the user.
     *
     * @param $provider
     */
    public function auth($provider)
    {
        if ($extension = $this->extensions->find('anomaly.module.social::provider.' . $provider)) {
            $user = $extension->user();
        }

        $user = $this->socialite
            ->driver($provider)
            ->user();

        /* @var UserRepositoryInterface $users */
        $users = app(UserRepositoryInterface::class);

        return $users->findByEmail($user->getEmail());
    }
}
