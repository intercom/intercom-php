# Intercom PHP Library

[![fern shield](https://img.shields.io/badge/%F0%9F%8C%BF-Built%20with%20Fern-brightgreen)](https://buildwithfern.com?utm_source=github&utm_medium=github&utm_campaign=readme&utm_source=https%3A%2F%2Fgithub.com%2Fintercom%2Fintercom-php)
[![php shield](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/intercom/intercom-php)

The Intercom PHP library provides convenient access to the Intercom APIs from PHP.

## Requirements

This SDK requires PHP ^8.1.

## Installation

```sh
composer require intercom/intercom-php
```

## Usage

Instantiate and use the client with the following:

```php
<?php

namespace Example;

use Intercom\IntercomClient;
use Intercom\AiContent\Requests\CreateContentImportSourceRequest;
use Intercom\AiContent\Types\CreateContentImportSourceRequestStatus;

$client = new IntercomClient(
    token: '<token>',
);
$client->aiContent->createContentImportSource(
    new CreateContentImportSourceRequest([
        'syncBehavior' => 'api',
        'status' => CreateContentImportSourceRequestStatus::Active->value,
        'url' => 'url',
    ]),
);

```

## Exception Handling

When the API returns a non-success status code (4xx or 5xx response), an exception will be thrown.

```php
use Intercom\Exceptions\IntercomApiException;
use Intercom\Exceptions\IntercomException;

try {
    $response = $client->aiContent->createContentImportSource(...);
} catch (IntercomApiException $e) {
    echo 'API Exception occurred: ' . $e->getMessage() . "\n";
    echo 'Status Code: ' . $e->getCode() . "\n";
    echo 'Response Body: ' . $e->getBody() . "\n";
    // Optionally, rethrow the exception or handle accordingly.
}
```

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

## Legacy SDK

While the new SDK has a lot of improvements, we at Intercom understand that it takes time to upgrade when there are breaking changes.
To make the migration easier, the new SDK also exports the legacy SDK as `Intercom\Legacy\...`. Here's an example of how you can use the
legacy SDK alongside the new SDK inside a single file:

```php
use Intercom\IntercomClient;
use Intercom\Legacy\IntercomClient as LegacyIntercomClient;

$intercom = new IntercomClient();
$legacyClient = new LegacyIntercomClient();
```

We recommend migrating to the new SDK using the following steps:

1. Upgrade the package to `^5.1.0`
2. Search and replace all requires and imports from `Intercom\...` to `Intercom\Legacy\...`

3. Gradually move over to use the new SDK by importing it from the `Intercom\...` import.


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