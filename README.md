# intercom-php

PHP bindings for the Intercom API (https://api.intercom.io).

[API Documentation](https://api.intercom.io/docs)

[![Circle CI](https://circleci.com/gh/intercom/intercom-php.svg?style=svg)](https://circleci.com/gh/intercom/intercom-php)
[![Code Climate](https://codeclimate.com/github/intercom/intercom-php/badges/gpa.svg)](https://codeclimate.com/github/intercom/intercom-php)


## Installation

The API client can be installed via [Composer](https://github.com/composer/composer).

In your composer.json file:

```js
{
    "require": {
      "intercom/intercom-php": "1.5.0"
    }
}
```

Once the composer.json file is created you can run `composer install` for the initial package install and `composer update` to update to the latest version of the API client.

The client uses [Guzzle](http://guzzle3.readthedocs.org).


## Basic Usage

Remember to include the Composer autoloader in your application:

```php
<?php
require_once 'vendor/autoload.php';

// Application code...
?>
```

Configure your access credentials when creating a client:

```php
<?php
use Intercom\IntercomBasicAuthClient;

$intercom = IntercomBasicAuthClient::factory(array(
    'app_id' => 'YOUR_APP_ID',
    'api_key' => 'YOUR_API_KEY'
));
?>
```


### Local Testing

Run `phpunit` from the project root to start all tests.

### Resources

Resources this API supports:

    https://api.intercom.io/users
    https://api.intercom.io/companies
    https://api.intercom.io/tags
    https://api.intercom.io/notes
    https://api.intercom.io/segments
    https://api.intercom.io/events
    https://api.intercom.io/conversations
    https://api.intercom.io/messages
    https://api.intercom.io/counts

### Examples

#### Users

```php
<?php
// Get a list of users
$intercom->getUsers();
// Get a list of users created in the past 3 days
$intercom->getUsers(array("created_since" => "3"));
// Find user by email
$intercom->getUser(array("email" => "bob@example.com"));
// Find user by user_id
$intercom->getUser(array("user_id" => "123456"));
// Find user by id
$intercom->getUser(array("id" => "1"))
// Create a new user
$user = $intercom->createUser(array(
	"email" => "bob@example.com",
	"name" => "Bob Smith"
));

// Create a new user with more details
$user_data = array(
    "email" => "testuser@intercom.io",
    "last_request_at" => time(),
    "custom_attributes" => array(
        "projects_delivered" => 12,
    )
);

try {
    $user = $intercom->createUser($user_data);
} catch (ServerErrorResponseException $e) {
    // Handle the error appropriately. Simple example is below
    $request = $e->getRequest();
    $url = $request->getUrl();
    $params = serialize($request->getParams()->toArray());
    error_log("[API SERVER ERROR] Status Code: {$url} | Body: {$params}");

    $response = $e->getResponse();
    $code = $response->getStatusCode();
    $body = $response->getBody();
    error_log("[API SERVER ERROR] Status Code: {$code} | Body: {$body}");

} catch (ClientErrorResponseException $e) {
    // Handle the error
}

//Delete a user by email
$intercom->deleteUser(array("email" => "bob@example.com"));
//Delete a user by user_id
$intercom->deleteUser(array("user_id" => "123456"));
//Delete a user by id
$intercom->deleteUser(array("id" => "1"));

?>
```

#### Admins
```php
<?php
// Iterate over all admins
$admins = $intercom->getAdmins();
foreach($admins["admins"] as $admin) {
    echo $admin["name"] . PHP_EOL;
}
?>
```

#### Companies
```php
<?php
// Add a user to one or more companies
$user = $intercom->getUser(array("email" => "bob@example.com"));
$intercom->updateUser(array(
	"id" => $user["id"],
	"companies" => array(
		array("company_id" => 5,"name" => "Intercom"),
		array("company_id" => 9,"name" => "Test Company")
	)
));
// Find a company by company_id
$intercom->getCompany(array(
	"company_id" => "44"
));
// Find a company by name
$intercom->getCompany(array(
	"name" => "Some company"
));
# Find a company by id
$intercom->getCompany(array(
	"id" => "41e66f0313708347cb0000d0"
));
// Update a company
$intercom->updateCompany(array(
	"id" => "41e66f0313708347cb0000d0",
	"name" => "Updated company name"
));
// Iterate over all companies
$companies = $intercom->getCompanies();
foreach($companies["companies"] as $company) {
    echo $company["name"] . PHP_EOL;
}
// Get a list of users in a company
$intercom->getCompanyUsers(array(
	"id" => "41e66f0313708347cb0000d0"
));
?>
```

#### Tags
```php
<?php
// Tag users
$intercom->tagUsers(array(
	"name" => "blue",
	"users" => array(
		array("id" => "42ea2f1b93891f6a99000427"),
		array("user_id" => "22")
	)
));
// Untag users
$intercom->tagUsers(array(
	"name" => "blue",
	"users" => array(
		array("user_id" => "22", "untag" => true)
	)
));
// Iterate over all tags
$tags = $intercom->getTags();
foreach($tags["tags"] as $tag) {
    echo $tag["name"] . PHP_EOL;
}
// Tag companies
$intercom->tagCompanies(array(
	"name" => "red",
	"companies" => array(
		array("id" => "42ea2f1b93891f6a99000427")
	)
));
// Untag companies
$intercom->tagCompanies(array(
	"name" => "red",
	"companies" => array(
		array("id" => "42ea2f1b93891f6a99000427")
	)
));
?>
```

#### Segments
```php
<?php
// Find a segment
$intercom->getSegment(array(
	"id" => "1234"
));
// Iterate over all segments
$segments = $intercom->getSegments();
foreach($segments["segments"] as $segment) {
    echo $segment["name"] . PHP_EOL;
}
?>
```

#### Notes
```php
<?php
// Find a note by id
$intercom->getNote(array(
	"id" => "2"
));
// Create a note for a user
$intercom->createNote(array(
	"body" => "<p>Text for the note</p>",
	"user" => array(
		"email" => "joe@example.com"
	)
));
// Iterate over all notes for a user via their email address
$notes = $intercom->getNotesForUser(array("email" => "joe@example.com"));
foreach($notes["notes"] as $note) {
    echo $note["body"] . PHP_EOL;
}
// Iterate over all notes for a user via their user_id
$notes = $intercom->getNotesForUser(array("user_id" => "123"));
foreach($notes["notes"] as $note) {
    echo $note["body"] . PHP_EOL;
}
?>
```

#### Conversations
```php
<?php
// FINDING CONVERSATIONS FOR AN ADMIN
// Get all conversations (open and closed) assigned to an admin
$intercom->getConversations(array(
	 "type" => "admin",
	 "id" => "7"
));
// Get all open conversations assigned to an admin
$intercom->getConversations(array(
	"type" => "admin",
	"id" => "7",
	"open" => true
));
// Get all open conversations assigned to an admin and render as plaintext
$intercom->getConversations(array(
    "type" => "admin",
    "id" => "7",
    "open" => true,
    "display_as" => "plaintext"
));
// Get all closed conversations assigned to an admin
$intercom->getConversations(array(
	"type" => "admin",
	"id" => "7",
	"open" => false
));

// FINDING CONVERSATIONS FOR A USER
// Get all conversations (read + unread, correct) with a user based on the users email
$intercom->getConversations(array(
	"type" => "user",
	"email" => "joe@example.com"
));
// Get all conversations (read + unread) with a user based on the users email
$intercom->getConversations(array(
	"type" => "user",
	"email" => "joe@example.com",
	"unread" => false
));
// Get all unread conversations with a user based on the users email
$intercom->getConversations(array(
	"type" => "user",
	"email" => "joe@example.com",
	"unread" => true
));

// FINDING A SINGLE CONVERSATION
$conversation = $intercom->getConversation(array("id" => "1"));

// INTERACTING WITH THE PARTS OF A CONVERSATION
// Getting the subject of a part (only applies to email-based conversations)
$conversation["rendered_message"]["subject"];
// Get the part_type of the first part
$conversation["conversation_parts"][0]["part_type"];
// Get the body of the second part
$conversation["conversation_parts"][1]["body"];


// REPLYING TO CONVERSATIONS
// User (identified by email) replies with a comment
$intercom->replyToConversation(array(
	"id" => $conversation["id"],
	"type" => "user",
	"email" => "joe@example.com",
	"message_type" => "comment"
	"body" => "foo"
));
// Admin (identified by email) replies with a comment
$intercom->replyToConversation(array(
	"id" => $conversation["id"],
	"type" => "admin",
	"email" => "bob@example.com",
	"message_type" => "comment"
	"body" => "bar"
));
// Admin (identified by id) assigns a conversation
$intercom->replyToConversation(array(
	"id" => $conversation["id"],
	"type" => "admin",
	"admin_id" => "1",
	"message_type" => "assignment",
	"assignee_id" => "2"
));
// Admin (identified by id) opens a conversation
$intercom->replyToConversation(array(
	"id" => $conversation["id"],
	"type" => "admin",
	"admin_id" => "1",
	"message_type" => "open",
));
// Admin (identified by id) closes a conversation
$intercom->replyToConversation(array(
	"id" => $conversation["id"],
	"type" => "admin",
	"admin_id" => "1",
	"message_type" => "close",
));


// MARKING A CONVERSATION AS READ
$intercom->markConversationAsRead(array("id" => $conversation["id"], "read": true));
?>
```

#### Counts
```php
<?php
// Get Conversation Count per Admin
$admin_conversation_counts = $intercom->getAdminConversationCount();
foreach($admin_conversation_counts["conversation"]["admin"] as $count) {
	echo "Admin: {$count["name"]} Open: {$count["open"]} Closed: {$count["closed"]}\n";
}
// Get User Tag Count Object
$intercom->getUserTagCount();
// Get User Segment Count Object
$intercom->getUserSegmentCount();
// Get Company Segment Count Object
$intercom->getCompanySegmentCount();
// Get Company Tag Count Object
$intercom->getCompanyTagCount();
// Get Company User Count Object
$intercom->getCompanyUserCount();
// Get total count of companies, users, segments or tags across app
$counts = $intercom->getCounts();
$company_counts = $counts["company"];
$user_counts = $counts["user"];
$segment_counts = $counts["segment"];
$tag_counts = $counts["tag"];
?>
```

#### Sending messages
```php
<?php
// InApp message from admin to user
$intercom->createMessage(array(
	"message_type" => "inapp",
	"body" => "What's up :)",
	"from" => array(
		"type" => "admin",
		"id" => "1234"
	),
	"to" => array(
		"type" => "user",
		"id" => "5678"
	)
));

// Email message from admin to user
$intercom->createMessage(array(
	"message_type" => "email",
	"subject" => "Hey there",
	"body" => "What's up :)",
	"template" => "plain",
	"from" => array(
		"type" => "admin",
		"id" => "25"
	),
	"to" => array(
		"type" => "user",
		"id" => "536e564f316c83104c000020"
	)
));

// Message from a user
$intercom->createMessage(array(
	"body" => "help",
	"from" => array(
		"type" => "user",
		"id" => "536e564f316c83104c000020"
	)
));

// Message from a contact
$intercom->createMessage(array(
  "body" => "help",
  "from" => array(
    "type" => "contact",
    "id" => "543e679ae537f54445000dac"
  )
));

// Message from an admin to a contact
$intercom->createMessage(array(
  "message_type" => "inapp",
  "body" => "how can I help",
  "from" => array(
    "type" => "admin",
    "id" => "25610"
  ),
  "to" => array(
    "type" => "contact",
    "id" => "543e679ae537f54445000dac"
  )
));
?>
```

#### Events
```php
<?php
$intercom->createEvent(array(
	"event_name" => "invited-friend",
	"created_at" => time(),
	"user_id" => "314159",
	"metadata" => array(
		"invitee_email" => "pi@example.org",
		"invite_code" => "ADDAFRIEND",
		"found_date" => 12909364407
	)
));
?>
```

Metadata Objects support a few simple types that Intercom can present on your behalf

```php
<?php
$intercom->createEvent(array(
	"created_at" => 1403001013,
	"user_id" => "314159",
	"metadata" => array(
		"order_date" => time(),
		"stripe_invoice" => "inv_3434343434",
		"order_number" => array(
			"value" => "3434-3434",
			"url" => "https://example.org/orders/3434-3434"
		)
		"price" => array(
			"currency" => "usd",  
			"amount" => 2999
		 )
	 )
));
?>
```

The metadata key values in the example are treated as follows-
- order_date: a Date (key ends with '_date').
- stripe_invoice: The identifier of the Stripe invoice (has a 'stripe_invoice' key)
- order_number: a Rich Link (value contains 'url' and 'value' keys)
- price: An Amount in US Dollars (value contains 'amount' and 'currency' keys)

#### Contacts

`Contacts` represent logged out users of your application.

```php
//Create a new contact
$response = $intercom->createContact(['email' => 'some_contact@example.com']);

//Update a contact
$updated = $intercom->updateContact([
  'id' => $response['id'],
  'custom_attributes' => ['foo' => 'bar']
]);

//Delete a contact
$deleted = $intercom->deleteContact([
  "id" => "530370b477ad7120001d"
]);

//Get all contacts by email
$search = $intercom->getContacts(['email' => 'some_contact@example.com']);

//Convert a contact into a user
$response = $intercom->convertContact([
  "contact" => array("user_id" => 1),
  "user" => array("user_id" => 2)
])

//Iterate through Contacts with pagination:
$iterator = $intercom->getIterator("getContacts");
foreach ($iterator as $contact) {
  print_r($contact);
}
```

#### Bulk API


```php
// Create or update a batch of users
$result = $intercom->bulkUsers(
[
  'items' => [
    [
      'data_type' => 'user',
      'method' => 'post', // can be 'delete'
      'data' => [
        'email' => 'pi@example.org',
        'name' => 'Pi'
      ]
    ],
    ...
  ]
]);

// Create or update a batch of events
$result = $intercom->bulkEvents(
[
  'items' => [
    [
      'data_type' => 'event',
      'method' => 'post',
      'data' => [
        "event_name": "invited-friend",
        "created_at": 1438944979,
        "user_id": "314159"
      ]
    ],
    ...
  ]
]);

//Get bulk job info
$result = $intercom->getJob(['id' => 'job_5ca1ab1eca11ab1e'])

//Get bulk job errors
$result = $intercom->getJobErrors(['id' => 'job_5ca1ab1eca11ab1e'])
```
