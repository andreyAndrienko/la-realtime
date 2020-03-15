<?php

return [

    'use' => 'production',

    'properties' => [
        'production' => [
            'host'            => env('RABBITMQ_HOST', 'rabbitmq'),
            'port'            => env('RABBITMQ_PORT', 5672),
            'username'        => env('RABBITMQ_LOGIN', 'guest'),
            'password'        => env('RABBITMQ_PASSWORD', 'guest'),
            'vhost'           => '/',
            'consumer_tag'    => 'consumer',
            'connect_options' => [
                'read_write_timeout' => 121,
                'heartbeat'          => 60,
                'ssl_protocol'       => null
            ],
            'ssl_options'     => [],

            'exchange'             => 'amq.topic',
            'exchange_type'        => 'topic',
            'exchange_passive'     => false,
            'exchange_durable'     => true,
            'exchange_auto_delete' => false,
            'exchange_internal'    => false,
            'exchange_nowait'      => false,
            'exchange_properties'  => [],

            'queue_force_declare' => false,
            'queue_passive'       => false,
            'queue_durable'       => true,
            'queue_exclusive'     => false,
            'queue_auto_delete'   => false,
            'queue_nowait'        => false,
            'queue_properties'    => [],

            'consumer_no_local'  => false,
            'consumer_no_ack'    => false,
            'consumer_exclusive' => false,
            'consumer_nowait'    => false,
            'timeout'            => 0,
            'persistent'         => true,
        ]
    ]
];
