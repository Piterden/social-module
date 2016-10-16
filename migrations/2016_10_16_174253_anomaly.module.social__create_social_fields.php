<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSocialCreateSocialFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleSocialCreateSocialFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id'        => 'anomaly.field_type.text',
        'provider'      => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'   => 'extensions',
                'search' => 'anomaly.module.social::provider.*',
            ],
        ],
        'user'          => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
        'access_token'  => 'anomaly.field_type.text',
        'refresh_token' => 'anomaly.field_type.text',
        'secret'        => 'anomaly.field_type.text',
        'expires_at'    => 'anomaly.field_type.datetime',
    ];

}
