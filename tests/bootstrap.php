<?php

use Guzzle\Tests\GuzzleTestCase;

include __DIR__ . '/../vendor/autoload.php';

// Mocks path
$mock_basepath = __DIR__ . '/Mock/';
GuzzleTestCase::setMockBasePath($mock_basepath);

// Service Builder for tests
Guzzle\Tests\GuzzleTestCase::setServiceBuilder(
    Guzzle\Service\Builder\ServiceBuilder::factory(
        [
            'intercom.basicauth' => [
                'class' => 'Intercom.IntercomBasicAuthClient',
                'params' => [
                    'api_key' => $_SERVER['INTERCOM_API_KEY'],
                    'app_id' => $_SERVER['INTERCOM_APP_ID']
                ]
            ]
        ]
    )
);
