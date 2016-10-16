<?php namespace Anomaly\SocialModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class SocialModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SocialModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon providers.
     *
     * @var array
     */
    protected $providers = [
        'Laravel\Socialite\SocialiteServiceProvider',
    ];
}
