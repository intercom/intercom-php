# Intercom PHP Library

[![fern shield](https://img.shields.io/badge/%F0%9F%8C%BF-Built%20with%20Fern-brightgreen)](https://buildwithfern.com?utm_source=github&utm_medium=github&utm_campaign=readme&utm_source=https%3A%2F%2Fgithub.com%2Fintercom%2Fintercom-php)
[![php shield](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/intercom/intercom-php)

The Intercom PHP library provides convenient access to the Intercom API from PHP.

## Installation

```sh
composer require intercom/intercom-php
```

## Clients

Initialize your client using your access token:

```php
use Intercom\IntercomClient;

$client = new IntercomClient('<insert_token_here>');
```

> If you already have an access token you can find it [here](https://app.intercom.com/a/apps/_/developer-hub). If you want to create or learn more about access tokens then you can find more info [here](https://developers.intercom.com/building-apps/docs/authorization#section-access-tokens).
>
> If you are building a third party application you can get your OAuth token by [setting-up-oauth](https://developers.intercom.com/building-apps/docs/authorization#section-oauth) for Intercom.

For most use cases the code snippet above should suffice. However, if needed, you can customize the Intercom client as follows:

### Add custom headers

```php
use Intercom\IntercomClient;

$client = new IntercomClient(
    '<insert_token_here>',
    null,
    ['Custom-Header' => 'value']
);
```

### Use a custom HTTP client

This client needs to implement `Psr\Http\Client\ClientInterface`

```php
$client->setHttpClient($yourHttpClient);
```

### Use a custom request factory

This factory needs to implement `Http\Message\RequestFactory`

```php
$client->setRequestFactory($yourRequestFactory);
```

### Use a custom URI factory

This factory needs to implement `Http\Message\UriFactory`

```php
$client->setUriFactory($yourUriFactory); 
```

## API Versions

This library is intended to work with any API Version. By default, the version that you have configured for your App in the [Developer Hub](https://developers.intercom.com/) will be used. However, you can overwrite that version for a single request or for all the requests using this library by including the `Intercom-Version` header when initializing the client as follows:

```php
use Intercom\IntercomClient;

$client = new IntercomClient(
    '<insert_token_here>',
    null,
    ['Intercom-Version' => '1.1']
);
```

For more information about API Versioning, please check the [API Versioning Documentation](https://developers.intercom.com/building-apps/docs/api-versioning) and the [API changelog](https://developers.intercom.com/building-apps/docs/api-changelog).

**Important**: Not all the resources supported by this API are supported by all API versions. See the notes below or the [API Reference](https://developers.intercom.com/intercom-api-reference/reference) for more information about the resources supported by each API version.

## Contacts

This resource is only available in API Versions 2.0 and above

```php
/** Create a contact */
$client->contacts->create([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
    'type' => 'user',
]);

/** Update a contact */
$client->contacts->update('570680a8a1bcbca8a90001b9', [
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
]);

/** Permanently delete a contact */
$client->contacts->deleteContact('570680a8a1bcbca8a90001b9');

/** Get a contact by ID */
$client->contacts->getContact('570680a8a1bcbca8a90001b9');

/** Search for contacts */
$query = ['field' => 'name', 'operator' => '=', 'value' => 'Alice'];
$client->contacts->search([
    'pagination' => ['per_page' => 10],
    'query' => $query,
    'sort' => ['field' => 'name', 'order' => 'ascending'],
]);

/** Get next page of conversation search results */
$client->contacts->nextSearch($query, $response->pages);

/** List all contacts */
$client->contacts->getContacts([]);
```

## Users

This resource is only available in API Versions 1.0 to 1.4. Newer versions use the [Contacts](#contacts) resource instead.

```php
/** Create a user */
$client->users->create([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
]);

/**
 * Update a user (Note: This method is an alias to the create method. In practice you
 * can use create to update users if you wish)
 */
$client->users->update([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
]);

/** Archive a user by ID (i.e. soft delete) */
$client->users->archiveUser('570680a8a1bcbca8a90001b9');

/** Permanently delete a user */
$client->users->permanentlyDeleteUser('570680a8a1bcbca8a90001b9');

/** For more on the difference between archive and permanently deleting a user please see https://developers.intercom.com/reference#archive-a-user. */

/** Get a user by ID */
$client->users->getUser('570680a8a1bcbca8a90001b9');

/** Add companies to a user */
$client->users->create([
    'companies' => [
        [
            'company_id' => '3',
        ]
    ],
    'email' => 'test@example.com',
]);

/** Remove companies from a user */
$client->users->create([
    'companies' => [
        [
            'company_id' => '3',
            'remove' => true,
        ]
    ],
    'email' => 'test@example.com',
]);

/** Find a single user by email */
$client->users->getUsers([
    'email' => 'bob@example.com',
]);

/** List all users up to 10k records */
$client->users->getUsers([]);

/**
 * List all users (even above 10k records)
 * The result object contains an array of your user objects and a scroll_param which you can then
 * use to request the next 100 users. Note that the scroll parameter will time out after one minute
 * and you will need to make a new request
 */
$client->users->scrollUsers();
```

See [here](https://github.com/intercom/intercom-php#scroll) for more info on using the scroll parameter

## Leads

This resource is only available in API Versions 1.0 to 1.4. Newer versions use the [Contacts](#contacts) resource instead.

```php
/**
 * Create a lead
 * See more options here: https://developers.intercom.io/reference#create-lead
 */
$client->leads->create([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
]);

/**
 * Update a lead (Note: This method is an alias to the create method.
 * In practice you can use create to update leads if you wish)
 */
$client->leads->update([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'email' => 'test@example.com',
]);

/**
 * List leads
 * See more options here: https://developers.intercom.io/reference#list-leads
 */
$client->leads->getLeads([]);

/** Find a lead by ID */
$client->leads->getLead('570680a8a1bcbca8a90000a9');

/** Delete a lead by ID */
$client->leads->deleteLead('570680a8a1bcbca8a90000a9');

/** Convert a Lead to a User */
$client->leads->convertLead([
    'contact' => [
        'user_id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
    ],
    'user' => [
        'email' => 'winstonsmith@truth.org',
    ],
]);

/**
 * List all leads (even above 10k records)
 * The result object contains an array of your contacts objects and a scroll_param which you can then
 * use to request the next 100 leads. Note that the scroll parameter will time out after one minute
 * and you will need to make a new request
 */
$client->leads->scrollLeads();
```

See [here](https://github.com/intercom/intercom-php#scroll) for more info on using the scroll parameter

## Visitors

Retrieve `user_id` of a visitor via [the JavaScript API](https://developers.intercom.com/docs/intercom-javascript#section-intercomgetvisitorid)

```php
/** Update a visitor */
$client->visitors->update([
    'custom_attributes' => ['nickname' => 'Teddy'],
    'user_id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
]);

/** Find a visitor by ID */
$client->visitors->getVisitor('570680a8a1bcbca8a90000a9');

/** Find a visitor by User ID */
$client->visitors->getVisitor('', [
    'user_id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
]);

/** Delete a visitor by ID */
$client->visitors->deleteVisitor('570680a8a1bcbca8a90000a9');

/** Convert a Visitor to a Lead */
$client->visitors->convertVisitor([
    'type' => 'lead',
    'visitor' => [
        'user_id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
    ],
]);

/** Convert a Visitor to a User */
$client->visitors->convertVisitor([
    'type' => 'user',
    'user' => [
        'email' => 'winstonsmith@truth.org',
    ],
    'visitor' => [
        'user_id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
    ],
]);
```

## Tags

```php
/** List tags */
$client->tags->getTags();

/**
 * Tag users
 * See more options here: https://developers.intercom.io/reference#tag-or-untag-users-companies-leads-contacts
 */
$client->tags->tag([
    'name' => 'Test',
    'users' => [
        ['id' => '1234'],
    ],
]);
```

## Segments

```php
/** List Segments */
$client->segments->getSegments();

/** View a segment */
$client->segments->getSegment('58a707924f6651b07b94376c');

/** View a segment with count */
$client->segments->getSegment('59c124f770e00fd819b9ce81', [
    'include_count' => 'true',
]);
```

## Events

```php
/** Create an event */
$client->events->create([
    'created_at' => 1391691571,
    'email' => 'test@example.com',
    'event_name' => 'testing',
    'metadata' => [
        'order_date' => 1392036272,
        'stripe_invoice' => 'inv_3434343434',
    ],
]);

/** View events for a user */
$client->events->getEvents(['email' => 'bob@example.com']);
```

## Companies

```php
/** Create a company */
$client->companies->create([
    'company_id' => '3',
    'name' => 'foocorp',
]);

/**
 * Update a company
 */
$client->companies->update([
    'id' => '3',
    'name' => 'foocorp',
]);

/** Create or update a company with custom attributes. */
$client->companies->update([
    'custom_attributes' => [
        'short_name' => 'ABC Inc.',
    ],
    'id' => '3',
    'name' => 'foocorp',
]);

/** List Companies */
$client->companies->getCompanies([]);

/** Get a company by ID */
$client->companies->getCompany('531ee472cce572a6ec000006');

/** List users belonging to a company by ID */
$client->companies->getCompanyUsers('531ee472cce572a6ec000006');

/** List users belonging to a company by company_id */
$client->companies->getCompanies([
    'company_id' => '3',
    'type' => 'user',
]);

/**
 * Add companies to a contact with IDs
 * First parameter is contact ID, second is company ID
 */
$client->companies->attachContact('570680a8a1bcbca8a90001b9', '531ee472cce572a6ec000006');

/**
 * Detach company from contact
 * First parameter is contact ID, second is company ID
 */
$client->companies->detachContact('570680a8a1bcbca8a90001b9', '531ee472cce572a6ec000006');

```

## Admins

```php
/** List admins */
$client->admins->getAdmins();
```

## Messages

```php
/**
 * Send a message from an admin to a user
 * See more options here: https://developers.intercom.io/reference#conversations
 */
$client->messages->create([
    'body' => 'Ponies, cute small horses or something more sinister?',
    'from' => [
        'id' => '1234',
        'type' => 'admin',
    ],
    'message_type' => 'inapp',
    'subject' => 'Hey',
    'to' => [
        'email' => 'bob@example.com',
        'type' => 'user',
    ],
]);
```

## Conversations

```php
/**
 * Create a conversation
 * See more options here: https://developers.intercom.com/intercom-api-reference/reference#create-a-conversation
 */
$client->conversations->create([
    'body' => 'Hello.',
    'from' => [
        'id' => '1234',
        'type' => 'user',
    ],
]);

/**
 * List conversations for an admin
 * See more options here: https://developers.intercom.io/reference#list-conversations
 */
$client->conversations->getConversations([
    'admin_id' => '25610',
    'type' => 'admin',
]);

/** Get a single conversation */
$client->conversations->getConversation('1234');

/** Get a single conversation with plaintext comments */
$client->conversations->getConversation('1234', [
    'display_as' => 'plaintext',
]);

/** Search for conversations (API version >= 2.0) */
$query = ['field' => 'updated_at', 'operator' => '>', 'value' => '1560436784'];
$client->conversations->search([
    'pagination' => ['per_page' => 10],
    'query' => $query,
    'sort' => ['field' => 'updated_at', 'order' => 'ascending'],
]);

/** Get next page of conversation search results (API version >= 2.0) */
$client->conversations->nextSearch($query, $response->pages);

/**
 * Reply to a conversation
 * See more options here: https://developers.intercom.io/reference#replying-to-a-conversation
 */
$client->conversations->replyToConversation('5678', [
    'body' => 'Thanks :)',
    'email' => 'test@example.com',
    'message_type' => 'comment',
    'type' => 'user',
]);

/**
 * Reply to a user's last conversation
 * See more options here: https://developers.intercom.com/reference#replying-to-users-last-conversation
 */
$client->conversations->replyToLastConversation([
    'body' => 'Thanks :)',
    'email' => 'test@example.com',
    'message_type' => 'comment',
    'type' => 'user',
]);

/**
 * Mark a conversation as read
 * See API documentation here: https://developers.intercom.io/reference#marking-a-conversation-as-read
 */
$client->conversations->markConversationAsRead('7890');
```

## Counts

```php
/**
 * List counts
 * See more options here: https://developers.intercom.io/reference#getting-counts
 */
$client->counts->getCounts([]);
```

## Notes

```php
/** Create a note */
$client->notes->create([
    'admin_id' => '21',
    'body' => 'Text for my note',
    'user' => [
        'id' => '5310d8e8598c9a0b24000005',
    ]
]);

/** List notes for a user */
$client->notes->getNotes([
  'user_id' => '25',
]);

/** Get a single Note by id */
$client->notes->getNote('42');
```

## Teams

```php
/** List teams */
$client->teams->getTeams();

/** Get a single Team by id */
$client->teams->getTeam('1188');
```

## Rate Limits

Rate limit info is passed via the rate limit headers.
You can access this information as follows:

```php
$rate_limit = $client->getRateLimitDetails();
print("{$rate_limit['remaining']} {$rate_limit['limit']} \n");
print_r($rate_limit['reset_at']->format(DateTime::ISO8601));
```

For more info on rate limits and these headers please see the [API reference docs](https://developers.intercom.com/reference#rate-limiting)

## Pagination

List endpoints return a `Pager<T>` which lets you loop over all items and the SDK will automatically make multiple HTTP requests for you.

```php
use Intercom\IntercomClient;

$client = new IntercomClient(
    '<token>',
    ['baseUrl' => 'https://api.example.com'],
);

$items = $client->articles->list(['limit' => 10]);

foreach ($items as $item) {
    var_dump($item);
}
```
You can also iterate page-by-page:

```php
foreach ($items->getPages() as $page) {
    foreach ($page->getItems() as $pageItem) {
        var_dump($pageItem);
    }
}
```


## Scroll

The first time you use the scroll API you can just send a simple GET request.
This will return up to 100 records. If you have more than 100 you will need to make another call.
To do this you need to use to scroll_parameter returned in the original response.
Use this for subsequent responses until you get an empty array of records.
This means there are no records and the scroll timer will be reset.
For more information on scroll please see the [API reference](https://developers.intercom.com/reference#iterating-over-all-users)
Here is an example of a simple way to use the scroll for multiple calls:

```php
require "vendor/autoload.php";

use Intercom\IntercomClient;

$client = new IntercomClient(getenv('AT'), null);
$resp = $client->users->scrollUsers([]);
$count = 1;
echo "PAGE $count: " . sizeof($resp->users);
echo "\n";
while (!empty($resp->scroll_param) && sizeof($resp->users) > 0) {
    $count = ++$count;
    $resp = $client->users->scrollUsers(["scroll_param" => $resp->scroll_param]);
    echo "PAGE $count: " . sizeof($resp->users);
    echo "\n";
}
```

## Exceptions

Exceptions are handled by HTTPlug. Every exception thrown implements `Http\Client\Exception`. See the [http client exceptions](http://docs.php-http.org/en/latest/httplug/exceptions.html) and the [client and server errors](http://docs.php-http.org/en/latest/plugins/error.html).
The Intercom API may return an unsuccessful HTTP response, for example when a resource is not found (404).
If you want to catch errors you can wrap your API call into a try/catch block:

```php
try {
    $user = $client->users->getUser('570680a8a1bcbca8a90001b9');
} catch(Http\Client\Exception $e) {
    if ($e->getCode() == '404') {
        // Handle 404 error
        return;
    } else {
        throw $e;
    }
}
```

## Pull Requests

- **Add tests!** Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour**. Make sure the README and any other
  relevant documentation are kept up-to-date.

- **Create topic branches**. Don't ask us to pull from your master branch.

- **One pull request per feature**. If you want to do more than one thing, send
  multiple pull requests.

- **Send coherent history**. Make sure each individual commit in your pull
  request is meaningful. If you had to make multiple intermediate commits while
  developing, please squash them before sending them to us.

## Requirements

This SDK requires PHP ^8.1.

## Usage

Instantiate and use the client with the following:

```php
<?php

namespace Example;

use Intercom\IntercomClient;
use Intercom\Articles\Requests\CreateArticleRequest;
use Intercom\Articles\Types\CreateArticleRequestState;

$client = new IntercomClient(
    token: '<token>',
);
$client->articles->create(
    new CreateArticleRequest([
        'title' => 'Thanks for everything',
        'description' => 'Description of the Article',
        'body' => 'Body of the Article',
        'authorId' => 1295,
        'state' => CreateArticleRequestState::Published->value,
    ]),
);

```

## Exception Handling

When the API returns a non-success status code (4xx or 5xx response), an exception will be thrown.

```php
use Intercom\Exceptions\IntercomApiException;
use Intercom\Exceptions\IntercomException;

try {
    $response = $client->articles->create(...);
} catch (IntercomApiException $e) {
    echo 'API Exception occurred: ' . $e->getMessage() . "\n";
    echo 'Status Code: ' . $e->getCode() . "\n";
    echo 'Response Body: ' . $e->getBody() . "\n";
    // Optionally, rethrow the exception or handle accordingly.
}
```

## Advanced

### Custom Client

This SDK is built to work with any HTTP client that implements Guzzle's `ClientInterface`.
By default, if no client is provided, the SDK will use Guzzle's default HTTP client.
However, you can pass your own client that adheres to `ClientInterface`:

```php
use Intercom\IntercomClient;

// Create a custom Guzzle client with specific configuration.
$customClient = new \GuzzleHttp\Client([
    'timeout' => 5.0,
]);

// Pass the custom client when creating an instance of the class.
$client = new IntercomClient(options: [
    'client' => $customClient
]);

// You can also utilize the same technique to leverage advanced customizations to the client such as adding middleware
$handlerStack = \GuzzleHttp\HandlerStack::create();
$handlerStack->push(MyCustomMiddleware::create());
$customClient = new \GuzzleHttp\Client(['handler' => $handlerStack]);

// Pass the custom client when creating an instance of the class.
$client = new IntercomClient(options: [
    'client' => $customClient
]);
```

### Retries

The SDK is instrumented with automatic retries with exponential backoff. A request will be retried as long
as the request is deemed retryable and the number of retry attempts has not grown larger than the configured
retry limit (default: 2).

A request is deemed retryable when any of the following HTTP status codes is returned:

- [408](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/408) (Timeout)
- [429](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/429) (Too Many Requests)
- [5XX](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/500) (Internal Server Errors)

Use the `maxRetries` request option to configure this behavior.

```php
$response = $client->articles->create(
    ...,
    options: [
        'maxRetries' => 0 // Override maxRetries at the request level
    ]
);
```

### Timeouts

The SDK defaults to a 30 second timeout. Use the `timeout` option to configure this behavior.

```php
$response = $client->articles->create(
    ...,
    options: [
        'timeout' => 3.0 // Override timeout to 3 seconds
    ]
);
```

## Contributing

While we value open-source contributions to this SDK, this library is generated programmatically.
Additions made directly to this library would have to be moved over to our generation code,
otherwise they would be overwritten upon the next generated release. Feel free to open a PR as
a proof of concept, but know that we will not be able to merge it as-is. We suggest opening
an issue first to discuss with us!

On the other hand, contributions to the README are always very welcome!
