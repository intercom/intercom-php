# intercom-php

A Guzzle 3-based client for the Intercom API (https://api.intercom.io).

[API Documentation](https://api.intercom.io/docs)

[Guzzle Documentation](http://guzzle3.readthedocs.org)

## Installation

The API client can be installed via [Composer](https://github.com/composer/composer). When a public release is available it can be added to the [Packagist](https://packagist.org/) repository. For now you'll have to add the following to a composer.json file in the project root:

```js
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/intercom/intercom-php"
        }
    ],
    "require": {
        "intercom/intercom-api-client": "dev-master"
    }
}
```

Once the composer.json file is created you can run `composer install` for the initial package install and `composer update` to updated to the latest version of the API client, which is linked to the `master` branch.


## Basic Usage

Remember to include the Composer autoloader in your application:

```php
<?php
require_once 'vendor/autoload.php';

// Application code...
?>
```

### Local Testing

By default the service description files point at the live API. For testing you can edit the `url` value in `vendor/intercom/intercom-api-client/src/intercom/Service/config/intercom_v3.json` after running a composer install/update

### Resources

The API supports:

    https://api.intercom.io/users
    https://api.intercom.io/tags

### Examples

#### Creating an API Client

```php
use Intercom\IntercomBasicAuthClient;

$intercom = IntercomBasicAuthClient::factory([
    'app_id' => 'YOUR_APP_ID',
    'api_key' => 'YOUR_API_KEY'
]);
```

#### Creating or Updating a user
```php
$user_data = [
    'email' => 'testuser@intercom.io',
    'last_request_at' => time(),
    'custom_data' => [
        'projects_delivered' => 12,
    ]
]

try {
    $user = $intercom->createUser($user_data);
} catch (ServerErrorResponseException $e) {
    // Handle the error appropriately. Simple example is below
    $request = $e->getRequest();
    $url = $request->getUrl();
    $params = serialize($request->getParams()->toArray());
    error_log('[API SERVER ERROR] Status Code: {$url} | Body: {$params}');

    $response = $e->getResponse();
    $code = $response->getStatusCode();
    $body = $response->getBody();
    error_log('[API SERVER ERROR] Status Code: {$code} | Body: {$body}');

} catch (ClientErrorResponseException $e) {
    // Handle the error
}

// Get some user data
$user->getCustomData();
/*    array (
 *        'projects_delivered' => 12,
 *    )
 */
```

#### Fetching conversations / unread conversations

#####
```php
    try {
        $conversations = $intercom->getUserConversations(['email' => 'testuser@intercom.io']);
        // $unread_conversations = $intercom->getUnreadUserConversations(['email' => 'testuser@intercom.io']);

        foreach ($conversations as $id => $conversation) {
            $conversation_lastcomment = $conversation->getLatestUserVisibleComment();
            echo $conversation_lastcomment['body'];
        }
    } catch (ServerErrorResponseException $e) {
        // Handle errors
    }
```
