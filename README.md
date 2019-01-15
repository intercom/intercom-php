# intercom-php

[![Code Climate](https://codeclimate.com/repos/537da4a7e30ba062b101be9c/badges/2aa25d4736f09f40282e/gpa.svg)](https://codeclimate.com/repos/537da4a7e30ba062b101be9c/feed) [![Circle CI](https://circleci.com/gh/intercom/intercom-php.png?style=badge)](https://circleci.com/gh/intercom/intercom-php)

Official PHP bindings to the Intercom API

## Installation

This library supports PHP 7.1 and later

This library uses [HTTPPlug](https://github.com/php-http/httplug) as HTTP client. HTTPPlug is an abstraction that allows this library to support many different HTTP Clients. Therefore, you need to provide it with an adapter for the HTTP library you prefer. You can find all the available adapters [in Packagist](https://packagist.org/providers/php-http/client-implementation). This documentation assumes you use the Guzzle6 Client, but you can replace it with any adapter that you prefer.

The recommended way to install intercom-php is through [Composer](https://getcomposer.org):

```sh
composer require intercom/intercom-php php-http/guzzle6-adapter
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

```php
use Intercom\IntercomClient;

$client = new IntercomClient('<insert_token_here>', null, ['Custom-Header' => 'value']);

$client->setHttpClient($myCustomHttpClient); // $myCustomHttpClient implements Psr\Http\Client\ClientInterface
$client->setRequestFactory($myCustomRequestFactory); // $myCustomRequestFactory implements Http\Message\RequestFactory
$client->setUriFactory($myCustomUriFactory); // $myCustomUriFactory implements Http\Message\UriFactory
```

## Users

```php
/** Create a user */
$client->users->create([
    "email" => "test@example.com",
    "custom_attributes" => ['foo' => 'bar']
]);

/**
 * Update a user (Note: This method is an alias to the create method. In practice you
 * can use create to update users if you wish)
 */
$client->users->update([
    "email" => "test@example.com",
    "custom_attributes" => ['foo' => 'bar']
]);

/** Archive a user by ID (i.e. soft delete) */
$client->users->archiveUser("570680a8a1bcbca8a90001b9");

/** Permanently delete a user */
$client->users->permanentlyDeleteUser("570680a8a1bcbca8a90001b9");

/** For more on the difference between archive and permanently deleting a user please see https://developers.intercom.com/reference#archive-a-user. */

/** Get a user by ID */
$client->users->getUser("570680a8a1bcbca8a90001b9");

/** Add companies to a user */
$client->users->create([
    "email" => "test@example.com",
    "companies" => [
        [
            "company_id" => "3"
        ]
    ]
]);

/** Remove companies from a user */
$client->users->create([
    "email" => "test@example.com",
    "companies" => [
        [
            "company_id" => "3",
            "remove" => true
        ]
    ]
]);

/** Find a single user by email */
$client->users->getUsers(["email" => "bob@example.com"]);

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

```php
/**
 * Create a lead
 * See more options here: https://developers.intercom.io/reference#create-lead
 */
$client->leads->create([
    "email" => "test@example.com",
    "custom_attributes" => ['foo' => 'bar']
]);

/**
 * Update a lead (Note: This method is an alias to the create method.
 * In practice you can use create to update leads if you wish)
 */
$client->leads->update([
    "email" => "test@example.com",
    "custom_attributes" => ['foo' => 'bar']
]);

/**
 * List leads
 * See more options here: https://developers.intercom.io/reference#list-leads
 */
$client->leads->getLeads([]);

/** Find a lead by ID */
$client->leads->getLead("570680a8a1bcbca8a90000a9");

/** Delete a lead by ID */
$client->leads->deleteLead("570680a8a1bcbca8a90000a9");

/** Convert a Lead to a User */
$client->leads->convertLead([
    "contact" => [
        "user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c"
    ],
    "user" => [
        "email" => "winstonsmith@truth.org"
    ]
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
    "user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c",
    "custom_attributes" => ['foo' => 'bar']
]);

/** Find a visitor by ID */
$client->visitors->getVisitor("570680a8a1bcbca8a90000a9");

/** Find a visitor by User ID */
$client->visitors->getVisitor("", ["user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c"]);

/** Delete a visitor by ID */
$client->visitors->deleteVisitor("570680a8a1bcbca8a90000a9");

/** Convert a Visitor to a Lead */
$client->visitors->convertVisitor([
    "visitor" => [
        "user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c"
    ],
    "type" => "lead"
]);

/** Convert a Visitor to a User */
$client->visitors->convertVisitor([
    "visitor" => [
        "user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c"
    ],
    "user" => [
        "email" => "winstonsmith@truth.org"
    ],
    "type" => "user"
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
    "name" => "Test",
    "users" => [
        ["id" => "1234"]
    ]
]);
```

## Segments

```php
/** List Segments */
$client->segments->getSegments();

/** View a segment */
$client->segments->getSegment("58a707924f6651b07b94376c");

/** View a segment with count */
$client->segments->getSegment("59c124f770e00fd819b9ce81", ["include_count"=>"true"]);
```

## Events

```php
/** Create an event */
$client->events->create([
    "event_name" => "testing",
    "created_at" => 1391691571,
    "email" => "test@example.com",
    "metadata" => [
        "order_date" => 1392036272,
        "stripe_invoice" => "inv_3434343434"
    ]
]);

/** View events for a user */
$client->events->getEvents(["email" => "bob@example.com"]);
```

## Companies

```php
/** Create a company */
$client->companies->create([
    "name" => "foocorp",
    "company_id" => "3"
]);

/**
 * Update a company (Note: This method is an alias to the create method.
 * In practice you can use create to update companies if you wish)
 */
$client->companies->update([
    "name" => "foocorp",
    "id" => "3"
]);

/** Creating or Update a company with custom attributes. */
$client->companies->update([
    "name" => "foocorp",
    "id" => "3",
    "custom_attributes" => [
        "foo" => "bar",
        "baz" => "qux"
    ]
]);

/** List Companies */
$client->companies->getCompanies([]);

/** Get a company by ID */
$client->companies->getCompany("531ee472cce572a6ec000006");
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
    "message_type" => "inapp",
    "subject" => "Hey",
    "body" => "Ponies, cute small horses or something more sinister?",
    "from" => [
        "type" => "admin",
        "id" => "1234"
    ],
    "to" => [
        "type" => "user",
        "email" => "bob@example.com"
    ]
]);
```

## Conversations

```php
/**
 * List conversations for an admin
 * See more options here: https://developers.intercom.io/reference#list-conversations
 */
$client->conversations->getConversations([
    "type" => "admin",
    "admin_id" => "25610"
]);

/** Get a single conversation */
$client->conversations->getConversation("1234")

/** Get a single conversation with plaintext comments */
$client->conversations->getConversation("1234", [
    "display_as" => "plaintext"
])

/**
 * Reply to a conversation
 * See more options here: https://developers.intercom.io/reference#replying-to-a-conversation
 */
$client->conversations->replyToConversation("5678", [
    "email" => "test@example.com",
    "body" => "Thanks :)",
    "type" => "user",
    "message_type" => "comment"
]);

/**
 * Reply to a user's last conversation
 * See more options here: https://developers.intercom.com/reference#replying-to-users-last-conversation
 */
$client->conversations->replyToLastConversation([
    "email" => "test@example.com",
    "body" => "Thanks :)",
    "type" => "user",
    "message_type" => "comment"
]);

/**
 * Mark a conversation as read
 * See API documentation here: https://developers.intercom.io/reference#marking-a-conversation-as-read
 */
$client->conversations->markConversationAsRead("7890");
```

## Counts

```php
/**
 * List counts
 * See more options here: https://developers.intercom.io/reference#getting-counts
 */
$client->counts->getCounts([])
```

## Notes

```php
/** Create a note */
$client->notes->create([
    "admin_id" => "21",
    "body" => "Text for my note",
    "user" => [
        "id" => "5310d8e8598c9a0b24000005"
    ]
]);

/** List notes for a user */
$client->notes->getNotes([
  "user_id" => "25"
]);

/** Get a single Note by id */
$client->notes->getNote("42");
```

## Rate Limits

Rate limit info is passed via the rate limit headers.
You can access this information as follows:

```php
$rate_limit = $intercom->getRateLimitDetails();
print("{$rate_limit['remaining']} {$rate_limit['limit']} \n");
print_r($rate_limit['reset_at']->format(DateTime::ISO8601));
```

For more info on rate limits and these headers please see the [API reference docs](https://developers.intercom.com/reference#rate-limiting)

## Pagination

When listing, the Intercom API may return a pagination object:

```json
{
  "pages": {
    "next": "..."
  }
}
```

You can grab the next page of results using the client:

```php
$client->nextPage($response->pages);
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

$intercom = new IntercomClient(getenv('AT'), null);
$resp = $intercom->users->scrollUsers([]);
$count = 1;
echo "PAGE $count: " . sizeof($resp->users);
echo "\n";
while (!empty($resp->scroll_param) && sizeof($resp->users) > 0) {
    $count = ++$count;
    $resp = $intercom->users->scrollUsers(["scroll_param" => $resp->scroll_param]);
    echo "PAGE $count: " . sizeof($resp->users);
    echo "\n";
}
```

## Exceptions

Exceptions are handled by HTTPPlug. Every exception thrown implements `Http\Client\Exception`. See the different exceptions that can be thrown [in the HTTPPlug documentation](http://docs.php-http.org/en/latest/httplug/exceptions.html).
The Intercom API may return an unsuccessful HTTP response, for example when a resource is not found (404).
If you want to catch errors you can wrap your API call into a try/catch block:

```php
try {
    $user = $client->users->getUser("570680a8a1bcbca8a90001b9");
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
