<?php namespace Anomaly\SocialModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class SocialModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SocialModule extends Module
{

    /**
     * No control panel navigation.
     *
     * @var bool
     */
    protected $navigation = false;

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'example',
    ];
}
