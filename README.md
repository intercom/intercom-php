## Clients

```php
$client = new IntercomClient(appId, apiKey);
```

## Users

```php
// Create/update a user
$client->users->create([
  'email' => 'test@intercom.io'
]);

// Add companies to a user
$client->users->create([
  'email' => 'test@intercom.io',
  "companies" => [
    [
      "id" => "3"
    ]
  ]
]);

// Find user by email
$client->users->getUsers(['email' => 'bob@intercom.io']);
```

## Leads

```php
// Create/update a lead
// See more options here: https://developers.intercom.io/reference#create-lead
$client->leads->create([]);

// List leads
// See more options here: https://developers.intercom.io/reference#list-leads
$client->leads->getLeads([]);

// Find a lead by ID
$client->leads->getLead("570680a8a1bcbca8a90000a9");

// Delete a lead by ID
$client->leads->deleteLead("570680a8a1bcbca8a90000a9");

// Convert a Lead to a User
$leads->convertLead([
  "contact" => [
    "user_id" => "8a88a590-e1c3-41e2-a502-e0649dbf721c"
  ],
  "user" => [
    "email" => "winstonsmith@truth.org"
  ]
]);
```

## Events

```php
// Create an event
$client->events->create([
  "event_name" => "testing",
  "created_at" => 1391691571,
  "email" => "test@intercom.io"
]);

// View events for a user
$client->events->getEvents(["email" => "bob@intercom.io"]);
```

## Companies

```php
// Create a company
$client->companies->create([
  "name" => "foocorp", "id" => "3"
]);

// List Companies
$client->companies->getCompanies([]);
```

## Admins

```php
// List admins
$client->admins->getAdmins();
```

## Messages

```php
// Send a message from an admin to a user
// See more options here: https://developers.intercom.io/reference#conversations
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
    "email" => "bob@intercom.io"
  ]
]);
```

## Conversations

```php
// List conversations for an admin
// See more options here: https://developers.intercom.io/reference#list-conversations
$client->conversations->getConversations([
  "type" => "admin",
  "admin_id" => "25610"
]);

// Get a single conversation
$client->conversations->getConversation("1234")

// Reply to a conversation
// See more options here: https://developers.intercom.io/reference#replying-to-a-conversation
$client->conversations->replyToConversation("5678", [
  "email" => "test@intercom.io",
  "body" => "Thanks :)",
  "type" => "user",
  "message_type" => "comment"
]);
```

## Counts

```php
// List counts
// See more options here: https://developers.intercom.io/reference#getting-counts
$client->counts->getCounts([])
```

## Bulk

```php
// Bulk create/update users
// See more options here: https://developers.intercom.io/reference#bulk-user-operations
$client->bulk->users([
  "items" => [ /* ... */ ]
]);

// Bulk create/update users
// See more options here: https://developers.intercom.io/reference#bulk-event-operations
$client->bulk->events([
  "items" => [ /* ... */ ]
]);
```

## Notes

```php
// Create a note
$client->notes->create([
  "admin_id" => "21",
  "body" => "Text for my note",
  "user" => [
    "id" => "5310d8e8598c9a0b24000005"
  ]
]);

// List notes for a user
$client->notes->getNotes([
  "user_id" => "25"
]);

// Get a single Note by id
$client->notes->getNote("42");
```

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
$client->nextPage(response['pages']);
```
