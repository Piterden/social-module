<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSocialCreateAuthenticationsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleSocialCreateAuthenticationsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'authentications',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'str_id'       => [
            'required' => true,
            'unique'   => true,
        ],
        'provider'     => [
            'required' => true,
        ],
        'user'         => [
            'required' => true,
        ],
        'access_token' => [
            'required' => true,
        ],
        'refresh_token',
        'secret'       => [
            'required' => true,
        ],
        'expires_at',
    ];

}
