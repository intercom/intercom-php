# Reference
## Admins
<details><summary><code>$client->admins->identify() -> ?AdminWithApp</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can view the currently authorised admin along with the embedded app object (a "workspace" in legacy terminology).

> 🚧 Single Sign On
>
> If you are building a custom "Log in with Intercom" flow for your site, and you call the `/me` endpoint to identify the logged-in user, you should not accept any sign-ins from users with unverified email addresses as it poses a potential impersonation security risk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->identify();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->admins->away($request) -> ?Admin</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can set an Admin as away for the Inbox.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->away(
    new ConfigureAwayAdminRequest([
        'adminId' => 1,
        'awayModeEnabled' => true,
        'awayModeReassign' => true,
        'awayStatusReasonId' => 12345,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$adminId:** `int` — The unique identifier of a given admin
    
</dd>
</dl>

<dl>
<dd>

**$awayModeEnabled:** `bool` — Set to "true" to change the status of the admin to away.
    
</dd>
</dl>

<dl>
<dd>

**$awayModeReassign:** `bool` — Set to "true" to assign any new conversation replies to your default inbox.
    
</dd>
</dl>

<dl>
<dd>

**$awayStatusReasonId:** `?int` — The unique identifier of the away status reason
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->admins->listAllActivityLogs($request) -> ActivityLogList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a log of activities by all admins in an app.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->listAllActivityLogs(
    new ListAllActivityLogsRequest([
        'createdAtAfter' => '1677253093',
        'createdAtBefore' => '1677861493',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$createdAtAfter:** `string` — The start date that you request data for. It must be formatted as a UNIX timestamp.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtBefore:** `?string` — The end date that you request data for. It must be formatted as a UNIX timestamp.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->admins->list() -> AdminList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of admins for a given workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->admins->find($request) -> ?Admin</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve the details of a single admin.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->find(
    new FindAdminRequest([
        'adminId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$adminId:** `int` — The unique identifier of a given admin
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AI Content
<details><summary><code>$client->aiContent->listContentImportSources() -> ContentImportSourcesList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve a list of all content import sources for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->listContentImportSources();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->createContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new content import source by sending a POST request to this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->createContentImportSource(
    new CreateContentImportSourceRequest([
        'syncBehavior' => 'api',
        'url' => 'https://www.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncBehavior:** `string` — If you intend to create or update External Pages via the API, this should be set to `api`.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the content import source.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the content import source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->getContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->getContentImportSource(
    new GetContentImportSourceRequest([
        'sourceId' => 'source_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sourceId:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->updateContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing content import source.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->updateContentImportSource(
    new UpdateContentImportSourceRequest([
        'sourceId' => 'source_id',
        'syncBehavior' => UpdateContentImportSourceRequestSyncBehavior::Api->value,
        'url' => 'https://www.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sourceId:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$syncBehavior:** `string` — If you intend to create or update External Pages via the API, this should be set to `api`. You can not change the value to or from api.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the content import source.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the content import source. This may only be different from the existing value if the sync behavior is API.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->deleteContentImportSource($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a content import source by making a DELETE request this endpoint. This will also delete all external pages that were imported from this source.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->deleteContentImportSource(
    new DeleteContentImportSourceRequest([
        'sourceId' => 'source_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$sourceId:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->listExternalPages() -> ExternalPagesList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve a list of all external pages for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->listExternalPages();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->createExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new external page by sending a POST request to this endpoint. If an external page already exists with the specified source_id and external_id, it will be updated instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->createExternalPage(
    new CreateExternalPageRequest([
        'title' => 'Test',
        'html' => '<html><body><h1>Test</h1></body></html>',
        'url' => 'https://www.example.com',
        'locale' => 'en',
        'sourceId' => 44,
        'externalId' => 'abc1234',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$title:** `string` — The title of the external page.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `string` — The body of the external page in HTML.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL of the external page. This will be used by Fin to link end users to the page it based its answer on. When a URL is not present, Fin will not reference the source.
    
</dd>
</dl>

<dl>
<dd>

**$aiAgentAvailability:** `?bool` — Whether the external page should be used to answer questions by AI Agent. Will not default when updating an existing external page.
    
</dd>
</dl>

<dl>
<dd>

**$aiCopilotAvailability:** `?bool` — Whether the external page should be used to answer questions by AI Copilot. Will not default when updating an existing external page.
    
</dd>
</dl>

<dl>
<dd>

**$locale:** `string` — Always en
    
</dd>
</dl>

<dl>
<dd>

**$sourceId:** `int` — The unique identifier for the source of the external page which was given by Intercom. Every external page must be associated with a Content Import Source which represents the place it comes from and from which it inherits a default audience (configured in the UI). For a new source, make a POST request to the Content Import Source endpoint and an ID for the source will be returned in the response.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` — The identifier for the external page which was given by the source. Must be unique for the source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->getExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve an external page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->getExternalPage(
    new GetExternalPageRequest([
        'pageId' => 'page_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->updateExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing external page (if it was created via the API).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->updateExternalPage(
    new UpdateExternalPageRequest([
        'pageId' => 'page_id',
        'title' => 'Test',
        'html' => '<html><body><h1>Test</h1></body></html>',
        'url' => 'https://www.example.com',
        'locale' => 'en',
        'sourceId' => 47,
        'externalId' => '5678',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `string` — The title of the external page.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `string` — The body of the external page in HTML.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the external page. This will be used by Fin to link end users to the page it based its answer on.
    
</dd>
</dl>

<dl>
<dd>

**$finAvailability:** `?bool` — Whether the external page should be used to answer questions by Fin.
    
</dd>
</dl>

<dl>
<dd>

**$locale:** `string` — Always en
    
</dd>
</dl>

<dl>
<dd>

**$sourceId:** `int` — The unique identifier for the source of the external page which was given by Intercom. Every external page must be associated with a Content Import Source which represents the place it comes from and from which it inherits a default audience (configured in the UI). For a new source, make a POST request to the Content Import Source endpoint and an ID for the source will be returned in the response.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — The identifier for the external page which was given by the source. Must be unique for the source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->aiContent->deleteExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sending a DELETE request for an external page will remove it from the content library UI and from being used for AI answers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->deleteExternalPage(
    new DeleteExternalPageRequest([
        'pageId' => 'page_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$pageId:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Articles
<details><summary><code>$client->articles->list($request) -> ArticleList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all articles by making a GET request to `https://api.intercom.io/articles`.

> 📘 How are the articles sorted and ordered?
>
> Articles will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated articles first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->list(
    new ListArticlesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->articles->create($request) -> Article</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new article by making a POST request to `https://api.intercom.io/articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->create(
    new CreateArticleRequest([
        'title' => 'Thanks for everything',
        'description' => 'Description of the Article',
        'body' => 'Body of the Article',
        'authorId' => 991267497,
        'state' => CreateArticleRequestState::Published->value,
        'parentId' => 145,
        'parentType' => CreateArticleRequestParentType::Collection->value,
        'translatedContent' => new ArticleTranslatedContent([
            'fr' => new ArticleContent([
                'title' => 'Merci pour tout',
                'description' => "Description de l'article",
                'body' => "Corps de l'article",
                'authorId' => 991267497,
                'state' => ArticleContentState::Published->value,
            ]),
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateArticleRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->articles->find($request) -> Article</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single article by making a GET request to `https://api.intercom.io/articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->find(
    new FindArticleRequest([
        'articleId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$articleId:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->articles->update($request) -> Article</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update the details of a single article by making a PUT request to `https://api.intercom.io/articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->update(
    new UpdateArticleRequest([
        'articleId' => 1,
        'title' => 'Christmas is here!',
        'body' => '<p>New gifts in store for the jolly season</p>',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$articleId:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of the article.For multilingual articles, this will be the title of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the article. For multilingual articles, this will be the description of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `?string` — The content of the article. For multilingual articles, this will be the body of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$authorId:** `?int` — The id of the author of the article. For multilingual articles, this will be the id of the author of the default language's content. Must be a teammate on the help center's workspace.
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — Whether the article will be `published` or will be a `draft`. Defaults to draft. For multilingual articles, this will be the state of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$parentId:** `?string` — The id of the article's parent collection or section. An article without this field stands alone.
    
</dd>
</dl>

<dl>
<dd>

**$parentType:** `?string` — The type of parent, which can either be a `collection` or `section`.
    
</dd>
</dl>

<dl>
<dd>

**$translatedContent:** `?ArticleTranslatedContent` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->articles->delete($request) -> DeletedArticleObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single article by making a DELETE request to `https://api.intercom.io/articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->delete(
    new DeleteArticleRequest([
        'articleId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$articleId:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->articles->search($request) -> ArticleSearchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for articles by making a GET request to `https://api.intercom.io/articles/search`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->search(
    new SearchArticlesRequest([
        'phrase' => 'Getting started',
        'state' => 'published',
        'helpCenterId' => 1,
        'highlight' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phrase:** `?string` — The phrase within your articles to search for.
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — The state of the Articles returned. One of `published`, `draft` or `all`.
    
</dd>
</dl>

<dl>
<dd>

**$helpCenterId:** `?int` — The ID of the Help Center to search in.
    
</dd>
</dl>

<dl>
<dd>

**$highlight:** `?bool` — Return a highlighted version of the matching content within your articles. Refer to the response schema for more details.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Away Status Reasons
<details><summary><code>$client->awayStatusReasons->listAwayStatusReasons() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of all away status reasons configured for the workspace, including deleted ones.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->awayStatusReasons->listAwayStatusReasons();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Export
<details><summary><code>$client->export->enqueueANewReportingDataExportJob($request) -> PostExportReportingDataEnqueueResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->export->enqueueANewReportingDataExportJob(
    new PostExportReportingDataEnqueueRequest([
        'datasetId' => 'conversation',
        'attributeIds' => [
            'conversation_id',
            'conversation_started_at',
        ],
        'startTime' => 1717490000,
        'endTime' => 1717510000,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$datasetId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$attributeIds:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$startTime:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$endTime:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->export->listAvailableDatasetsAndAttributes() -> GetExportReportingDataGetDatasetsResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->export->listAvailableDatasetsAndAttributes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Data Export
<details><summary><code>$client->dataExport->exportReportingData($request) -> DataExportExportReportingDataResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->exportReportingData(
    new ExportReportingDataRequest([
        'jobIdentifier' => 'job_identifier',
        'appId' => 'app_id',
        'clientId' => 'client_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — Unique identifier of the job.
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `string` — The Intercom defined code of the workspace the company is associated to.
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataExport->downloadReportingDataExport($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Download the data from a completed reporting data export job.

> Octet header required
>
> You will have to specify the header Accept: `application/octet-stream` when hitting this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->downloadReportingDataExport(
    new DownloadReportingDataExportRequest([
        'jobIdentifier' => 'job_identifier',
        'appId' => 'app_id',
        'accept' => 'application/octet-stream',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$appId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$accept:** `string` — Required header for downloading the export file
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataExport->create($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

To create your export job, you need to send a `POST` request to the export endpoint `https://api.intercom.io/export/content/data`.

The only parameters you need to provide are the range of dates that you want exported.

>🚧 Limit of one active job
>
> You can only have one active job per workspace. You will receive a HTTP status code of 429 with the message Exceeded rate limit of 1 pending message data export jobs if you attempt to create a second concurrent job.

>❗️ Updated_at not included
>
> It should be noted that the timeframe only includes messages sent during the time period and not messages that were only updated during this period. For example, if a message was updated yesterday but sent two days ago, you would need to set the created_at_after date before the message was sent to include that in your retrieval job.

>📘 Date ranges are inclusive
>
> Requesting data for 2018-06-01 until 2018-06-30 will get all data for those days including those specified - e.g. 2018-06-01 00:00:00 until 2018-06-30 23:59:99.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->create(
    new CreateDataExportRequest([
        'createdAtAfter' => 1734519776,
        'createdAtBefore' => 1734537776,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$createdAtAfter:** `int` — The start date that you request data for. It must be formatted as a unix timestamp.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtBefore:** `int` — The end date that you request data for. It must be formatted as a unix timestamp.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataExport->find($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can view the status of your job by sending a `GET` request to the URL
`https://api.intercom.io/export/content/data/{job_identifier}` - the `{job_identifier}` is the value returned in the response when you first created the export job. More on it can be seen in the Export Job Model.

> 🚧 Jobs expire after two days
> All jobs that have completed processing (and are thus available to download from the provided URL) will have an expiry limit of two days from when the export ob completed. After this, the data will no longer be available.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->find(
    new FindDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataExport->cancel($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can cancel your job
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->cancel(
    new CancelDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataExport->download($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

When a job has a status of complete, and thus a filled download_url, you can download your data by hitting that provided URL, formatted like so: https://api.intercom.io/download/content/data/xyz1234.

Your exported message data will be streamed continuously back down to you in a gzipped CSV format.

> 📘 Octet header required
>
> You will have to specify the header Accept: `application/octet-stream` when hitting this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->download(
    new DownloadDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## HelpCenters
<details><summary><code>$client->helpCenters->find($request) -> HelpCenter</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single Help Center by making a GET request to `https://api.intercom.io/help_center/help_center/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->find(
    new FindHelpCenterRequest([
        'helpCenterId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$helpCenterId:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->helpCenters->list($request) -> HelpCenterList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list all Help Centers by making a GET request to `https://api.intercom.io/help_center/help_centers`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->list(
    new ListHelpCentersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Internal Articles
<details><summary><code>$client->internalArticles->listInternalArticles() -> InternalArticleList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all internal articles by making a GET request to `https://api.intercom.io/internal_articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->listInternalArticles();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->internalArticles->createInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new internal article by making a POST request to `https://api.intercom.io/internal_articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->createInternalArticle(
    new CreateInternalArticleRequest([
        'title' => 'Thanks for everything',
        'body' => 'Body of the Article',
        'authorId' => 991266252,
        'ownerId' => 991266252,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateInternalArticleRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->internalArticles->retrieveInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single internal article by making a GET request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->retrieveInternalArticle(
    new RetrieveInternalArticleRequest([
        'internalArticleId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$internalArticleId:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->internalArticles->updateInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update the details of a single internal article by making a PUT request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->updateInternalArticle(
    new UpdateInternalArticleRequestBody([
        'internalArticleId' => 1,
        'title' => 'Christmas is here!',
        'body' => '<p>New gifts in store for the jolly season</p>',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$internalArticleId:** `int` — The unique identifier for the internal article which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of the article.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `?string` — The content of the article.
    
</dd>
</dl>

<dl>
<dd>

**$authorId:** `?int` — The id of the author of the article.
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `?int` — The id of the author of the article.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->internalArticles->deleteInternalArticle($request) -> DeletedInternalArticleObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single internal article by making a DELETE request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->deleteInternalArticle(
    new DeleteInternalArticleRequest([
        'internalArticleId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$internalArticleId:** `int` — The unique identifier for the internal article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->internalArticles->searchInternalArticles($request) -> InternalArticleSearchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for internal articles by making a GET request to `https://api.intercom.io/internal_articles/search`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->searchInternalArticles(
    new SearchInternalArticlesRequest([
        'folderId' => 'folder_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `?string` — The ID of the folder to search in.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Companies
<details><summary><code>$client->companies->retrieve($request) -> CompaniesRetrieveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a single company by passing in `company_id` or `name`.

  `https://api.intercom.io/companies?name={name}`

  `https://api.intercom.io/companies?company_id={company_id}`

You can fetch all companies and filter by `segment_id` or `tag_id` as a query parameter.

  `https://api.intercom.io/companies?tag_id={tag_id}`

  `https://api.intercom.io/companies?segment_id={segment_id}`
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->retrieve(
    new RetrieveCompanyRequest([
        'name' => 'my company',
        'companyId' => '12345',
        'tagId' => '678910',
        'segmentId' => '98765',
        'page' => 1,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — The `name` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The `company_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `?string` — The `tag_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — The `segment_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->createOrUpdate($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create or update a company.

Companies will be only visible in Intercom when there is at least one associated user.

Companies are looked up via `company_id` in a `POST` request, if not found via `company_id`, the new company will be created, if found, that company will be updated.

{% admonition type="warning" name="Using `company_id`" %}
  You can set a unique `company_id` value when creating a company. However, it is not possible to update `company_id`. Be sure to set a unique value once upon creation of the company.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->createOrUpdate(
    new CreateOrUpdateCompanyRequest([
        'name' => 'my company',
        'companyId' => 'company_remote_id',
        'remoteCreatedAt' => 1374138000,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateOrUpdateCompanyRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->find($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a single company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->find(
    new FindCompanyRequest([
        'companyId' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->update($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update a single company using the Intercom provisioned `id`.

{% admonition type="warning" name="Using `company_id`" %}
  When updating a company it is not possible to update `company_id`. This can only be set once upon creation of the company.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->update(
    new UpdateCompanyRequest([
        'companyId' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
        'body' => new UpdateCompanyRequestBody([
            'name' => 'my company',
            'website' => 'http://www.mycompany.com/',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$request:** `?UpdateCompanyRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->delete($request) -> DeletedCompanyObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->delete(
    new DeleteCompanyRequest([
        'companyId' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->listAttachedContacts($request) -> CompanyAttachedContacts</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all contacts that belong to a company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->listAttachedContacts(
    new ListAttachedContactsRequest([
        'companyId' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->listAttachedSegments($request) -> CompanyAttachedSegments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all segments that belong to a company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->listAttachedSegments(
    new ListSegmentsAttachedToCompanyRequest([
        'companyId' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->list($request) -> CompanyList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list companies. The company list is sorted by the `last_request_at` field and by default is ordered descending, most recently requested first.

Note that the API does not include companies who have no associated users in list responses.

When using the Companies endpoint and the pages object to iterate through the returned companies, there is a limit of 10,000 Companies that can be returned. If you need to list or iterate on more than 10,000 Companies, please use the [Scroll API](https://developers.intercom.com/reference#iterating-over-all-companies).
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->list(
    new ListCompaniesRequest([
        'page' => 1,
        'perPage' => 1,
        'order' => 'desc',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to return per page. Defaults to 15
    
</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — `asc` or `desc`. Return the companies in ascending or descending order. Defaults to desc
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->scroll($request) -> ?CompanyScroll</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

      The `list all companies` functionality does not work well for huge datasets, and can result in errors and performance problems when paging deeply. The Scroll API provides an efficient mechanism for iterating over all companies in a dataset.

- Each app can only have 1 scroll open at a time. You'll get an error message if you try to have more than one open per app.
- If the scroll isn't used for 1 minute, it expires and calls with that scroll param will fail
- If the end of the scroll is reached, "companies" will be empty and the scroll parameter will expire

{% admonition type="info" name="Scroll Parameter" %}
  You can get the first page of companies by simply sending a GET request to the scroll endpoint.
  For subsequent requests you will need to use the scroll parameter from the response.
{% /admonition %}
{% admonition type="danger" name="Scroll network timeouts" %}
  Since scroll is often used on large datasets network errors such as timeouts can be encountered. When this occurs you will see a HTTP 500 error with the following message:
  "Request failed due to an internal network error. Please restart the scroll operation."
  If this happens, you will need to restart your scroll query: It is not possible to continue from a specific point when using scroll.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->scroll(
    new ScrollCompaniesRequest([
        'scrollParam' => 'scroll_param',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$scrollParam:** `?string` — 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->attachContact($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can attach a company to a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->attachContact(
    new AttachContactToCompanyRequest([
        'contactId' => 'contact_id',
        'companyId' => '6762f09a1bb69f9f2193bb34',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->companies->detachContact($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can detach a company from a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->detachContact(
    new DetachContactFromCompanyRequest([
        'contactId' => '58a430d35458202d41b1e65b',
        'companyId' => '58a430d35458202d41b1e65b',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Contacts
<details><summary><code>$client->contacts->listAttachedCompanies($request) -> ContactAttachedCompanies</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of companies that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedCompanies(
    new ListAttachedCompaniesRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'page' => 1,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->listAttachedSegments($request) -> ContactSegments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of segments that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedSegments(
    new ListSegmentsAttachedToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->listAttachedSubscriptions($request) -> SubscriptionTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of subscription types that are attached to a contact. These can be subscriptions that a user has 'opted-in' to or has 'opted-out' from, depending on the subscription type.
This will return a list of Subscription Type objects that the contact is associated with.

The data property will show a combined list of:

  1.Opt-out subscription types that the user has opted-out from.
  2.Opt-in subscription types that the user has opted-in to receiving.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedSubscriptions(
    new ListAttachedSubscriptionsRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->attachSubscription($request) -> SubscriptionType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add a specific subscription to a contact. In Intercom, we have two different subscription types based on user consent - opt-out and opt-in:

  1.Attaching a contact to an opt-out subscription type will opt that user out from receiving messages related to that subscription type.

  2.Attaching a contact to an opt-in subscription type will opt that user in to receiving messages related to that subscription type.

This will return a subscription type model for the subscription type that was added to the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->attachSubscription(
    new AttachSubscriptionToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'subscriptionId' => '37846',
        'consentType' => 'opt_in',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `string` — The unique identifier for the subscription which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$consentType:** `string` — The consent_type of a subscription, opt_out or opt_in.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->detachSubscription($request) -> SubscriptionType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove a specific subscription from a contact. This will return a subscription type model for the subscription type that was removed from the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->detachSubscription(
    new DetachSubscriptionFromContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'subscriptionId' => '37846',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$subscriptionId:** `string` — The unique identifier for the subscription type which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->listAttachedTags($request) -> TagList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all tags that are attached to a specific contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedTags(
    new ListTagsAttachedToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->find($request) -> ContactsFindResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->find(
    new FindContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — contact_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->update($request) -> ContactsUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing contact (ie. user or lead).

{% admonition type="info" %}
  This endpoint handles both **contact updates** and **custom object associations**.

  See _`update a contact with an association to a custom object instance`_ in the request/response examples to see the custom object association format.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->update(
    new UpdateContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'email' => 'joebloggs@intercom.io',
        'name' => 'joe bloggs',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — id
    
</dd>
</dl>

<dl>
<dd>

**$role:** `?string` — The role of the contact.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — A unique identifier for the contact which is given to Intercom
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — The contacts email
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — The contacts phone
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The contacts name
    
</dd>
</dl>

<dl>
<dd>

**$avatar:** `?string` — An image URL containing the avatar of a contact
    
</dd>
</dl>

<dl>
<dd>

**$signedUpAt:** `?int` — The time specified for when a contact signed up
    
</dd>
</dl>

<dl>
<dd>

**$lastSeenAt:** `?int` — The time when the contact was last seen (either where the Intercom Messenger was installed or when specified manually)
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `?int` — The id of an admin that has been assigned account ownership of the contact
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribedFromEmails:** `?bool` — Whether the contact is unsubscribed from emails
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — The custom attributes which are set for the contact
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->delete($request) -> ContactDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->delete(
    new DeleteContactRequest([
        'contactId' => 'contact_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — contact_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->mergeLeadInUser($request) -> ContactsMergeLeadInUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can merge a contact with a `role` of `lead` into a contact with a `role` of `user`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->mergeLeadInUser(
    new MergeContactsRequest([
        'leadId' => '6762f0d51bb69f9f2193bb7f',
        'contactId' => '6762f0d51bb69f9f2193bb80',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$leadId:** `?string` — The unique identifier for the contact to merge away from. Must be a lead.
    
</dd>
</dl>

<dl>
<dd>

**$contactId:** `?string` — The unique identifier for the contact to merge into. Must be a user.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->search($request) -> ContactList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple contacts by the value of their attributes in order to fetch exactly who you want.

To search for contacts, you need to send a `POST` request to `https://api.intercom.io/contacts/search`.

This will accept a query object in the body which will define your filters in order to search for contacts.

{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `50` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}
### Contact Creation Delay

If a contact has recently been created, there is a possibility that it will not yet be available when searching. This means that it may not appear in the response. This delay can take a few minutes. If you need to be instantly notified it is recommended to use webhooks and iterate to see if they match your search filters.

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiple's there can be:
* There's a limit of max 2 nested filters
* There's a limit of max 15 filters for each AND or OR group

### Searching for Timestamp Fields

All timestamp fields (created_at, updated_at etc.) are indexed as Dates for Contact Search queries; Datetime queries are not currently supported. This means you can only query for timestamp fields by day - not hour, minute or second.
For example, if you search for all Contacts with a created_at value greater (>) than 1577869200 (the UNIX timestamp for January 1st, 2020 9:00 AM), that will be interpreted as 1577836800 (January 1st, 2020 12:00 AM). The search results will then include Contacts created from January 2nd, 2020 12:00 AM onwards.
If you'd like to get contacts created on January 1st, 2020 you should search with a created_at value equal (=) to 1577836800 (January 1st, 2020 12:00 AM).
This behaviour applies only to timestamps used in search queries. The search results will still contain the full UNIX timestamp and be sorted accordingly.

### Accepted Fields

Most key listed as part of the Contacts Model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).

| Field                              | Type                           |
| ---------------------------------- | ------------------------------ |
| id                                 | String                         |
| role                               | String<br>Accepts user or lead |
| name                               | String                         |
| avatar                             | String                         |
| owner_id                           | Integer                        |
| email                              | String                         |
| email_domain                       | String                         |
| phone                              | String                         |
| external_id                        | String                         |
| created_at                         | Date (UNIX Timestamp)          |
| signed_up_at                       | Date (UNIX Timestamp)          |
| updated_at                         | Date (UNIX Timestamp)          |
| last_seen_at                       | Date (UNIX Timestamp)          |
| last_contacted_at                  | Date (UNIX Timestamp)          |
| last_replied_at                    | Date (UNIX Timestamp)          |
| last_email_opened_at               | Date (UNIX Timestamp)          |
| last_email_clicked_at              | Date (UNIX Timestamp)          |
| language_override                  | String                         |
| browser                            | String                         |
| browser_language                   | String                         |
| os                                 | String                         |
| location.country                   | String                         |
| location.region                    | String                         |
| location.city                      | String                         |
| unsubscribed_from_emails           | Boolean                        |
| marked_email_as_spam               | Boolean                        |
| has_hard_bounced                   | Boolean                        |
| ios_last_seen_at                   | Date (UNIX Timestamp)          |
| ios_app_version                    | String                         |
| ios_device                         | String                         |
| ios_app_device                     | String                         |
| ios_os_version                     | String                         |
| ios_app_name                       | String                         |
| ios_sdk_version                    | String                         |
| android_last_seen_at               | Date (UNIX Timestamp)          |
| android_app_version                | String                         |
| android_device                     | String                         |
| android_app_name                   | String                         |
| andoid_sdk_version                 | String                         |
| segment_id                         | String                         |
| tag_id                             | String                         |
| custom_attributes.{attribute_name} | String                         |

### Accepted Operators

{% admonition type="warning" name="Searching based on `created_at`" %}
  You cannot use the `<=` or `>=` operators to search by `created_at`.
{% /admonition %}

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                      | Description                                                      |
| :------- | :------------------------------- | :--------------------------------------------------------------- |
| =        | All                              | Equals                                                           |
| !=       | All                              | Doesn't Equal                                                    |
| IN       | All                              | In<br>Shortcut for `OR` queries<br>Values must be in Array       |
| NIN      | All                              | Not In<br>Shortcut for `OR !` queries<br>Values must be in Array |
| >        | Integer<br>Date (UNIX Timestamp) | Greater than                                                     |
| <       | Integer<br>Date (UNIX Timestamp) | Lower than                                                       |
| ~        | String                           | Contains                                                         |
| !~       | String                           | Doesn't Contain                                                  |
| ^        | String                           | Starts With                                                      |
| $        | String                           | Ends With                                                        |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->searchContacts(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->list($request) -> ContactList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all contacts (ie. users or leads) in your workspace.
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `50` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->list(
    new ListContactsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — String used to get the next page of conversations.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->create($request) -> ContactsCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new contact (ie. user or lead).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->create(
    new CreateContactRequestWithEmail([
        'email' => 'joebloggs@intercom.io',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateContactRequestWithEmail|CreateContactRequestWithExternalId|CreateContactRequestWithRole` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->showContactByExternalId($request) -> ShowContactByExternalIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single contact by external ID. Note that this endpoint only supports users and not leads.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->showContactByExternalId(
    new ShowContactByExternalIdRequest([
        'externalId' => 'cdd29344-5e0c-4ef0-ac56-f9ba2979bc27',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — The external ID of the user that you want to retrieve
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->archive($request) -> ContactArchived</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can archive a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->archive(
    new ArchiveContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — contact_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->unarchive($request) -> ContactUnarchived</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can unarchive a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->unarchive(
    new UnarchiveContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — contact_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->contacts->blockContact($request) -> ContactBlocked</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Block a single contact.<br>**Note:** conversations of the contact will also be archived during the process.<br>More details in [FAQ How do I block Inbox spam?](https://www.intercom.com/help/en/articles/8838656-inbox-faqs)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->blockContact(
    new BlockContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — contact_id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Notes
<details><summary><code>$client->notes->list($request) -> NoteList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of notes that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->notes->list(
    new ListContactNotesRequest([
        'contactId' => 'contact_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier of a contact.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->notes->create($request) -> Note</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add a note to a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->notes->create(
    new CreateContactNoteRequest([
        'contactId' => '123',
        'body' => 'Hello',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier of a given contact.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — The text of the note.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?string` — The unique identifier of a given admin.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->notes->find($request) -> Note</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single note.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->notes->find(
    new FindNoteRequest([
        'noteId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$noteId:** `int` — The unique identifier of a given note
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tags
<details><summary><code>$client->tags->tagContact($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific contact. This will return a tag object for the tag that was added to the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagContact(
    new TagContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'tagId' => '7522907',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->untagContact($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific contact. This will return a tag object for the tag that was removed from the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->untagContact(
    new UntagContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'tagId' => '7522907',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->tagConversation($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific conversation. This will return a tag object for the tag that was added to the conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagConversation(
    new TagConversationRequest([
        'conversationId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '780',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — conversation_id
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->untagConversation($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific conversation. This will return a tag object for the tag that was removed from the conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->untagConversation(
    new UntagConversationRequest([
        'conversationId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — conversation_id
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — tag_id
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->list() -> TagList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all tags for a given workspace.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->create($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can use this endpoint to perform the following operations:

  **1. Create a new tag:** You can create a new tag by passing in the tag name as specified in "Create or Update Tag Request Payload" described below.

  **2. Update an existing tag:** You can update an existing tag by passing the id of the tag as specified in "Create or Update Tag Request Payload" described below.

  **3. Tag Companies:** You can tag single company or a list of companies. You can tag a company by passing in the tag name and the company details as specified in "Tag Company Request Payload" described below. Also, if the tag doesn't exist then a new one will be created automatically.

  **4. Untag Companies:** You can untag a single company or a list of companies. You can untag a company by passing in the tag id and the company details as specified in "Untag Company Request Payload" described below.

  **5. Tag Multiple Users:** You can tag a list of users. You can tag the users by passing in the tag name and the user details as specified in "Tag Users Request Payload" described below.

Each operation will return a tag object.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->create(
    new CreateOrUpdateTagRequest([
        'name' => 'test',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateOrUpdateTagRequest|TagCompanyRequest|UntagCompanyRequest|TagMultipleUsersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->find($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of tags that are on the workspace by their id.
This will return a tag object.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->find(
    new FindTagRequest([
        'tagId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tagId:** `string` — The unique identifier of a given tag
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->delete($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete the details of tags that are on the workspace by passing in the id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->delete(
    new DeleteTagRequest([
        'tagId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$tagId:** `string` — The unique identifier of a given tag
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->tagTicket($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific ticket. This will return a tag object for the tag that was added to the ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagTicket(
    new TagTicketRequest([
        'ticketId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '780',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — ticket_id
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tags->untagTicket($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific ticket. This will return a tag object for the tag that was removed from the ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->untagTicket(
    new UntagTicketRequest([
        'ticketId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — ticket_id
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conversations
<details><summary><code>$client->conversations->list($request) -> ConversationList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all conversations.

You can optionally request the result page size and the cursor to start after to fetch the result.
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->list(
    new ListConversationsRequest([
        'perPage' => 1,
        'startingAfter' => 'starting_after',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$perPage:** `?int` — How many results per page
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — String used to get the next page of conversations.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->create($request) -> Message</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a conversation that has been initiated by a contact (ie. user or lead).
The conversation can be an in-app message only.

{% admonition type="info" name="Sending for visitors" %}
You can also send a message from a visitor by specifying their `user_id` or `id` value in the `from` field, along with a `type` field value of `contact`.
This visitor will be automatically converted to a contact with a lead role once the conversation is created.
{% /admonition %}

This will return the Message model that has been created.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->create(
    new CreateConversationRequest([
        'from' => new CreateConversationRequestFrom([
            'type' => CreateConversationRequestFromType::User->value,
            'id' => '6762f11b1bb69f9f2193bba3',
        ]),
        'body' => 'Hello there',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `CreateConversationRequestFrom` 
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — The content of the message. HTML is not supported.
    
</dd>
</dl>

<dl>
<dd>

**$createdAt:** `?int` — The time the conversation was created as a UTC Unix timestamp. If not provided, the current time will be used. This field is only recommneded for migrating past conversations from another source into Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->find($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can fetch the details of a single conversation.

This will return a single Conversation model with all its conversation parts.

{% admonition type="warning" name="Hard limit of 500 parts" %}
The maximum number of conversation parts that can be returned via the API is 500. If you have more than that we will return the 500 most recent conversation parts.
{% /admonition %}

For AI agent conversation metadata, please note that you need to have the agent enabled in your workspace, which is a [paid feature](https://www.intercom.com/help/en/articles/8205718-fin-resolutions#h_97f8c2e671).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->find(
    new FindConversationRequest([
        'conversationId' => '123',
        'displayAs' => 'plaintext',
        'includeTranslations' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$displayAs:** `?string` — Set to plaintext to retrieve conversation messages in plain text.
    
</dd>
</dl>

<dl>
<dd>

**$includeTranslations:** `?bool` — If set to true, conversation parts will be translated to the detected language of the conversation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->update($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can update an existing conversation.

{% admonition type="info" name="Replying and other actions" %}
If you want to reply to a coveration or take an action such as assign, unassign, open, close or snooze, take a look at the reply and manage endpoints.
{% /admonition %}

{% admonition type="info" %}
  This endpoint handles both **conversation updates** and **custom object associations**.

  See _`update a conversation with an association to a custom object instance`_ in the request/response examples to see the custom object association format.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->update(
    new UpdateConversationRequest([
        'conversationId' => 'conversation_id',
        'displayAs' => 'plaintext',
        'read' => true,
        'title' => 'new conversation title',
        'customAttributes' => [
            'issue_type' => 'Billing',
            'priority' => 'High',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$displayAs:** `?string` — Set to plaintext to retrieve conversation messages in plain text.
    
</dd>
</dl>

<dl>
<dd>

**$read:** `?bool` — Mark a conversation as read within Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title given to the conversation
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The ID of the company that the conversation is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->deleteConversation($request) -> ConversationDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->deleteConversation(
    new DeleteConversationRequest([
        'conversationId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `int` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->search($request) -> ConversationList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple conversations by the value of their attributes in order to fetch exactly which ones you want.

To search for conversations, you need to send a `POST` request to `https://api.intercom.io/conversations/search`.

This will accept a query object in the body which will define your filters in order to search for conversations.
{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `20` results per page and maximum is `150`.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiple's there can be:
- There's a limit of max 2 nested filters
- There's a limit of max 15 filters for each AND or OR group

### Accepted Fields

Most keys listed in the conversation model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.

| Field                                     | Type                                                                                                                                                   |
| :---------------------------------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------- |
| id                                        | String                                                                                                                                                 |
| created_at                                | Date (UNIX timestamp)                                                                                                                                  |
| updated_at                                | Date (UNIX timestamp)                                                                                                                                  |
| source.type                               | String<br>Accepted fields are `conversation`, `email`, `facebook`, `instagram`, `phone_call`, `phone_switch`, `push`, `sms`, `twitter` and `whatsapp`. |
| source.id                                 | String                                                                                                                                                 |
| source.delivered_as                       | String                                                                                                                                                 |
| source.subject                            | String                                                                                                                                                 |
| source.body                               | String                                                                                                                                                 |
| source.author.id                          | String                                                                                                                                                 |
| source.author.type                        | String                                                                                                                                                 |
| source.author.name                        | String                                                                                                                                                 |
| source.author.email                       | String                                                                                                                                                 |
| source.url                                | String                                                                                                                                                 |
| contact_ids                               | String                                                                                                                                                 |
| teammate_ids                              | String                                                                                                                                                 |
| admin_assignee_id                         | String                                                                                                                                                 |
| team_assignee_id                          | String                                                                                                                                                 |
| channel_initiated                         | String                                                                                                                                                 |
| open                                      | Boolean                                                                                                                                                |
| read                                      | Boolean                                                                                                                                                |
| state                                     | String                                                                                                                                                 |
| waiting_since                             | Date (UNIX timestamp)                                                                                                                                  |
| snoozed_until                             | Date (UNIX timestamp)                                                                                                                                  |
| tag_ids                                   | String                                                                                                                                                 |
| priority                                  | String                                                                                                                                                 |
| statistics.time_to_assignment             | Integer                                                                                                                                                |
| statistics.time_to_admin_reply            | Integer                                                                                                                                                |
| statistics.time_to_first_close            | Integer                                                                                                                                                |
| statistics.time_to_last_close             | Integer                                                                                                                                                |
| statistics.median_time_to_reply           | Integer                                                                                                                                                |
| statistics.first_contact_reply_at         | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_assignment_at            | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_admin_reply_at           | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_close_at                 | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_assignment_at             | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_assignment_admin_reply_at | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_contact_reply_at          | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_admin_reply_at            | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_close_at                  | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_closed_by_id              | String                                                                                                                                                 |
| statistics.count_reopens                  | Integer                                                                                                                                                |
| statistics.count_assignments              | Integer                                                                                                                                                |
| statistics.count_conversation_parts       | Integer                                                                                                                                                |
| conversation_rating.requested_at          | Date (UNIX timestamp)                                                                                                                                  |
| conversation_rating.replied_at            | Date (UNIX timestamp)                                                                                                                                  |
| conversation_rating.score                 | Integer                                                                                                                                                |
| conversation_rating.remark                | String                                                                                                                                                 |
| conversation_rating.contact_id            | String                                                                                                                                                 |
| conversation_rating.admin_d               | String                                                                                                                                                 |
| ai_agent_participated                     | Boolean                                                                                                                                                |
| ai_agent.resolution_state                 | String                                                                                                                                                 |
| ai_agent.last_answer_type                 | String                                                                                                                                                 |
| ai_agent.rating                           | Integer                                                                                                                                                |
| ai_agent.rating_remark                    | String                                                                                                                                                 |
| ai_agent.source_type                      | String                                                                                                                                                 |
| ai_agent.source_title                     | String                                                                                                                                                 |

### Accepted Operators

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                    | Description                                                  |
| :------- | :----------------------------- | :----------------------------------------------------------- |
| =        | All                            | Equals                                                       |
| !=       | All                            | Doesn't Equal                                                |
| IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
| NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
| >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
| <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
| ~        | String                         | Contains                                                     |
| !~       | String                         | Doesn't Contain                                              |
| ^        | String                         | Starts With                                                  |
| $        | String                         | Ends With                                                    |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->searchConversations(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->reply($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can reply to a conversation with a message from an admin or on behalf of a contact, or with a note for admins.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->reply(
    new ReplyToConversationRequest([
        'conversationId' => '123 or "last"',
        'body' => new ContactReplyIntercomUserIdRequest([
            'messageType' => 'comment',
            'type' => 'user',
            'body' => 'Thanks again :)',
            'intercomUserId' => '6762f1571bb69f9f2193bbbb',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The Intercom provisioned identifier for the conversation or the string "last" to reply to the last part of the conversation
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ContactReplyIntercomUserIdRequest|ContactReplyEmailRequest|ContactReplyUserIdRequest|AdminReplyConversationRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->manage($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

For managing conversations you can:
- Close a conversation
- Snooze a conversation to reopen on a future date
- Open a conversation which is `snoozed` or `closed`
- Assign a conversation to an admin and/or team.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->manage(
    new ManageConversationPartsRequest([
        'conversationId' => '123',
        'body' => ConversationsManageRequestBody::close(new CloseConversationRequest([
            'type' => 'admin',
            'adminId' => '12345',
        ])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ConversationsManageRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->attachContactAsAdmin($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.

{% admonition type="warning" name="Contacts without an email" %}
If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->attachContactAsAdmin(
    new AttachContactToConversationRequest([
        'conversationId' => '123',
        'adminId' => '12345',
        'customer' => new AttachContactToConversationRequestCustomerIntercomUserId([
            'intercomUserId' => '6762f19b1bb69f9f2193bbd4',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?string` — The `id` of the admin who is adding the new participant.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `AttachContactToConversationRequestCustomerIntercomUserId|AttachContactToConversationRequestCustomerUserId|AttachContactToConversationRequestCustomerCustomer|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->detachContactAsAdmin($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.

{% admonition type="warning" name="Contacts without an email" %}
If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->detachContactAsAdmin(
    new DetachContactFromConversationRequest([
        'conversationId' => '123',
        'contactId' => '123',
        'adminId' => '5017690',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$contactId:** `string` — The identifier for the contact as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The `id` of the admin who is performing the action.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->redactConversationPart($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can redact a conversation part or the source message of a conversation (as seen in the source object).

{% admonition type="info" name="Redacting parts and messages" %}
If you are redacting a conversation part, it must have a `body`. If you are redacting a source message, it must have been created by a contact. We will return a `conversation_part_not_redactable` error if these criteria are not met.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->redactConversationPart(
    RedactConversationRequest::conversationPart(new RedactConversationRequestConversationPart([
        'conversationId' => '19894788788',
        'conversationPartId' => '19381789428',
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `RedactConversationRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->convertToTicket($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can convert a conversation to a ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->convertToTicket(
    new ConvertConversationToTicketRequest([
        'conversationId' => 1,
        'ticketTypeId' => '53',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `int` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$ticketTypeId:** `string` — The ID of the type of ticket you want to convert the conversation to
    
</dd>
</dl>

<dl>
<dd>

**$attributes:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->conversations->runAssignmentRules($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

{% admonition type="danger" name="Deprecation of Run Assignment Rules" %}
Run assignment rules is now deprecated in version 2.12 and future versions and will be permanently removed on December 31, 2026. After this date, any requests made to this endpoint will fail.
{% /admonition %}
You can let a conversation be automatically assigned following assignment rules.
{% admonition type="warning" name="When using workflows" %}
It is not possible to use this endpoint with Workflows.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->runAssignmentRules(
    new AutoAssignConversationRequest([
        'conversationId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Custom Channel Events
<details><summary><code>$client->customChannelEvents->notifyNewConversation($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a new conversation was created in your custom channel/platform. This triggers conversation creation and workflow automations within Intercom for your custom channel integration.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyNewConversation(
    new CustomChannelBaseEvent([
        'eventId' => 'event_id',
        'externalConversationId' => 'external_conversation_id',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'external_id',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CustomChannelBaseEvent` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customChannelEvents->notifyNewMessage($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a new message was sent in a conversation on your custom channel/platform. This allows Intercom to process the message and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyNewMessage(
    new NotifyNewMessageRequest([
        'eventId' => 'event_id',
        'externalConversationId' => 'external_conversation_id',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'external_id',
        ]),
        'body' => 'body',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$body:** `string` — The message content sent by the user.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customChannelEvents->notifyQuickReplySelected($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a user selected a quick reply option in your custom channel/platform. This allows Intercom to process the response and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyQuickReplySelected(
    new NotifyQuickReplySelectedRequest([
        'eventId' => 'evt_67890',
        'externalConversationId' => 'conv_13579',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'user_003',
            'name' => 'Alice Example',
            'email' => 'alice@example.com',
        ]),
        'quickReplyOptionId' => '1234',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$quickReplyOptionId:** `string` — Id of the selected quick reply option.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customChannelEvents->notifyAttributeCollected($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a user provided a response to an attribute collector in your custom channel/platform. This allows Intercom to process the attribute and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyAttributeCollected(
    new NotifyAttributeCollectedRequest([
        'eventId' => 'event_id',
        'externalConversationId' => 'external_conversation_id',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'external_id',
        ]),
        'attribute' => new CustomChannelAttribute([
            'id' => 'id',
            'value' => 'value',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$attribute:** `CustomChannelAttribute` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Custom Object Instances
<details><summary><code>$client->customObjectInstances->getCustomObjectInstancesByExternalId($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch a Custom Object Instance by external_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->getCustomObjectInstancesByExternalId(
    new GetCustomObjectInstancesByExternalIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => 'external_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customObjectInstances->createCustomObjectInstances($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a custom object instance
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->createCustomObjectInstances(
    new CreateOrUpdateCustomObjectInstanceRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => '123',
        'externalCreatedAt' => 1392036272,
        'externalUpdatedAt' => 1392036272,
        'customAttributes' => [
            'order_number' => 'ORDER-12345',
            'total_amount' => 'custom_attributes',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — A unique identifier for the Custom Object instance in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$externalCreatedAt:** `?int` — The time when the Custom Object instance was created in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$externalUpdatedAt:** `?int` — The time when the Custom Object instance was last updated in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — The custom attributes which are set for the Custom Object instance.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customObjectInstances->deleteCustomObjectInstancesById($request) -> CustomObjectInstanceDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a single Custom Object instance by external_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->deleteCustomObjectInstancesById(
    new DeleteCustomObjectInstancesByIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => 'external_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customObjectInstances->getCustomObjectInstancesById($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch a Custom Object Instance by id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->getCustomObjectInstancesById(
    new GetCustomObjectInstancesByIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'customObjectInstanceId' => 'custom_object_instance_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$customObjectInstanceId:** `string` — The id or external_id of the custom object instance
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->customObjectInstances->deleteCustomObjectInstancesByExternalId($request) -> CustomObjectInstanceDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a single Custom Object instance using the Intercom defined id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->deleteCustomObjectInstancesByExternalId(
    new DeleteCustomObjectInstancesByExternalIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'customObjectInstanceId' => 'custom_object_instance_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$customObjectInstanceId:** `string` — The Intercom defined id of the custom object instance
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Data Attributes
<details><summary><code>$client->dataAttributes->list($request) -> DataAttributeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all data attributes belonging to a workspace for contacts, companies or conversations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataAttributes->list(
    new ListDataAttributesRequest([
        'model' => DataAttributesListRequestModel::Contact->value,
        'includeArchived' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$model:** `?string` — Specify the data attribute model to return.
    
</dd>
</dl>

<dl>
<dd>

**$includeArchived:** `?bool` — Include archived attributes in the list. By default we return only non archived data attributes.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataAttributes->create($request) -> DataAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a data attributes for a `contact` or a `company`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataAttributes->create(
    new CreateDataAttributeRequestOptions([
        'dataType' => 'string',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateDataAttributeRequestOptions|CreateDataAttributeRequestOne` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->dataAttributes->update($request) -> DataAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can update a data attribute.

> 🚧 Updating the data type is not possible
>
> It is currently a dangerous action to execute changing a data attribute's type via the API. You will need to update the type via the UI instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataAttributes->update(
    new UpdateDataAttributeRequest([
        'dataAttributeId' => 1,
        'body' => new UpdateDataAttributeRequestOptions([
            'options' => [
                new UpdateDataAttributeRequestOptionsOptionsItem([
                    'value' => '1-10',
                ]),
                new UpdateDataAttributeRequestOptionsOptionsItem([
                    'value' => '11-20',
                ]),
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$dataAttributeId:** `int` — The data attribute id
    
</dd>
</dl>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Events
<details><summary><code>$client->events->list($request) -> DataEventSummary</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


> 🚧
>
> Please note that you can only 'list' events that are less than 90 days old. Event counts and summaries will still include your events older than 90 days but you cannot 'list' these events individually if they are older than 90 days

The events belonging to a customer can be listed by sending a GET request to `https://api.intercom.io/events` with a user or lead identifier along with a `type` parameter. The identifier parameter can be one of `user_id`, `email` or `intercom_user_id`. The `type` parameter value must be `user`.

- `https://api.intercom.io/events?type=user&user_id={user_id}`
- `https://api.intercom.io/events?type=user&email={email}`
- `https://api.intercom.io/events?type=user&intercom_user_id={id}` (this call can be used to list leads)

The `email` parameter value should be [url encoded](http://en.wikipedia.org/wiki/Percent-encoding) when sending.

You can optionally define the result page size as well with the `per_page` parameter.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->list(
    new ListEventsRequest([
        'userId' => 'user_id',
        'intercomUserId' => 'intercom_user_id',
        'email' => 'email',
        'type' => 'type',
        'summary' => true,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `?string` — user_id query parameter
    
</dd>
</dl>

<dl>
<dd>

**$intercomUserId:** `?string` — intercom_user_id query parameter
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — email query parameter
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — The value must be user
    
</dd>
</dl>

<dl>
<dd>

**$summary:** `?bool` — summary flag
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->events->create($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You will need an Access Token that has write permissions to send Events. Once you have a key you can submit events via POST to the Events resource, which is located at https://api.intercom.io/events, or you can send events using one of the client libraries. When working with the HTTP API directly a client should send the event with a `Content-Type` of `application/json`.

When using the JavaScript API, [adding the code to your app](http://docs.intercom.io/configuring-Intercom/tracking-user-events-in-your-app) makes the Events API available. Once added, you can submit an event using the `trackEvent` method. This will associate the event with the Lead or currently logged-in user or logged-out visitor/lead and send it to Intercom. The final parameter is a map that can be used to send optional metadata about the event.

With the Ruby client you pass a hash describing the event to `Intercom::Event.create`, or call the `track_user` method directly on the current user object (e.g. `user.track_event`).

**NB: For the JSON object types, please note that we do not currently support nested JSON structure.**

| Type            | Description                                                                                                                                                                                                     | Example                                                                           |
| :-------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :-------------------------------------------------------------------------------- |
| String          | The value is a JSON String                                                                                                                                                                                      | `"source":"desktop"`                                                              |
| Number          | The value is a JSON Number                                                                                                                                                                                      | `"load": 3.67`                                                                    |
| Date            | The key ends with the String `_date` and the value is a [Unix timestamp](http://en.wikipedia.org/wiki/Unix_time), assumed to be in the [UTC](http://en.wikipedia.org/wiki/Coordinated_Universal_Time) timezone. | `"contact_date": 1392036272`                                                      |
| Link            | The value is a HTTP or HTTPS URI.                                                                                                                                                                               | `"article": "https://example.org/ab1de.html"`                                     |
| Rich Link       | The value is a JSON object that contains `url` and `value` keys.                                                                                                                                                | `"article": {"url": "https://example.org/ab1de.html", "value":"the dude abides"}` |
| Monetary Amount | The value is a JSON object that contains `amount` and `currency` keys. The `amount` key is a positive integer representing the amount in cents. The price in the example to the right denotes €349.99.          | `"price": {"amount": 34999, "currency": "eur"}`                                   |

**Lead Events**

When submitting events for Leads, you will need to specify the Lead's `id`.

**Metadata behaviour**

- We currently limit the number of tracked metadata keys to 10 per event. Once the quota is reached, we ignore any further keys we receive. The first 10 metadata keys are determined by the order in which they are sent in with the event.
- It is not possible to change the metadata keys once the event has been sent. A new event will need to be created with the new keys and you can archive the old one.
- There might be up to 24 hrs delay when you send a new metadata for an existing event.

**Event de-duplication**

The API may detect and ignore duplicate events. Each event is uniquely identified as a combination of the following data - the Workspace identifier, the Contact external identifier, the Data Event name and the Data Event created time. As a result, it is **strongly recommended** to send a second granularity Unix timestamp in the `created_at` field.

Duplicated events are responded to using the normal `202 Accepted` code - an error is not thrown, however repeat requests will be counted against any rate limit that is in place.

### HTTP API Responses

- Successful responses to submitted events return `202 Accepted` with an empty body.
- Unauthorised access will be rejected with a `401 Unauthorized` or `403 Forbidden` response code.
- Events sent about users that cannot be found will return a `404 Not Found`.
- Event lists containing duplicate events will have those duplicates ignored.
- Server errors will return a `500` response code and may contain an error message in the body.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->create(
    new CreateDataEventRequestWithId([
        'id' => '8a88a590-e1c3-41e2-a502-e0649dbf721c',
        'eventName' => 'invited-friend',
        'createdAt' => 1671028894,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateDataEventRequestWithId|CreateDataEventRequestWithUserId|CreateDataEventRequestWithEmail` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->events->summaries($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create event summaries for a user. Event summaries are used to track the number of times an event has occurred, the first time it occurred and the last time it occurred.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->summaries(
    new ListEventSummariesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `?string` — Your identifier for the user.
    
</dd>
</dl>

<dl>
<dd>

**$eventSummaries:** `?CreateDataEventSummariesRequestEventSummaries` — A list of event summaries for the user. Each event summary should contain the event name, the time the event occurred, and the number of times the event occurred. The event name should be a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Jobs
<details><summary><code>$client->jobs->status($request) -> Jobs</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the status of job execution.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->jobs->status(
    new JobsStatusRequest([
        'jobId' => 'job_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobId:** `string` — The unique identifier for the job which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Messages
<details><summary><code>$client->messages->create($request) -> Message</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a message that has been initiated by an admin. The conversation can be either an in-app message or an email.

> 🚧 Sending for visitors
>
> There can be a short delay between when a contact is created and when a contact becomes available to be messaged through the API. A 404 Not Found error will be returned in this case.

This will return the Message model that has been created.

> 🚧 Retrieving Associated Conversations
>
> As this is a message, there will be no conversation present until the contact responds. Once they do, you will have to search for a contact's conversations with the id of the message.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->messages->create(
    CreateMessageRequest::email(new CreateMessageRequestWithEmail([
        'subject' => 'Thanks for everything',
        'body' => 'Hello there',
        'template' => 'plain',
        'from' => new CreateMessageRequestFrom([
            'type' => 'admin',
            'id' => 394051,
        ]),
        'to' => new CreateMessageRequestTo([
            'type' => CreateMessageRequestType::User->value,
            'id' => '536e564f316c83104c000020',
        ]),
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateMessageRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Segments
<details><summary><code>$client->segments->list($request) -> SegmentList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all segments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->list(
    new ListSegmentsRequest([
        'includeCount' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeCount:** `?bool` — It includes the count of contacts that belong to each segment.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->segments->find($request) -> Segment</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->find(
    new FindSegmentRequest([
        'segmentId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$segmentId:** `string` — The unique identified of a given segment.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscription Types
<details><summary><code>$client->subscriptionTypes->list() -> SubscriptionTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list all subscription types. A list of subscription type objects will be returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionTypes->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## PhoneCallRedirects
<details><summary><code>$client->phoneCallRedirects->create($request) -> ?PhoneSwitch</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can use the API to deflect phone calls to the Intercom Messenger.
Calling this endpoint will send an SMS with a link to the Messenger to the phone number specified.

If custom attributes are specified, they will be added to the user or lead's custom data attributes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneCallRedirects->create(
    new CreatePhoneSwitchRequest([
        'phone' => '+353832345678',
        'customAttributes' => [
            'issue_type' => 'Billing',
            'priority' => 'High',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreatePhoneSwitchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Calls
<details><summary><code>$client->calls->listCalls($request) -> CallList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of calls.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->listCalls(
    new ListCallsRequest([
        'page' => 1,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 25. Max 25.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->calls->showCall($request) -> Call</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single call by id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->showCall(
    new ShowCallRequest([
        'callId' => 'call_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$callId:** `string` — The id of the call to retrieve
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->calls->showCallRecording($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Redirects to a signed URL for the call's recording if it exists.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->showCallRecording(
    new ShowCallRecordingRequest([
        'callId' => 'call_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$callId:** `string` — The id of the call
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->calls->showCallTranscript($request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the transcript for the specified call as a downloadable text file.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->showCallTranscript(
    new ShowCallTranscriptRequest([
        'callId' => 'call_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$callId:** `string` — The id of the call
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->calls->listCallsWithTranscripts($request) -> ListCallsWithTranscriptsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve calls by a list of conversation ids and include transcripts when available.
A maximum of 20 `conversation_ids` can be provided. If none are provided or more than 20 are provided, a 400 error is returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->listCallsWithTranscripts(
    new ListCallsWithTranscriptsRequest([
        'conversationIds' => [
            '64619700005694',
            '64619700005695',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationIds:** `array` — A list of conversation ids to fetch calls for. Maximum 20.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Teams
<details><summary><code>$client->teams->list() -> TeamList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

This will return a list of team objects for the App.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->teams->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->teams->find($request) -> Team</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single team, containing an array of admins that belong to this team.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->teams->find(
    new FindTeamRequest([
        'teamId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$teamId:** `string` — The unique identifier of a given team.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ticket States
<details><summary><code>$client->ticketStates->listTicketStates() -> TicketStateList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a list of all ticket states for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketStates->listTicketStates();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ticket Types
<details><summary><code>$client->ticketTypes->list() -> TicketTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a list of all ticket types for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->ticketTypes->create($request) -> ?TicketType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new ticket type.
> 📘 Creating ticket types.
>
> Every ticket type will be created with two default attributes: _default_title_ and _default_description_.
> For the `icon` propery, use an emoji from [Twemoji Cheatsheet](https://twemoji-cheatsheet.vercel.app/)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->create(
    new CreateTicketTypeRequest([
        'name' => 'Customer Issue',
        'description' => 'Customer Report Template',
        'category' => CreateTicketTypeRequestCategory::Customer->value,
        'icon' => '🎟️',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateTicketTypeRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->ticketTypes->get($request) -> ?TicketType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->get(
    new FindTicketTypeRequest([
        'ticketTypeId' => 'ticket_type_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->ticketTypes->update($request) -> ?TicketType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can update a ticket type.

> 📘 Updating a ticket type.
>
> For the `icon` propery, use an emoji from [Twemoji Cheatsheet](https://twemoji-cheatsheet.vercel.app/)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->update(
    new UpdateTicketTypeRequest([
        'ticketTypeId' => 'ticket_type_id',
        'name' => 'Bug Report 2',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$category:** `?string` — Category of the Ticket Type.
    
</dd>
</dl>

<dl>
<dd>

**$icon:** `?string` — The icon of the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$archived:** `?bool` — The archived status of the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$isInternal:** `?bool` — Whether the tickets associated with this ticket type are intended for internal use only or will be shared with customers. This is currently a limited attribute.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tickets
<details><summary><code>$client->tickets->reply($request) -> TicketReply</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can reply to a ticket with a message from an admin or on behalf of a contact, or with a note for admins.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->reply(
    new ReplyToTicketRequest([
        'ticketId' => '123',
        'body' => new ContactReplyTicketIntercomUserIdRequest([
            'messageType' => 'comment',
            'type' => 'user',
            'body' => 'Thanks again :)',
            'intercomUserId' => '6762f2971bb69f9f2193bc49',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ContactReplyTicketIntercomUserIdRequest|ContactReplyTicketUserIdRequest|ContactReplyTicketEmailRequest|AdminReplyTicketRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->create($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->create(
    new CreateTicketRequest([
        'ticketTypeId' => '1234',
        'contacts' => [
            new CreateTicketRequestContactsItemId([
                'id' => '6762f2d81bb69f9f2193bc54',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$skipNotifications:** `?bool` — Option to disable notifications when a Ticket is created.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->enqueueCreateTicket($request) -> Jobs</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enqueues ticket creation for asynchronous processing, returning if the job was enqueued successfully to be processed. We attempt to perform a best-effort validation on inputs before tasks are enqueued. If the given parameters are incorrect, we won't enqueue the job.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->enqueueCreateTicket(
    new EnqueueCreateTicketRequest([
        'ticketTypeId' => '1234',
        'contacts' => [
            new CreateTicketRequestContactsItemId([
                'id' => '6762f2d81bb69f9f2193bc54',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$skipNotifications:** `?bool` — Option to disable notifications when a Ticket is created.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->get($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->get(
    new FindTicketRequest([
        'ticketId' => 'ticket_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — The unique identifier for the ticket which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->update($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update a ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->update(
    new UpdateTicketRequest([
        'ticketId' => 'ticket_id',
        'ticketAttributes' => [
            '_default_title_' => "example",
            '_default_description_' => "there is a problem",
        ],
        'ticketStateId' => '123',
        'open' => true,
        'snoozedUntil' => 1673609604,
        'adminId' => 991268011,
        'assigneeId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — The unique identifier for the ticket which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$ticketAttributes:** `?array` — The attributes set on the ticket.
    
</dd>
</dl>

<dl>
<dd>

**$ticketStateId:** `?string` — The ID of the ticket state associated with the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The ID of the company that the ticket is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
    
</dd>
</dl>

<dl>
<dd>

**$open:** `?bool` — Specify if a ticket is open. Set to false to close a ticket. Closing a ticket will also unsnooze it.
    
</dd>
</dl>

<dl>
<dd>

**$isShared:** `?bool` — Specify whether the ticket is visible to users.
    
</dd>
</dl>

<dl>
<dd>

**$snoozedUntil:** `?int` — The time you want the ticket to reopen.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?int` — The ID of the admin performing ticket update. Needed for workflows execution and attributing actions to specific admins.
    
</dd>
</dl>

<dl>
<dd>

**$assigneeId:** `?string` — The ID of the admin or team to which the ticket is assigned. Set this 0 to unassign it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->deleteTicket($request) -> DeleteTicketResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a ticket using the Intercom provided ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->deleteTicket(
    new DeleteTicketRequest([
        'ticketId' => 'ticket_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — The unique identifier for the ticket which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->tickets->search($request) -> TicketList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple tickets by the value of their attributes in order to fetch exactly which ones you want.

To search for tickets, you send a `POST` request to `https://api.intercom.io/tickets/search`.

This will accept a query object in the body which will define your filters.
{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiples there can be:
- There's a limit of max 2 nested filters
- There's a limit of max 15 filters for each AND or OR group

### Accepted Fields

Most keys listed as part of the Ticket model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foobar"`).
The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.

| Field                                     | Type                                                                                     |
| :---------------------------------------- | :--------------------------------------------------------------------------------------- |
| id                                        | String                                                                                   |
| created_at                                | Date (UNIX timestamp)                                                                    |
| updated_at                                | Date (UNIX timestamp)                                                                    |
| title                           | String                                                                                   |
| description                     | String                                                                                   |
| category                                  | String                                                                                   |
| ticket_type_id                            | String                                                                                   |
| contact_ids                               | String                                                                                   |
| teammate_ids                              | String                                                                                   |
| admin_assignee_id                         | String                                                                                   |
| team_assignee_id                          | String                                                                                   |
| open                                      | Boolean                                                                                  |
| state                                     | String                                                                                   |
| snoozed_until                             | Date (UNIX timestamp)                                                                    |
| ticket_attribute.{id}                     | String or Boolean or Date (UNIX timestamp) or Float or Integer                           |

{% admonition type="info" name="Searching by Category" %}
When searching for tickets by the **`category`** field, specific terms must be used instead of the category names:
* For **Customer** category tickets, use the term `request`.
* For **Back-office** category tickets, use the term `task`.
* For **Tracker** category tickets, use the term `tracker`.
{% /admonition %}

### Accepted Operators

{% admonition type="info" name="Searching based on `created_at`" %}
  You may use the `<=` or `>=` operators to search by `created_at`.
{% /admonition %}

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                    | Description                                                  |
| :------- | :----------------------------- | :----------------------------------------------------------- |
| =        | All                            | Equals                                                       |
| !=       | All                            | Doesn't Equal                                                |
| IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
| NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
| >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
| <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
| ~        | String                         | Contains                                                     |
| !~       | String                         | Doesn't Contain                                              |
| ^        | String                         | Starts With                                                  |
| $        | String                         | Ends With                                                    |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->searchTickets(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Visitors
<details><summary><code>$client->visitors->find($request) -> ?Visitor</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single visitor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->visitors->find(
    new FindVisitorRequest([
        'userId' => 'user_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — The user_id of the Visitor you want to retrieve.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->visitors->update($request) -> ?Visitor</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sending a PUT request to `/visitors` will result in an update of an existing Visitor.

**Option 1.** You can update a visitor by passing in the `user_id` of the visitor in the Request body.

**Option 2.** You can update a visitor by passing in the `id` of the visitor in the Request body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->visitors->update(
    new UpdateVisitorRequestWithId([
        'id' => '6762f30c1bb69f9f2193bc5e',
        'name' => 'Gareth Bale',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `UpdateVisitorRequestWithId|UpdateVisitorRequestWithUserId` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->visitors->mergeToContact($request) -> Contact</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can merge a Visitor to a Contact of role type `lead` or `user`.

> 📘 What happens upon a visitor being converted?
>
> If the User exists, then the Visitor will be merged into it, the Visitor deleted and the User returned. If the User does not exist, the Visitor will be converted to a User, with the User identifiers replacing it's Visitor identifiers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->visitors->convertVisitor(
    new ConvertVisitorRequest([
        'type' => 'user',
        'user' => [
            'id' => "8a88a590-e1c3-41e2-a502-e0649dbf721c",
            'email' => "foo@bar.com",
        ],
        'visitor' => [
            'user_id' => "3ecf64d0-9ed1-4e9f-88e1-da7d6e6782f3",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string` — Represents the role of the Contact model. Accepts `lead` or `user`.
    
</dd>
</dl>

<dl>
<dd>

**$user:** `UserWithId|UserWithUserId` — The unique identifiers retained after converting or merging.
    
</dd>
</dl>

<dl>
<dd>

**$visitor:** `VisitorWithId|VisitorWithUserId|VisitorWithEmail` — The unique identifiers to convert a single Visitor.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## HelpCenters Collections
<details><summary><code>$client->helpCenters->collections->list($request) -> CollectionList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all collections by making a GET request to `https://api.intercom.io/help_center/collections`.

Collections will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated collections first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->list(
    new ListCollectionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->helpCenters->collections->create($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new collection by making a POST request to `https://api.intercom.io/help_center/collections.`
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->create(
    new CreateCollectionRequest([
        'name' => 'Thanks for everything',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The name of the collection. For multilingual collections, this will be the name of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the collection. For multilingual collections, this will be the description of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$translatedContent:** `?GroupTranslatedContent` 
    
</dd>
</dl>

<dl>
<dd>

**$parentId:** `?string` — The id of the parent collection. If `null` then it will be created as the first level collection.
    
</dd>
</dl>

<dl>
<dd>

**$helpCenterId:** `?int` — The id of the help center where the collection will be created. If `null` then it will be created in the default help center.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->helpCenters->collections->find($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single collection by making a GET request to `https://api.intercom.io/help_center/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->find(
    new FindCollectionRequest([
        'collectionId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$collectionId:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->helpCenters->collections->update($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update the details of a single collection by making a PUT request to `https://api.intercom.io/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->update(
    new UpdateCollectionRequest([
        'collectionId' => 1,
        'name' => 'Update collection name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$collectionId:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the collection. For multilingual collections, this will be the name of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the collection. For multilingual collections, this will be the description of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$translatedContent:** `?GroupTranslatedContent` 
    
</dd>
</dl>

<dl>
<dd>

**$parentId:** `?string` — The id of the parent collection. If `null` then it will be updated as the first level collection.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->helpCenters->collections->delete($request) -> DeletedCollectionObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single collection by making a DELETE request to `https://api.intercom.io/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->delete(
    new DeleteCollectionRequest([
        'collectionId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$collectionId:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## News Items
<details><summary><code>$client->news->items->list() -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all news items
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->items->create($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a news item
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->create(
    new NewsItemRequest([
        'title' => 'Halloween is here!',
        'body' => '<p>New costumes in store for this spooky season</p>',
        'senderId' => 991267834,
        'state' => NewsItemRequestState::Live->value,
        'deliverSilently' => true,
        'labels' => [
            'Product',
            'Update',
            'New',
        ],
        'reactions' => [
            '😆',
            '😅',
        ],
        'newsfeedAssignments' => [
            new NewsfeedAssignment([
                'newsfeedId' => 53,
                'publishedAt' => 1664638214,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `NewsItemRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->items->find($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single news item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->find(
    new FindNewsItemRequest([
        'newsItemId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$newsItemId:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->items->update($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->update(
    new UpdateNewsItemRequest([
        'newsItemId' => 1,
        'body' => new NewsItemRequest([
            'title' => 'Christmas is here!',
            'body' => '<p>New gifts in store for the jolly season</p>',
            'senderId' => 991267845,
            'reactions' => [
                '😝',
                '😂',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$newsItemId:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `NewsItemRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->items->delete($request) -> DeletedObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single news item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->delete(
    new DeleteNewsItemRequest([
        'newsItemId' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$newsItemId:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## News Feeds
<details><summary><code>$client->news->feeds->listItems($request) -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all news items that are live on a given newsfeed
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->feeds->listItems(
    new ListNewsFeedItemsRequest([
        'newsfeedId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$newsfeedId:** `string` — The unique identifier for the news feed item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->feeds->list() -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all newsfeeds
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->feeds->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->news->feeds->find($request) -> Newsfeed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single newsfeed
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->feeds->find(
    new FindNewsFeedRequest([
        'newsfeedId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$newsfeedId:** `string` — The unique identifier for the news feed item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## TicketTypes Attributes
<details><summary><code>$client->ticketTypes->attributes->create($request) -> ?TicketTypeAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new attribute for a ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->attributes->create(
    new CreateTicketTypeAttributeRequest([
        'ticketTypeId' => 'ticket_type_id',
        'name' => 'Attribute Title',
        'description' => 'Attribute Description',
        'dataType' => CreateTicketTypeAttributeRequestDataType::String->value,
        'requiredToCreate' => false,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the ticket type attribute
    
</dd>
</dl>

<dl>
<dd>

**$description:** `string` — The description of the attribute presented to the teammate or contact
    
</dd>
</dl>

<dl>
<dd>

**$dataType:** `string` — The data type of the attribute
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreate:** `?bool` — Whether the attribute is required to be filled in when teammates are creating the ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreateForContacts:** `?bool` — Whether the attribute is required to be filled in when contacts are creating the ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$visibleOnCreate:** `?bool` — Whether the attribute is visible to teammates when creating a ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$visibleToContacts:** `?bool` — Whether the attribute is visible to contacts when creating a ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$multiline:** `?bool` — Whether the attribute allows multiple lines of text (only applicable to string attributes)
    
</dd>
</dl>

<dl>
<dd>

**$listItems:** `?string` — A comma delimited list of items for the attribute value (only applicable to list attributes)
    
</dd>
</dl>

<dl>
<dd>

**$allowMultipleValues:** `?bool` — Whether the attribute allows multiple files to be attached to it (only applicable to file attributes)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->ticketTypes->attributes->update($request) -> ?TicketTypeAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing attribute for a ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->attributes->update(
    new UpdateTicketTypeAttributeRequest([
        'ticketTypeId' => 'ticket_type_id',
        'attributeId' => 'attribute_id',
        'description' => 'New Attribute Description',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$attributeId:** `string` — The unique identifier for the ticket type attribute which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the ticket type attribute
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the attribute presented to the teammate or contact
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreate:** `?bool` — Whether the attribute is required to be filled in when teammates are creating the ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreateForContacts:** `?bool` — Whether the attribute is required to be filled in when contacts are creating the ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$visibleOnCreate:** `?bool` — Whether the attribute is visible to teammates when creating a ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$visibleToContacts:** `?bool` — Whether the attribute is visible to contacts when creating a ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$multiline:** `?bool` — Whether the attribute allows multiple lines of text (only applicable to string attributes)
    
</dd>
</dl>

<dl>
<dd>

**$listItems:** `?string` — A comma delimited list of items for the attribute value (only applicable to list attributes)
    
</dd>
</dl>

<dl>
<dd>

**$allowMultipleValues:** `?bool` — Whether the attribute allows multiple files to be attached to it (only applicable to file attributes)
    
</dd>
</dl>

<dl>
<dd>

**$archived:** `?bool` — Whether the attribute should be archived and not shown during creation of the ticket (it will still be present on previously created tickets)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Admins
<details><summary><code>$client->unstable->admins->identifyAdmin() -> ?AdminWithApp</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can view the currently authorised admin along with the embedded app object (a "workspace" in legacy terminology).

> 🚧 Single Sign On
>
> If you are building a custom "Log in with Intercom" flow for your site, and you call the `/me` endpoint to identify the logged-in user, you should not accept any sign-ins from users with unverified email addresses as it poses a potential impersonation security risk.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->identify();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->admins->setAwayAdmin($request) -> ?Admin</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can set an Admin as away for the Inbox.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->admins->setAwayAdmin(
    new SetAwayAdminRequest([
        'id' => 1,
        'awayModeEnabled' => true,
        'awayModeReassign' => true,
        'awayStatusReasonId' => 12345,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier of a given admin
    
</dd>
</dl>

<dl>
<dd>

**$awayModeEnabled:** `bool` — Set to "true" to change the status of the admin to away.
    
</dd>
</dl>

<dl>
<dd>

**$awayModeReassign:** `bool` — Set to "true" to assign any new conversation replies to your default inbox.
    
</dd>
</dl>

<dl>
<dd>

**$awayStatusReasonId:** `?int` — The unique identifier of the away status reason
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->admins->listActivityLogs($request) -> ActivityLogList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a log of activities by all admins in an app.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->listAllActivityLogs(
    new ListAllActivityLogsRequest([
        'createdAtAfter' => '1677253093',
        'createdAtBefore' => '1677861493',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$createdAtAfter:** `string` — The start date that you request data for. It must be formatted as a UNIX timestamp.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtBefore:** `?string` — The end date that you request data for. It must be formatted as a UNIX timestamp.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->admins->listAdmins() -> AdminList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of admins for a given workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->admins->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->admins->retrieveAdmin($request) -> ?Admin</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve the details of a single admin.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->admins->retrieveAdmin(
    new RetrieveAdminRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier of a given admin
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## AI Content
<details><summary><code>$client->unstable->aiContent->listContentImportSources() -> ContentImportSourcesList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve a list of all content import sources for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->listContentImportSources();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->createContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new content import source by sending a POST request to this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->createContentImportSource(
    new CreateContentImportSourceRequest([
        'syncBehavior' => 'api',
        'url' => 'https://www.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$syncBehavior:** `string` — If you intend to create or update External Pages via the API, this should be set to `api`.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the content import source.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the content import source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->getContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->getContentImportSource(
    new GetContentImportSourceRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->updateContentImportSource($request) -> ContentImportSource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing content import source.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->updateContentImportSource(
    new UpdateContentImportSourceRequest([
        'id' => 'id',
        'syncBehavior' => UpdateContentImportSourceRequestSyncBehavior::Api->value,
        'url' => 'https://www.example.com',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$syncBehavior:** `string` — If you intend to create or update External Pages via the API, this should be set to `api`. You can not change the value to or from api.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — The status of the content import source.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the content import source. This may only be different from the existing value if the sync behavior is API.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->deleteContentImportSource($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a content import source by making a DELETE request this endpoint. This will also delete all external pages that were imported from this source.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->deleteContentImportSource(
    new DeleteContentImportSourceRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the content import source which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->listExternalPages() -> ExternalPagesList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve a list of all external pages for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->listExternalPages();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->createExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new external page by sending a POST request to this endpoint. If an external page already exists with the specified source_id and external_id, it will be updated instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->aiContent->createExternalPage(
    new CreateExternalPageRequest([
        'title' => 'Test',
        'html' => '<html><body><h1>Test</h1></body></html>',
        'url' => 'https://www.example.com',
        'locale' => 'en',
        'sourceId' => 44,
        'externalId' => 'abc1234',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$title:** `string` — The title of the external page.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `string` — The body of the external page in HTML.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` — The URL of the external page. This will be used by Fin to link end users to the page it based its answer on. When a URL is not present, Fin will not reference the source.
    
</dd>
</dl>

<dl>
<dd>

**$aiAgentAvailability:** `?bool` — Whether the external page should be used to answer questions by AI Agent. Will not default when updating an existing external page.
    
</dd>
</dl>

<dl>
<dd>

**$aiCopilotAvailability:** `?bool` — Whether the external page should be used to answer questions by AI Copilot. Will not default when updating an existing external page.
    
</dd>
</dl>

<dl>
<dd>

**$locale:** `string` — Always en
    
</dd>
</dl>

<dl>
<dd>

**$sourceId:** `int` — The unique identifier for the source of the external page which was given by Intercom. Every external page must be associated with a Content Import Source which represents the place it comes from and from which it inherits a default audience (configured in the UI). For a new source, make a POST request to the Content Import Source endpoint and an ID for the source will be returned in the response.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` — The identifier for the external page which was given by the source. Must be unique for the source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->getExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can retrieve an external page.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->getExternalPage(
    new GetExternalPageRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->updateExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing external page (if it was created via the API).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->updateExternalPage(
    new UpdateExternalPageRequest([
        'id' => 'id',
        'title' => 'Test',
        'html' => '<html><body><h1>Test</h1></body></html>',
        'url' => 'https://www.example.com',
        'locale' => 'en',
        'sourceId' => 47,
        'externalId' => '5678',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `string` — The title of the external page.
    
</dd>
</dl>

<dl>
<dd>

**$html:** `string` — The body of the external page in HTML.
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` — The URL of the external page. This will be used by Fin to link end users to the page it based its answer on.
    
</dd>
</dl>

<dl>
<dd>

**$finAvailability:** `?bool` — Whether the external page should be used to answer questions by Fin.
    
</dd>
</dl>

<dl>
<dd>

**$locale:** `string` — Always en
    
</dd>
</dl>

<dl>
<dd>

**$sourceId:** `int` — The unique identifier for the source of the external page which was given by Intercom. Every external page must be associated with a Content Import Source which represents the place it comes from and from which it inherits a default audience (configured in the UI). For a new source, make a POST request to the Content Import Source endpoint and an ID for the source will be returned in the response.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — The identifier for the external page which was given by the source. Must be unique for the source.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->aiContent->deleteExternalPage($request) -> ExternalPage</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sending a DELETE request for an external page will remove it from the content library UI and from being used for AI answers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->aiContent->deleteExternalPage(
    new DeleteExternalPageRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the external page which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Articles
<details><summary><code>$client->unstable->articles->listArticles() -> ArticleList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all articles by making a GET request to `https://api.intercom.io/articles`.

> 📘 How are the articles sorted and ordered?
>
> Articles will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated articles first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->list(
    new ListArticlesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->articles->createArticle($request) -> Article</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new article by making a POST request to `https://api.intercom.io/articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->articles->createArticle(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->articles->retrieveArticle($request) -> Article</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single article by making a GET request to `https://api.intercom.io/articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->articles->retrieveArticle(
    new RetrieveArticleRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->articles->deleteArticle($request) -> DeletedArticleObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single article by making a DELETE request to `https://api.intercom.io/articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->articles->deleteArticle(
    new DeleteArticleRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->articles->searchArticles($request) -> ArticleSearchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for articles by making a GET request to `https://api.intercom.io/articles/search`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->articles->search(
    new SearchArticlesRequest([
        'phrase' => 'Getting started',
        'state' => 'published',
        'helpCenterId' => 1,
        'highlight' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phrase:** `?string` — The phrase within your articles to search for.
    
</dd>
</dl>

<dl>
<dd>

**$state:** `?string` — The state of the Articles returned. One of `published`, `draft` or `all`.
    
</dd>
</dl>

<dl>
<dd>

**$helpCenterId:** `?int` — The ID of the Help Center to search in.
    
</dd>
</dl>

<dl>
<dd>

**$highlight:** `?bool` — Return a highlighted version of the matching content within your articles. Refer to the response schema for more details.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Away Status Reasons
<details><summary><code>$client->unstable->awayStatusReasons->listAwayStatusReasons() -> array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a list of all away status reasons configured for the workspace, including deleted ones.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->awayStatusReasons->listAwayStatusReasons();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Unstable Export
<details><summary><code>$client->unstable->export->enqueueANewReportingDataExportJob($request) -> PostExportReportingDataEnqueueResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->export->enqueueANewReportingDataExportJob(
    new PostExportReportingDataEnqueueRequest([
        'datasetId' => 'conversation',
        'attributeIds' => [
            'conversation_id',
            'conversation_started_at',
        ],
        'startTime' => 1717490000,
        'endTime' => 1717510000,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$datasetId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$attributeIds:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$startTime:** `int` 
    
</dd>
</dl>

<dl>
<dd>

**$endTime:** `int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->export->listAvailableDatasetsAndAttributes() -> GetExportReportingDataGetDatasetsResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->export->listAvailableDatasetsAndAttributes();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Help Center
<details><summary><code>$client->unstable->helpCenter->listAllCollections() -> CollectionList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all collections by making a GET request to `https://api.intercom.io/help_center/collections`.

Collections will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated collections first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->list(
    new ListCollectionsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->createCollection($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new collection by making a POST request to `https://api.intercom.io/help_center/collections.`
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->collections->create(
    new CreateCollectionRequest([
        'name' => 'Thanks for everything',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The name of the collection. For multilingual collections, this will be the name of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the collection. For multilingual collections, this will be the description of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$translatedContent:** `?GroupTranslatedContent` 
    
</dd>
</dl>

<dl>
<dd>

**$parentId:** `?string` — The id of the parent collection. If `null` then it will be created as the first level collection.
    
</dd>
</dl>

<dl>
<dd>

**$helpCenterId:** `?int` — The id of the help center where the collection will be created. If `null` then it will be created in the default help center.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->retrieveCollection($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single collection by making a GET request to `https://api.intercom.io/help_center/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->helpCenter->retrieveCollection(
    new RetrieveCollectionRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->updateCollection($request) -> Collection</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update the details of a single collection by making a PUT request to `https://api.intercom.io/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->helpCenter->updateCollection(
    new UpdateCollectionRequest([
        'id' => 1,
        'name' => 'Update collection name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the collection. For multilingual collections, this will be the name of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the collection. For multilingual collections, this will be the description of the default language's content.
    
</dd>
</dl>

<dl>
<dd>

**$translatedContent:** `?GroupTranslatedContent` 
    
</dd>
</dl>

<dl>
<dd>

**$parentId:** `?string` — The id of the parent collection. If `null` then it will be updated as the first level collection.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->deleteCollection($request) -> DeletedCollectionObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single collection by making a DELETE request to `https://api.intercom.io/collections/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->helpCenter->deleteCollection(
    new DeleteCollectionRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->retrieveHelpCenter($request) -> HelpCenter</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single Help Center by making a GET request to `https://api.intercom.io/help_center/help_center/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->helpCenter->retrieveHelpCenter(
    new RetrieveHelpCenterRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the collection which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->helpCenter->listHelpCenters() -> HelpCenterList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list all Help Centers by making a GET request to `https://api.intercom.io/help_center/help_centers`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->helpCenters->list(
    new ListHelpCentersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Internal Articles
<details><summary><code>$client->unstable->internalArticles->listInternalArticles() -> InternalArticleList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all internal articles by making a GET request to `https://api.intercom.io/internal_articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->listInternalArticles();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->internalArticles->createInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new internal article by making a POST request to `https://api.intercom.io/internal_articles`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->createInternalArticle(
    new CreateInternalArticleRequest([
        'title' => 'Thanks for everything',
        'body' => 'Body of the Article',
        'authorId' => 991266252,
        'ownerId' => 991266252,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?CreateInternalArticleRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->internalArticles->retrieveInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single internal article by making a GET request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->internalArticles->retrieveInternalArticle(
    new RetrieveInternalArticleRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->internalArticles->updateInternalArticle($request) -> InternalArticleListItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update the details of a single internal article by making a PUT request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->internalArticles->updateInternalArticle(
    new UpdateInternalArticleRequestBody([
        'id' => 1,
        'title' => 'Christmas is here!',
        'body' => '<p>New gifts in store for the jolly season</p>',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the internal article which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title of the article.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `?string` — The content of the article.
    
</dd>
</dl>

<dl>
<dd>

**$authorId:** `?int` — The id of the author of the article.
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `?int` — The id of the author of the article.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->internalArticles->deleteInternalArticle($request) -> DeletedInternalArticleObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single internal article by making a DELETE request to `https://api.intercom.io/internal_articles/<id>`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->internalArticles->deleteInternalArticle(
    new DeleteInternalArticleRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the internal article which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->internalArticles->searchInternalArticles($request) -> InternalArticleSearchResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for internal articles by making a GET request to `https://api.intercom.io/internal_articles/search`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->internalArticles->searchInternalArticles(
    new SearchInternalArticlesRequest([
        'folderId' => 'folder_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$folderId:** `?string` — The ID of the folder to search in.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Companies
<details><summary><code>$client->unstable->companies->retrieveCompany($request) -> CompanyList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a single company by passing in `company_id` or `name`.

  `https://api.intercom.io/companies?name={name}`

  `https://api.intercom.io/companies?company_id={company_id}`

You can fetch all companies and filter by `segment_id` or `tag_id` as a query parameter.

  `https://api.intercom.io/companies?tag_id={tag_id}`

  `https://api.intercom.io/companies?segment_id={segment_id}`
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->retrieve(
    new RetrieveCompanyRequest([
        'name' => 'my company',
        'companyId' => '12345',
        'tagId' => '678910',
        'segmentId' => '98765',
        'page' => 1,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — The `name` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The `company_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$tagId:** `?string` — The `tag_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$segmentId:** `?string` — The `segment_id` of the company to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 15
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->createOrUpdateCompany($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create or update a company.

Companies will be only visible in Intercom when there is at least one associated user.

Companies are looked up via `company_id` in a `POST` request, if not found via `company_id`, the new company will be created, if found, that company will be updated.

{% admonition type="warning" name="Using `company_id`" %}
  You can set a unique `company_id` value when creating a company. However, it is not possible to update `company_id`. Be sure to set a unique value once upon creation of the company.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->createOrUpdateCompany(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->retrieveACompanyById($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a single company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->retrieveACompanyById(
    new RetrieveACompanyByIdRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->updateCompany($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update a single company using the Intercom provisioned `id`.

{% admonition type="warning" name="Using `company_id`" %}
  When updating a company it is not possible to update `company_id`. This can only be set once upon creation of the company.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->updateCompany(
    new UpdateCompanyRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->deleteCompany($request) -> DeletedCompanyObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->deleteCompany(
    new DeleteCompanyRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->listAttachedContacts($request) -> CompanyAttachedContacts</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all contacts that belong to a company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->listAttachedContacts(
    new ListAttachedContactsRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->listAttachedSegmentsForCompanies($request) -> CompanyAttachedSegments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all segments that belong to a company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->listAttachedSegmentsForCompanies(
    new ListAttachedSegmentsForCompaniesRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->listAllCompanies($request) -> CompanyList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list companies. The company list is sorted by the `last_request_at` field and by default is ordered descending, most recently requested first.

Note that the API does not include companies who have no associated users in list responses.

When using the Companies endpoint and the pages object to iterate through the returned companies, there is a limit of 10,000 Companies that can be returned. If you need to list or iterate on more than 10,000 Companies, please use the [Scroll API](https://developers.intercom.com/reference#iterating-over-all-companies).
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->list(
    new ListCompaniesRequest([
        'page' => 1,
        'perPage' => 1,
        'order' => 'desc',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to return per page. Defaults to 15
    
</dd>
</dl>

<dl>
<dd>

**$order:** `?string` — `asc` or `desc`. Return the companies in ascending or descending order. Defaults to desc
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->scrollOverAllCompanies($request) -> ?CompanyScroll</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

      The `list all companies` functionality does not work well for huge datasets, and can result in errors and performance problems when paging deeply. The Scroll API provides an efficient mechanism for iterating over all companies in a dataset.

- Each app can only have 1 scroll open at a time. You'll get an error message if you try to have more than one open per app.
- If the scroll isn't used for 1 minute, it expires and calls with that scroll param will fail
- If the end of the scroll is reached, "companies" will be empty and the scroll parameter will expire

{% admonition type="info" name="Scroll Parameter" %}
  You can get the first page of companies by simply sending a GET request to the scroll endpoint.
  For subsequent requests you will need to use the scroll parameter from the response.
{% /admonition %}
{% admonition type="danger" name="Scroll network timeouts" %}
  Since scroll is often used on large datasets network errors such as timeouts can be encountered. When this occurs you will see a HTTP 500 error with the following message:
  "Request failed due to an internal network error. Please restart the scroll operation."
  If this happens, you will need to restart your scroll query: It is not possible to continue from a specific point when using scroll.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->companies->scroll(
    new ScrollCompaniesRequest([
        'scrollParam' => 'scroll_param',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$scrollParam:** `?string` — 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->attachContactToACompany($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can attach a company to a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->attachContactToACompany(
    new AttachContactToACompanyRequest([
        'id' => 'id',
        'companyId' => '6762f09a1bb69f9f2193bb34',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->companies->detachContactFromACompany($request) -> Company</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can detach a company from a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->companies->detachContactFromACompany(
    new DetachContactFromACompanyRequest([
        'contactId' => '58a430d35458202d41b1e65b',
        'id' => '58a430d35458202d41b1e65b',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Notes
<details><summary><code>$client->unstable->notes->listCompanyNotes($request) -> NoteList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of notes that are associated to a company.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->notes->listCompanyNotes(
    new ListCompanyNotesRequest([
        'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the company which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->notes->listNotes($request) -> NoteList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of notes that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->notes->listNotes(
    new ListNotesRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier of a contact.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->notes->createNote($request) -> Note</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add a note to a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->notes->createNote(
    new CreateNoteRequest([
        'id' => 1,
        'body' => 'Hello',
        'contactId' => '6762f0ad1bb69f9f2193bb62',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier of a given contact.
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — The text of the note.
    
</dd>
</dl>

<dl>
<dd>

**$contactId:** `?string` — The unique identifier of a given contact.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?string` — The unique identifier of a given admin.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->notes->retrieveNote($request) -> Note</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single note.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->notes->retrieveNote(
    new RetrieveNoteRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier of a given note
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Contacts
<details><summary><code>$client->unstable->contacts->listCompaniesForAContact($request) -> ContactAttachedCompanies</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of companies that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->listCompaniesForAContact(
    new ListCompaniesForAContactRequest([
        'id' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->listSegmentsForAContact($request) -> ContactSegments</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of segments that are associated to a contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedSegments(
    new ListSegmentsAttachedToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->listSubscriptionsForAContact($request) -> SubscriptionTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of subscription types that are attached to a contact. These can be subscriptions that a user has 'opted-in' to or has 'opted-out' from, depending on the subscription type.
This will return a list of Subscription Type objects that the contact is associated with.

The data property will show a combined list of:

  1.Opt-out subscription types that the user has opted-out from.
  2.Opt-in subscription types that the user has opted-in to receiving.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedSubscriptions(
    new ListAttachedSubscriptionsRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->listTagsForAContact($request) -> TagList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all tags that are attached to a specific contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->listAttachedTags(
    new ListTagsAttachedToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->showContact($request) -> ShowContactResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->showContact(
    new ShowContactRequest([
        'id' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->updateContact($request) -> UpdateContactResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing contact (ie. user or lead).

{% admonition type="info" %}
  This endpoint handles both **contact updates** and **custom object associations**.

  See _`update a contact with an association to a custom object instance`_ in the request/response examples to see the custom object association format.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->updateContact(
    new UpdateContactRequest([
        'id' => '63a07ddf05a32042dffac965',
        'email' => 'joebloggs@intercom.io',
        'name' => 'joe bloggs',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>

<dl>
<dd>

**$role:** `?string` — The role of the contact.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — A unique identifier for the contact which is given to Intercom
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — The contacts email
    
</dd>
</dl>

<dl>
<dd>

**$phone:** `?string` — The contacts phone
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The contacts name
    
</dd>
</dl>

<dl>
<dd>

**$avatar:** `?string` — An image URL containing the avatar of a contact
    
</dd>
</dl>

<dl>
<dd>

**$signedUpAt:** `?int` — The time specified for when a contact signed up
    
</dd>
</dl>

<dl>
<dd>

**$lastSeenAt:** `?int` — The time when the contact was last seen (either where the Intercom Messenger was installed or when specified manually)
    
</dd>
</dl>

<dl>
<dd>

**$ownerId:** `?int` — The id of an admin that has been assigned account ownership of the contact
    
</dd>
</dl>

<dl>
<dd>

**$unsubscribedFromEmails:** `?bool` — Whether the contact is unsubscribed from emails
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — The custom attributes which are set for the contact
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->deleteContact($request) -> ContactDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->deleteContact(
    new DeleteContactRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->mergeContact($request) -> MergeContactResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can merge a contact with a `role` of `lead` into a contact with a `role` of `user`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->mergeLeadInUser(
    new MergeContactsRequest([
        'leadId' => '6762f0d51bb69f9f2193bb7f',
        'contactId' => '6762f0d51bb69f9f2193bb80',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `?string` — The unique identifier for the contact to merge away from. Must be a lead.
    
</dd>
</dl>

<dl>
<dd>

**$into:** `?string` — The unique identifier for the contact to merge into. Must be a user.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->searchContacts($request) -> ContactList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple contacts by the value of their attributes in order to fetch exactly who you want.

To search for contacts, you need to send a `POST` request to `https://api.intercom.io/contacts/search`.

This will accept a query object in the body which will define your filters in order to search for contacts.

{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `50` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}
### Contact Creation Delay

If a contact has recently been created, there is a possibility that it will not yet be available when searching. This means that it may not appear in the response. This delay can take a few minutes. If you need to be instantly notified it is recommended to use webhooks and iterate to see if they match your search filters.

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiple's there can be:
* There's a limit of max 2 nested filters
* There's a limit of max 15 filters for each AND or OR group

### Searching for Timestamp Fields

All timestamp fields (created_at, updated_at etc.) are indexed as Dates for Contact Search queries; Datetime queries are not currently supported. This means you can only query for timestamp fields by day - not hour, minute or second.
For example, if you search for all Contacts with a created_at value greater (>) than 1577869200 (the UNIX timestamp for January 1st, 2020 9:00 AM), that will be interpreted as 1577836800 (January 1st, 2020 12:00 AM). The search results will then include Contacts created from January 2nd, 2020 12:00 AM onwards.
If you'd like to get contacts created on January 1st, 2020 you should search with a created_at value equal (=) to 1577836800 (January 1st, 2020 12:00 AM).
This behaviour applies only to timestamps used in search queries. The search results will still contain the full UNIX timestamp and be sorted accordingly.

### Accepted Fields

Most key listed as part of the Contacts Model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).

| Field                              | Type                           |
| ---------------------------------- | ------------------------------ |
| id                                 | String                         |
| role                               | String<br>Accepts user or lead |
| name                               | String                         |
| avatar                             | String                         |
| owner_id                           | Integer                        |
| email                              | String                         |
| email_domain                       | String                         |
| phone                              | String                         |
| formatted_phone                    | String                         |
| external_id                        | String                         |
| created_at                         | Date (UNIX Timestamp)          |
| signed_up_at                       | Date (UNIX Timestamp)          |
| updated_at                         | Date (UNIX Timestamp)          |
| last_seen_at                       | Date (UNIX Timestamp)          |
| last_contacted_at                  | Date (UNIX Timestamp)          |
| last_replied_at                    | Date (UNIX Timestamp)          |
| last_email_opened_at               | Date (UNIX Timestamp)          |
| last_email_clicked_at              | Date (UNIX Timestamp)          |
| language_override                  | String                         |
| browser                            | String                         |
| browser_language                   | String                         |
| os                                 | String                         |
| location.country                   | String                         |
| location.region                    | String                         |
| location.city                      | String                         |
| unsubscribed_from_emails           | Boolean                        |
| marked_email_as_spam               | Boolean                        |
| has_hard_bounced                   | Boolean                        |
| ios_last_seen_at                   | Date (UNIX Timestamp)          |
| ios_app_version                    | String                         |
| ios_device                         | String                         |
| ios_app_device                     | String                         |
| ios_os_version                     | String                         |
| ios_app_name                       | String                         |
| ios_sdk_version                    | String                         |
| android_last_seen_at               | Date (UNIX Timestamp)          |
| android_app_version                | String                         |
| android_device                     | String                         |
| android_app_name                   | String                         |
| andoid_sdk_version                 | String                         |
| segment_id                         | String                         |
| tag_id                             | String                         |
| custom_attributes.{attribute_name} | String                         |

### Accepted Operators

{% admonition type="warning" name="Searching based on `created_at`" %}
  You cannot use the `<=` or `>=` operators to search by `created_at`.
{% /admonition %}

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                      | Description                                                      |
| :------- | :------------------------------- | :--------------------------------------------------------------- |
| =        | All                              | Equals                                                           |
| !=       | All                              | Doesn't Equal                                                    |
| IN       | All                              | In<br>Shortcut for `OR` queries<br>Values must be in Array       |
| NIN      | All                              | Not In<br>Shortcut for `OR !` queries<br>Values must be in Array |
| >        | Integer<br>Date (UNIX Timestamp) | Greater than                                                     |
| <       | Integer<br>Date (UNIX Timestamp) | Lower than                                                       |
| ~        | String                           | Contains                                                         |
| !~       | String                           | Doesn't Contain                                                  |
| ^        | String                           | Starts With                                                      |
| $        | String                           | Ends With                                                        |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->searchContacts(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->listContacts() -> ContactList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all contacts (ie. users or leads) in your workspace.
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `50` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->list(
    new ListContactsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->createContact($request) -> CreateContactResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new contact (ie. user or lead).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->create(
    new CreateContactRequestWithEmail([
        'email' => 'joebloggs@intercom.io',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->showContactByExternalId($request) -> ShowContactByExternalIdResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single contact by external ID. Note that this endpoint only supports users and not leads.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->showContactByExternalId(
    new ShowContactByExternalIdRequest([
        'externalId' => 'cdd29344-5e0c-4ef0-ac56-f9ba2979bc27',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — The external ID of the user that you want to retrieve
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->archiveContact($request) -> ContactArchived</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can archive a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->archiveContact(
    new ArchiveContactRequest([
        'id' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->unarchiveContact($request) -> ContactUnarchived</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can unarchive a single contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->unarchiveContact(
    new UnarchiveContactRequest([
        'id' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->contacts->blockContact($request) -> ContactBlocked</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Block a single contact.<br>**Note:** conversations of the contact will also be archived during the process.<br>More details in [FAQ How do I block Inbox spam?](https://www.intercom.com/help/en/articles/8838656-inbox-faqs)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->contacts->blockContact(
    new BlockContactRequest([
        'id' => '63a07ddf05a32042dffac965',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Subscription Types
<details><summary><code>$client->unstable->subscriptionTypes->attachSubscriptionTypeToContact($request) -> SubscriptionType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add a specific subscription to a contact. In Intercom, we have two different subscription types based on user consent - opt-out and opt-in:

  1.Attaching a contact to an opt-out subscription type will opt that user out from receiving messages related to that subscription type.

  2.Attaching a contact to an opt-in subscription type will opt that user in to receiving messages related to that subscription type.

This will return a subscription type model for the subscription type that was added to the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->contacts->attachSubscription(
    new AttachSubscriptionToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'subscriptionId' => '37846',
        'consentType' => 'opt_in',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the subscription which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$consentType:** `string` — The consent_type of a subscription, opt_out or opt_in.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->subscriptionTypes->detachSubscriptionTypeToContact($request) -> SubscriptionType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove a specific subscription from a contact. This will return a subscription type model for the subscription type that was removed from the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->subscriptionTypes->detachSubscriptionTypeToContact(
    new DetachSubscriptionTypeToContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'id' => '37846',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the subscription type which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->subscriptionTypes->listSubscriptionTypes() -> SubscriptionTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can list all subscription types. A list of subscription type objects will be returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->subscriptionTypes->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tags
<details><summary><code>$client->unstable->tags->attachTagToContact($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific contact. This will return a tag object for the tag that was added to the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagContact(
    new TagContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'tagId' => '7522907',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->detachTagFromContact($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific contact. This will return a tag object for the tag that was removed from the contact.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tags->detachTagFromContact(
    new DetachTagFromContactRequest([
        'contactId' => '63a07ddf05a32042dffac965',
        'id' => '7522907',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contactId:** `string` — The unique identifier for the contact which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->attachTagToConversation($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific conversation. This will return a tag object for the tag that was added to the conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagConversation(
    new TagConversationRequest([
        'conversationId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '780',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — conversation_id
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->detachTagFromConversation($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific conversation. This will return a tag object for the tag that was removed from the conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tags->detachTagFromConversation(
    new DetachTagFromConversationRequest([
        'conversationId' => '64619700005694',
        'id' => '7522907',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — conversation_id
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — id
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->listTags() -> TagList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all tags for a given workspace.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->createTag($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can use this endpoint to perform the following operations:

  **1. Create a new tag:** You can create a new tag by passing in the tag name as specified in "Create or Update Tag Request Payload" described below.

  **2. Update an existing tag:** You can update an existing tag by passing the id of the tag as specified in "Create or Update Tag Request Payload" described below.

  **3. Tag Companies:** You can tag single company or a list of companies. You can tag a company by passing in the tag name and the company details as specified in "Tag Company Request Payload" described below. Also, if the tag doesn't exist then a new one will be created automatically.

  **4. Untag Companies:** You can untag a single company or a list of companies. You can untag a company by passing in the tag id and the company details as specified in "Untag Company Request Payload" described below.

  **5. Tag Multiple Users:** You can tag a list of users. You can tag the users by passing in the tag name and the user details as specified in "Tag Users Request Payload" described below.

Each operation will return a tag object.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->create(
    new CreateOrUpdateTagRequest([
        'name' => 'test',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateOrUpdateTagRequest|TagCompanyRequest|UntagCompanyRequest|TagMultipleUsersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->findTag($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of tags that are on the workspace by their id.
This will return a tag object.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tags->findTag(
    new FindTagRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of a given tag
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->deleteTag($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete the details of tags that are on the workspace by passing in the id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tags->deleteTag(
    new DeleteTagRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of a given tag
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->attachTagToTicket($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can tag a specific ticket. This will return a tag object for the tag that was added to the ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->tagTicket(
    new TagTicketRequest([
        'ticketId' => '64619700005694',
        'tagId' => '7522907',
        'adminId' => '780',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — ticket_id
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tags->detachTagFromTicket($request) -> Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can remove tag from a specific ticket. This will return a tag object for the tag that was removed from the ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tags->detachTagFromTicket(
    new DetachTagFromTicketRequest([
        'ticketId' => '64619700005694',
        'id' => '7522907',
        'adminId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketId:** `string` — ticket_id
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the tag which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The unique identifier for the admin which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Conversations
<details><summary><code>$client->unstable->conversations->listConversations($request) -> ConversationList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all conversations.

You can optionally request the result page size and the cursor to start after to fetch the result.
{% admonition type="warning" name="Pagination" %}
  You can use pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
{% /admonition %}
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->list(
    new ListConversationsRequest([
        'perPage' => 1,
        'startingAfter' => 'starting_after',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$perPage:** `?int` — How many results per page
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — String used to get the next page of conversations.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->createConversation($request) -> Message</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a conversation that has been initiated by a contact (ie. user or lead).
The conversation can be an in-app message only.

{% admonition type="info" name="Sending for visitors" %}
You can also send a message from a visitor by specifying their `user_id` or `id` value in the `from` field, along with a `type` field value of `contact`.
This visitor will be automatically converted to a contact with a lead role once the conversation is created.
{% /admonition %}

This will return the Message model that has been created.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->create(
    new CreateConversationRequest([
        'from' => new CreateConversationRequestFrom([
            'type' => CreateConversationRequestFromType::User->value,
            'id' => '6762f11b1bb69f9f2193bba3',
        ]),
        'body' => 'Hello there',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$from:** `CreateConversationRequestFrom` 
    
</dd>
</dl>

<dl>
<dd>

**$body:** `string` — The content of the message. HTML is not supported.
    
</dd>
</dl>

<dl>
<dd>

**$createdAt:** `?int` — The time the conversation was created as a UTC Unix timestamp. If not provided, the current time will be used. This field is only recommneded for migrating past conversations from another source into Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->retrieveConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can fetch the details of a single conversation.

This will return a single Conversation model with all its conversation parts.

{% admonition type="warning" name="Hard limit of 500 parts" %}
The maximum number of conversation parts that can be returned via the API is 500. If you have more than that we will return the 500 most recent conversation parts.
{% /admonition %}

For AI agent conversation metadata, please note that you need to have the agent enabled in your workspace, which is a [paid feature](https://www.intercom.com/help/en/articles/8205718-fin-resolutions#h_97f8c2e671).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->retrieveConversation(
    new RetrieveConversationRequest([
        'id' => 1,
        'displayAs' => 'plaintext',
        'includeTranslations' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$displayAs:** `?string` — Set to plaintext to retrieve conversation messages in plain text. This affects both the body and subject fields.
    
</dd>
</dl>

<dl>
<dd>

**$includeTranslations:** `?bool` — If set to true, conversation parts will be translated to the detected language of the conversation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->updateConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can update an existing conversation.

{% admonition type="info" name="Replying and other actions" %}
If you want to reply to a coveration or take an action such as assign, unassign, open, close or snooze, take a look at the reply and manage endpoints.
{% /admonition %}

{% admonition type="info" %}
  This endpoint handles both **conversation updates** and **custom object associations**.

  See _`update a conversation with an association to a custom object instance`_ in the request/response examples to see the custom object association format.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->updateConversation(
    new UpdateConversationRequest([
        'id' => 1,
        'displayAs' => 'plaintext',
        'read' => true,
        'title' => 'new conversation title',
        'customAttributes' => [
            'issue_type' => 'Billing',
            'priority' => 'High',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$displayAs:** `?string` — Set to plaintext to retrieve conversation messages in plain text. This affects both the body and subject fields.
    
</dd>
</dl>

<dl>
<dd>

**$read:** `?bool` — Mark a conversation as read within Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` — The title given to the conversation
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The ID of the company that the conversation is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->deleteConversation($request) -> ConversationDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->deleteConversation(
    new DeleteConversationRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — id
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->searchConversations($request) -> ConversationList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple conversations by the value of their attributes in order to fetch exactly which ones you want.

To search for conversations, you need to send a `POST` request to `https://api.intercom.io/conversations/search`.

This will accept a query object in the body which will define your filters in order to search for conversations.
{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `20` results per page and maximum is `150`.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiple's there can be:
- There's a limit of max 2 nested filters
- There's a limit of max 15 filters for each AND or OR group

### Accepted Fields

Most keys listed in the conversation model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.

| Field                                     | Type                                                                                                                                                   |
| :---------------------------------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------- |
| id                                        | String                                                                                                                                                 |
| created_at                                | Date (UNIX timestamp)                                                                                                                                  |
| updated_at                                | Date (UNIX timestamp)                                                                                                                                  |
| source.type                               | String<br>Accepted fields are `conversation`, `email`, `facebook`, `instagram`, `phone_call`, `phone_switch`, `push`, `sms`, `twitter` and `whatsapp`. |
| source.id                                 | String                                                                                                                                                 |
| source.delivered_as                       | String                                                                                                                                                 |
| source.subject                            | String                                                                                                                                                 |
| source.body                               | String                                                                                                                                                 |
| source.author.id                          | String                                                                                                                                                 |
| source.author.type                        | String                                                                                                                                                 |
| source.author.name                        | String                                                                                                                                                 |
| source.author.email                       | String                                                                                                                                                 |
| source.url                                | String                                                                                                                                                 |
| contact_ids                               | String                                                                                                                                                 |
| teammate_ids                              | String                                                                                                                                                 |
| admin_assignee_id                         | String                                                                                                                                                 |
| team_assignee_id                          | String                                                                                                                                                 |
| channel_initiated                         | String                                                                                                                                                 |
| open                                      | Boolean                                                                                                                                                |
| read                                      | Boolean                                                                                                                                                |
| state                                     | String                                                                                                                                                 |
| waiting_since                             | Date (UNIX timestamp)                                                                                                                                  |
| snoozed_until                             | Date (UNIX timestamp)                                                                                                                                  |
| tag_ids                                   | String                                                                                                                                                 |
| priority                                  | String                                                                                                                                                 |
| statistics.time_to_assignment             | Integer                                                                                                                                                |
| statistics.time_to_admin_reply            | Integer                                                                                                                                                |
| statistics.time_to_first_close            | Integer                                                                                                                                                |
| statistics.time_to_last_close             | Integer                                                                                                                                                |
| statistics.median_time_to_reply           | Integer                                                                                                                                                |
| statistics.first_contact_reply_at         | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_assignment_at            | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_admin_reply_at           | Date (UNIX timestamp)                                                                                                                                  |
| statistics.first_close_at                 | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_assignment_at             | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_assignment_admin_reply_at | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_contact_reply_at          | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_admin_reply_at            | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_close_at                  | Date (UNIX timestamp)                                                                                                                                  |
| statistics.last_closed_by_id              | String                                                                                                                                                 |
| statistics.count_reopens                  | Integer                                                                                                                                                |
| statistics.count_assignments              | Integer                                                                                                                                                |
| statistics.count_conversation_parts       | Integer                                                                                                                                                |
| conversation_rating.requested_at          | Date (UNIX timestamp)                                                                                                                                  |
| conversation_rating.replied_at            | Date (UNIX timestamp)                                                                                                                                  |
| conversation_rating.score                 | Integer                                                                                                                                                |
| conversation_rating.remark                | String                                                                                                                                                 |
| conversation_rating.contact_id            | String                                                                                                                                                 |
| conversation_rating.admin_d               | String                                                                                                                                                 |
| ai_agent_participated                     | Boolean                                                                                                                                                |
| ai_agent.resolution_state                 | String                                                                                                                                                 |
| ai_agent.last_answer_type                 | String                                                                                                                                                 |
| ai_agent.rating                           | Integer                                                                                                                                                |
| ai_agent.rating_remark                    | String                                                                                                                                                 |
| ai_agent.source_type                      | String                                                                                                                                                 |
| ai_agent.source_title                     | String                                                                                                                                                 |

### Accepted Operators

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                    | Description                                                  |
| :------- | :----------------------------- | :----------------------------------------------------------- |
| =        | All                            | Equals                                                       |
| !=       | All                            | Doesn't Equal                                                |
| IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
| NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
| >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
| <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
| ~        | String                         | Contains                                                     |
| !~       | String                         | Doesn't Contain                                              |
| ^        | String                         | Starts With                                                  |
| $        | String                         | Ends With                                                    |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->searchConversations(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->replyConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can reply to a conversation with a message from an admin or on behalf of a contact, or with a note for admins.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->replyConversation(
    new ReplyConversationRequest([
        'id' => '123 or "last"',
        'body' => new ContactReplyIntercomUserIdRequest([
            'messageType' => 'comment',
            'type' => 'user',
            'body' => 'Thanks again :)',
            'intercomUserId' => '6762f1571bb69f9f2193bbbb',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The Intercom provisioned identifier for the conversation or the string "last" to reply to the last part of the conversation
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ContactReplyIntercomUserIdRequest|ContactReplyEmailRequest|ContactReplyUserIdRequest|AdminReplyConversationRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->manageConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

For managing conversations you can:
- Close a conversation
- Snooze a conversation to reopen on a future date
- Open a conversation which is `snoozed` or `closed`
- Assign a conversation to an admin and/or team.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->manageConversation(
    new ManageConversationRequest([
        'id' => '123',
        'body' => ManageConversationRequestBody::close(new CloseConversationRequest([
            'type' => 'admin',
            'adminId' => '12345',
        ])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ManageConversationRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->attachContactToConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.

{% admonition type="warning" name="Contacts without an email" %}
If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->attachContactToConversation(
    new AttachContactToConversationRequest([
        'id' => '123',
        'adminId' => '12345',
        'customer' => new AttachContactToConversationRequestCustomerIntercomUserId([
            'intercomUserId' => '6762f19b1bb69f9f2193bbd4',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?string` — The `id` of the admin who is adding the new participant.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `AttachContactToConversationRequestCustomerIntercomUserId|AttachContactToConversationRequestCustomerUserId|AttachContactToConversationRequestCustomerCustomer|null` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->detachContactFromConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.

{% admonition type="warning" name="Contacts without an email" %}
If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->detachContactAsAdmin(
    new DetachContactFromConversationRequest([
        'conversationId' => '123',
        'contactId' => '123',
        'adminId' => '5017690',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationId:** `string` — The identifier for the conversation as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$contactId:** `string` — The identifier for the contact as given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `string` — The `id` of the admin who is performing the action.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->redactConversation($request) -> Conversation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can redact a conversation part or the source message of a conversation (as seen in the source object).

{% admonition type="info" name="Redacting parts and messages" %}
If you are redacting a conversation part, it must have a `body`. If you are redacting a source message, it must have been created by a contact. We will return a `conversation_part_not_redactable` error if these criteria are not met.
{% /admonition %}

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->conversations->redactConversationPart(
    RedactConversationRequest::conversationPart(new RedactConversationRequestConversationPart([
        'conversationId' => '19894788788',
        'conversationPartId' => '19381789428',
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `RedactConversationRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->conversations->convertConversationToTicket($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can convert a conversation to a ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->conversations->convertConversationToTicket(
    new ConvertConversationToTicketRequest([
        'id' => 1,
        'ticketTypeId' => '53',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The id of the conversation to target
    
</dd>
</dl>

<dl>
<dd>

**$ticketTypeId:** `string` — The ID of the type of ticket you want to convert the conversation to
    
</dd>
</dl>

<dl>
<dd>

**$attributes:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Unstable CustomChannelEvents
<details><summary><code>$client->unstable->customChannelEvents->notifyNewConversation($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a new conversation was created in your custom channel/platform. This triggers conversation creation and workflow automations within Intercom for your custom channel integration.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyNewConversation(
    new CustomChannelBaseEvent([
        'eventId' => 'evt_12345',
        'externalConversationId' => 'conv_67890',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'user_001',
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CustomChannelBaseEvent` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customChannelEvents->notifyNewMessage($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a new message was sent in a conversation on your custom channel/platform. This allows Intercom to process the message and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyNewMessage(
    new NotifyNewMessageRequest([
        'eventId' => 'evt_54321',
        'externalConversationId' => 'conv_98765',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'user_002',
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
        ]),
        'body' => 'Hello, I need help with my order.',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$body:** `string` — The message content sent by the user.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customChannelEvents->notifyQuickReplySelected($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a user selected a quick reply option in your custom channel/platform. This allows Intercom to process the response and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyQuickReplySelected(
    new NotifyQuickReplySelectedRequest([
        'eventId' => 'evt_67890',
        'externalConversationId' => 'conv_13579',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'user_003',
            'name' => 'Alice Example',
            'email' => 'alice@example.com',
        ]),
        'quickReplyOptionId' => '1234',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$quickReplyOptionId:** `string` — Id of the selected quick reply option.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customChannelEvents->notifyAttributeCollected($request) -> CustomChannelNotificationResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Notifies Intercom that a user provided a response to an attribute collector in your custom channel/platform. This allows Intercom to process the attribute and trigger any relevant workflow automations.
> **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customChannelEvents->notifyAttributeCollected(
    new NotifyAttributeCollectedRequest([
        'eventId' => 'evt_24680',
        'externalConversationId' => 'conv_11223',
        'contact' => new CustomChannelContact([
            'type' => CustomChannelContactType::User->value,
            'externalId' => 'user_004',
            'name' => 'Bob Example',
            'email' => 'bob@example.com',
        ]),
        'attribute' => new CustomChannelAttribute([
            'id' => 'shipping_address',
            'value' => '123 Main St, Springfield',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$attribute:** `CustomChannelAttribute` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Custom Object Instances
<details><summary><code>$client->unstable->customObjectInstances->getCustomObjectInstancesByExternalId($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch a Custom Object Instance by external_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->getCustomObjectInstancesByExternalId(
    new GetCustomObjectInstancesByExternalIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => 'external_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customObjectInstances->createCustomObjectInstances($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a custom object instance
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->createCustomObjectInstances(
    new CreateOrUpdateCustomObjectInstanceRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => '123',
        'externalCreatedAt' => 1392036272,
        'externalUpdatedAt' => 1392036272,
        'customAttributes' => [
            'order_number' => 'ORDER-12345',
            'total_amount' => 'custom_attributes',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — A unique identifier for the Custom Object instance in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$externalCreatedAt:** `?int` — The time when the Custom Object instance was created in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$externalUpdatedAt:** `?int` — The time when the Custom Object instance was last updated in the external system it originated from.
    
</dd>
</dl>

<dl>
<dd>

**$customAttributes:** `?array` — The custom attributes which are set for the Custom Object instance.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customObjectInstances->deleteCustomObjectInstancesById($request) -> CustomObjectInstanceDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a single Custom Object instance by external_id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->customObjectInstances->deleteCustomObjectInstancesById(
    new DeleteCustomObjectInstancesByIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'externalId' => 'external_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customObjectInstances->getCustomObjectInstancesById($request) -> ?CustomObjectInstance</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch a Custom Object Instance by id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->customObjectInstances->getCustomObjectInstancesById(
    new GetCustomObjectInstancesByIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The id or external_id of the custom object instance
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->customObjectInstances->deleteCustomObjectInstancesByExternalId($request) -> CustomObjectInstanceDeleted</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a single Custom Object instance using the Intercom defined id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->customObjectInstances->deleteCustomObjectInstancesByExternalId(
    new DeleteCustomObjectInstancesByExternalIdRequest([
        'customObjectTypeIdentifier' => 'Order',
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$customObjectTypeIdentifier:** `string` — The unique identifier of the custom object type that defines the structure of the custom object instance.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The Intercom defined id of the custom object instance
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Data Attributes
<details><summary><code>$client->unstable->dataAttributes->lisDataAttributes($request) -> DataAttributeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all data attributes belonging to a workspace for contacts, companies or conversations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataAttributes->list(
    new ListDataAttributesRequest([
        'model' => DataAttributesListRequestModel::Contact->value,
        'includeArchived' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$model:** `?string` — Specify the data attribute model to return.
    
</dd>
</dl>

<dl>
<dd>

**$includeArchived:** `?bool` — Include archived attributes in the list. By default we return only non archived data attributes.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataAttributes->createDataAttribute($request) -> DataAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a data attributes for a `contact` or a `company`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->dataAttributes->createDataAttribute(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataAttributes->updateDataAttribute($request) -> DataAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You can update a data attribute.

> 🚧 Updating the data type is not possible
>
> It is currently a dangerous action to execute changing a data attribute's type via the API. You will need to update the type via the UI instead.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->dataAttributes->updateDataAttribute(
    new UpdateDataAttributeRequest([
        'id' => 1,
        'body' => [
            'key' => "value",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The data attribute id
    
</dd>
</dl>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Data Events
<details><summary><code>$client->unstable->dataEvents->lisDataEvents($request) -> DataEventSummary</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


> 🚧
>
> Please note that you can only 'list' events that are less than 90 days old. Event counts and summaries will still include your events older than 90 days but you cannot 'list' these events individually if they are older than 90 days

The events belonging to a customer can be listed by sending a GET request to `https://api.intercom.io/events` with a user or lead identifier along with a `type` parameter. The identifier parameter can be one of `user_id`, `email` or `intercom_user_id`. The `type` parameter value must be `user`.

- `https://api.intercom.io/events?type=user&user_id={user_id}`
- `https://api.intercom.io/events?type=user&email={email}`
- `https://api.intercom.io/events?type=user&intercom_user_id={id}` (this call can be used to list leads)

The `email` parameter value should be [url encoded](http://en.wikipedia.org/wiki/Percent-encoding) when sending.

You can optionally define the result page size as well with the `per_page` parameter.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->dataEvents->lisDataEvents(
    new LisDataEventsRequest([
        'filter' => new LisDataEventsRequestFilterUserId([
            'userId' => 'user_id',
        ]),
        'type' => 'type',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$filter:** `LisDataEventsRequestFilterUserId|LisDataEventsRequestFilterIntercomUserId|LisDataEventsRequestFilterEmail` 
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` — The value must be user
    
</dd>
</dl>

<dl>
<dd>

**$summary:** `?bool` — summary flag
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataEvents->createDataEvent($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>


You will need an Access Token that has write permissions to send Events. Once you have a key you can submit events via POST to the Events resource, which is located at https://api.intercom.io/events, or you can send events using one of the client libraries. When working with the HTTP API directly a client should send the event with a `Content-Type` of `application/json`.

When using the JavaScript API, [adding the code to your app](http://docs.intercom.io/configuring-Intercom/tracking-user-events-in-your-app) makes the Events API available. Once added, you can submit an event using the `trackEvent` method. This will associate the event with the Lead or currently logged-in user or logged-out visitor/lead and send it to Intercom. The final parameter is a map that can be used to send optional metadata about the event.

With the Ruby client you pass a hash describing the event to `Intercom::Event.create`, or call the `track_user` method directly on the current user object (e.g. `user.track_event`).

**NB: For the JSON object types, please note that we do not currently support nested JSON structure.**

| Type            | Description                                                                                                                                                                                                     | Example                                                                           |
| :-------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :-------------------------------------------------------------------------------- |
| String          | The value is a JSON String                                                                                                                                                                                      | `"source":"desktop"`                                                              |
| Number          | The value is a JSON Number                                                                                                                                                                                      | `"load": 3.67`                                                                    |
| Date            | The key ends with the String `_date` and the value is a [Unix timestamp](http://en.wikipedia.org/wiki/Unix_time), assumed to be in the [UTC](http://en.wikipedia.org/wiki/Coordinated_Universal_Time) timezone. | `"contact_date": 1392036272`                                                      |
| Link            | The value is a HTTP or HTTPS URI.                                                                                                                                                                               | `"article": "https://example.org/ab1de.html"`                                     |
| Rich Link       | The value is a JSON object that contains `url` and `value` keys.                                                                                                                                                | `"article": {"url": "https://example.org/ab1de.html", "value":"the dude abides"}` |
| Monetary Amount | The value is a JSON object that contains `amount` and `currency` keys. The `amount` key is a positive integer representing the amount in cents. The price in the example to the right denotes €349.99.          | `"price": {"amount": 34999, "currency": "eur"}`                                   |

**Lead Events**

When submitting events for Leads, you will need to specify the Lead's `id`.

**Metadata behaviour**

- We currently limit the number of tracked metadata keys to 10 per event. Once the quota is reached, we ignore any further keys we receive. The first 10 metadata keys are determined by the order in which they are sent in with the event.
- It is not possible to change the metadata keys once the event has been sent. A new event will need to be created with the new keys and you can archive the old one.
- There might be up to 24 hrs delay when you send a new metadata for an existing event.

**Event de-duplication**

The API may detect and ignore duplicate events. Each event is uniquely identified as a combination of the following data - the Workspace identifier, the Contact external identifier, the Data Event name and the Data Event created time. As a result, it is **strongly recommended** to send a second granularity Unix timestamp in the `created_at` field.

Duplicated events are responded to using the normal `202 Accepted` code - an error is not thrown, however repeat requests will be counted against any rate limit that is in place.

### HTTP API Responses

- Successful responses to submitted events return `202 Accepted` with an empty body.
- Unauthorised access will be rejected with a `401 Unauthorized` or `403 Forbidden` response code.
- Events sent about users that cannot be found will return a `404 Not Found`.
- Event lists containing duplicate events will have those duplicates ignored.
- Server errors will return a `500` response code and may contain an error message in the body.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->dataEvents->createDataEvent(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataEvents->dataEventSummaries($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create event summaries for a user. Event summaries are used to track the number of times an event has occurred, the first time it occurred and the last time it occurred.

</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->events->summaries(
    new ListEventSummariesRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `?string` — Your identifier for the user.
    
</dd>
</dl>

<dl>
<dd>

**$eventSummaries:** `?CreateDataEventSummariesRequestEventSummaries` — A list of event summaries for the user. Each event summary should contain the event name, the time the event occurred, and the number of times the event occurred. The event name should be a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Data Export
<details><summary><code>$client->unstable->dataExport->createDataExport($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

To create your export job, you need to send a `POST` request to the export endpoint `https://api.intercom.io/export/content/data`.

The only parameters you need to provide are the range of dates that you want exported.

>🚧 Limit of one active job
>
> You can only have one active job per workspace. You will receive a HTTP status code of 429 with the message Exceeded rate limit of 1 pending message data export jobs if you attempt to create a second concurrent job.

>❗️ Updated_at not included
>
> It should be noted that the timeframe only includes messages sent during the time period and not messages that were only updated during this period. For example, if a message was updated yesterday but sent two days ago, you would need to set the created_at_after date before the message was sent to include that in your retrieval job.

>📘 Date ranges are inclusive
>
> Requesting data for 2018-06-01 until 2018-06-30 will get all data for those days including those specified - e.g. 2018-06-01 00:00:00 until 2018-06-30 23:59:99.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->create(
    new CreateDataExportRequest([
        'createdAtAfter' => 1734519776,
        'createdAtBefore' => 1734537776,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$createdAtAfter:** `int` — The start date that you request data for. It must be formatted as a unix timestamp.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtBefore:** `int` — The end date that you request data for. It must be formatted as a unix timestamp.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataExport->getDataExport($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can view the status of your job by sending a `GET` request to the URL
`https://api.intercom.io/export/content/data/{job_identifier}` - the `{job_identifier}` is the value returned in the response when you first created the export job. More on it can be seen in the Export Job Model.

> 🚧 Jobs expire after two days
> All jobs that have completed processing (and are thus available to download from the provided URL) will have an expiry limit of two days from when the export ob completed. After this, the data will no longer be available.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->find(
    new FindDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataExport->cancelDataExport($request) -> DataExport</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can cancel your job
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->cancel(
    new CancelDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->dataExport->downloadDataExport($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

When a job has a status of complete, and thus a filled download_url, you can download your data by hitting that provided URL, formatted like so: https://api.intercom.io/download/content/data/xyz1234.

Your exported message data will be streamed continuously back down to you in a gzipped CSV format.

> 📘 Octet header required
>
> You will have to specify the header Accept: `application/octet-stream` when hitting this endpoint.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->dataExport->download(
    new DownloadDataExportRequest([
        'jobIdentifier' => 'job_identifier',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$jobIdentifier:** `string` — job_identifier
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Jobs
<details><summary><code>$client->unstable->jobs->status($request) -> Jobs</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the status of job execution.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->jobs->status(
    new JobsStatusRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the job which is given by Intercom
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Macros
<details><summary><code>$client->unstable->macros->listMacros($request) -> MacroList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all macros (saved replies) in your workspace for use in automating responses.

The macros are returned in descending order by updated_at.

**Pagination**

This endpoint uses cursor-based pagination via the `starting_after` parameter. The cursor is a Base64-encoded JSON array containing `[updated_at, id]` of the last item from the previous page.

**Placeholder Transformation**

The API transforms Intercom placeholders to a more standard XML-like format:
- From: `{{user.name | fallback: 'there'}}`
- To: `<attribute key="user.name" default="there"/>`
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->macros->listMacros(
    new ListMacrosRequest([
        'perPage' => 1,
        'startingAfter' => 'WzE3MTk0OTM3NTcuMCwgIjEyMyJd',
        'updatedSince' => 1000000,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$perPage:** `?int` — The number of results per page
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Base64-encoded cursor containing [updated_at, id] for pagination
    
</dd>
</dl>

<dl>
<dd>

**$updatedSince:** `?int` — Unix timestamp to filter macros updated after this time
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->macros->getMacro($request) -> ?Macro</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a single macro (saved reply) by its ID. The macro will only be returned if it is visible to the authenticated user based on its visibility settings.

**Visibility Rules**

A macro is returned based on its `visible_to` setting:
- `everyone`: Always visible to all team members
- `specific_teams`: Only visible if the authenticated user belongs to one of the teams specified in `visible_to_team_ids`

If a macro exists but is not visible to the authenticated user, a 404 error is returned.

**Placeholder Transformation**

The API transforms Intercom placeholders to a more standard XML-like format in the `body` field:
- From: `{{user.name | fallback: 'there'}}`
- To: `<attribute key="user.name" default="there"/>`

Default values in placeholders are HTML-escaped for security.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->macros->getMacro(
    new GetMacroRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the macro
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Messages
<details><summary><code>$client->unstable->messages->createMessage($request) -> Message</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a message that has been initiated by an admin. The conversation can be either an in-app message, an email, sms or whatsapp.

> 🚧 Sending for visitors
>
> There can be a short delay between when a contact is created and when a contact becomes available to be messaged through the API. A 404 Not Found error will be returned in this case.

This will return the Message model that has been created.

> 🚧 Retrieving Associated Conversations
>
> As this is a message, there will be no conversation present until the contact responds. Once they do, you will have to search for a contact's conversations with the id of the message.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->messages->createMessage(
    [
        'from' => [
            'type' => "user",
            'id' => "6762f2341bb69f9f2193bc17",
        ],
        'body' => "heyy",
        'referer' => "https://twitter.com/bob",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->messages->getWhatsAppMessageStatus($request) -> WhatsappMessageStatusList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves statuses of messages sent from the Outbound module. Currently, this API only supports WhatsApp messages.


This endpoint returns paginated status events for WhatsApp messages sent via the Outbound module, providing
information about delivery state and related message details.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->messages->getWhatsAppMessageStatus(
    new GetWhatsAppMessageStatusRequest([
        'rulesetId' => 'ruleset_id',
        'perPage' => 1,
        'startingAfter' => 'starting_after',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$rulesetId:** `string` — The unique identifier for the set of messages to check status for
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — Number of results per page (default 50, max 100)
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Cursor for pagination, used to fetch the next page of results
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## News
<details><summary><code>$client->unstable->news->listNewsItems() -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all news items
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->createNewsItem($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a news item
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->items->create(
    new NewsItemRequest([
        'title' => 'Halloween is here!',
        'body' => '<p>New costumes in store for this spooky season</p>',
        'senderId' => 991267834,
        'state' => NewsItemRequestState::Live->value,
        'deliverSilently' => true,
        'labels' => [
            'Product',
            'Update',
            'New',
        ],
        'reactions' => [
            '😆',
            '😅',
        ],
        'newsfeedAssignments' => [
            new NewsfeedAssignment([
                'newsfeedId' => 53,
                'publishedAt' => 1664638214,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `NewsItemRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->retrieveNewsItem($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single news item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->news->retrieveNewsItem(
    new RetrieveNewsItemRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->updateNewsItem($request) -> NewsItem</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->news->updateNewsItem(
    new UpdateNewsItemRequest([
        'id' => 1,
        'body' => new NewsItemRequest([
            'title' => 'Christmas is here!',
            'body' => '<p>New gifts in store for the jolly season</p>',
            'senderId' => 991267845,
            'reactions' => [
                '😝',
                '😂',
            ],
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `NewsItemRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->deleteNewsItem($request) -> DeletedObject</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a single news item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->news->deleteNewsItem(
    new DeleteNewsItemRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The unique identifier for the news item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->listLiveNewsfeedItems($request) -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all news items that are live on a given newsfeed
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->news->listLiveNewsfeedItems(
    new ListLiveNewsfeedItemsRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the news feed item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->listNewsfeeds() -> PaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all newsfeeds
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->news->feeds->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->news->retrieveNewsfeed($request) -> Newsfeed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single newsfeed
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->news->retrieveNewsfeed(
    new RetrieveNewsfeedRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the news feed item which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Segments
<details><summary><code>$client->unstable->segments->listSegments($request) -> SegmentList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch a list of all segments.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->segments->list(
    new ListSegmentsRequest([
        'includeCount' => true,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$includeCount:** `?bool` — It includes the count of contacts that belong to each segment.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->segments->retrieveSegment($request) -> Segment</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single segment.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->segments->retrieveSegment(
    new RetrieveSegmentRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identified of a given segment.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Switch
<details><summary><code>$client->unstable->switch_->createPhoneSwitch($request) -> ?PhoneSwitch</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can use the API to deflect phone calls to the Intercom Messenger.
Calling this endpoint will send an SMS with a link to the Messenger to the phone number specified.

If custom attributes are specified, they will be added to the user or lead's custom data attributes.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->switch->createPhoneSwitch(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Calls
<details><summary><code>$client->unstable->calls->listCalls($request) -> CallList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a paginated list of calls.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->listCalls(
    new ListCallsRequest([
        'page' => 1,
        'perPage' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` — The page of results to fetch. Defaults to first page
    
</dd>
</dl>

<dl>
<dd>

**$perPage:** `?int` — How many results to display per page. Defaults to 25. Max 25.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->showCall($request) -> Call</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single call by id.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->showCall(
    new ShowCallRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id of the call to retrieve
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->showCallRecording($request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Redirects to a signed URL for the call's recording if it exists.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->showCallRecording(
    new ShowCallRecordingRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id of the call
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->showCallTranscript($request) -> string</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the transcript for the specified call as a downloadable text file.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->showCallTranscript(
    new ShowCallTranscriptRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The id of the call
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->listCallsWithTranscripts($request) -> ListCallsWithTranscriptsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve calls by a list of conversation ids and include transcripts when available.
A maximum of 20 `conversation_ids` can be provided. If none are provided or more than 20 are provided, a 400 error is returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->listCallsWithTranscripts(
    new ListCallsWithTranscriptsRequest([
        'conversationIds' => [
            '64619700005694',
            '64619700005695',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$conversationIds:** `array` — A list of conversation ids to fetch calls for. Maximum 20.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->registerFinVoiceCall($request) -> AiCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Register a Fin Voice call with Intercom. This endpoint creates an external reference
that links an external call identifier to an Intercom call and conversation.

The call can be from different sources:
- AWS Connect (default)
- Five9
- Zoom Phone
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->registerFinVoiceCall(
    new RegisterFinVoiceCallRequest([
        'phoneNumber' => '+1234567890',
        'callId' => 'call-123-abc',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `?RegisterFinVoiceCallRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->collectFinVoiceCallById($request) -> AiCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve information about a Fin Voice call using the external reference ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->collectFinVoiceCallById(
    new CollectFinVoiceCallByIdRequest([
        'id' => 1,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `int` — The external reference ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->collectFinVoiceCallByExternalId($request) -> AiCallResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve information about a Fin Voice call using the external call identifier.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->collectFinVoiceCallByExternalId(
    new CollectFinVoiceCallByExternalIdRequest([
        'externalId' => 'external_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$externalId:** `string` — The external call identifier from the call provider
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->calls->collectFinVoiceCallByPhoneNumber($request) -> Error</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve information about a Fin Voice call using the phone number.

Returns the most recent matched call for the given phone number, ordered by creation date.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->calls->collectFinVoiceCallByPhoneNumber(
    new CollectFinVoiceCallByPhoneNumberRequest([
        'phoneNumber' => 'phone_number',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$phoneNumber:** `string` — Phone number in E.164 format
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Teams
<details><summary><code>$client->unstable->teams->listTeams() -> TeamList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

This will return a list of team objects for the App.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->teams->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->teams->retrieveTeam($request) -> Team</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single team, containing an array of admins that belong to this team.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->teams->retrieveTeam(
    new RetrieveTeamRequest([
        'id' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of a given team.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ticket States
<details><summary><code>$client->unstable->ticketStates->listTicketStates() -> TicketStateList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a list of all ticket states for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketStates->listTicketStates();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ticket Type Attributes
<details><summary><code>$client->unstable->ticketTypeAttributes->createTicketTypeAttribute($request) -> ?TicketTypeAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new attribute for a ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->attributes->create(
    new CreateTicketTypeAttributeRequest([
        'ticketTypeId' => 'ticket_type_id',
        'name' => 'Attribute Title',
        'description' => 'Attribute Description',
        'dataType' => CreateTicketTypeAttributeRequestDataType::String->value,
        'requiredToCreate' => false,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — The name of the ticket type attribute
    
</dd>
</dl>

<dl>
<dd>

**$description:** `string` — The description of the attribute presented to the teammate or contact
    
</dd>
</dl>

<dl>
<dd>

**$dataType:** `string` — The data type of the attribute
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreate:** `?bool` — Whether the attribute is required to be filled in when teammates are creating the ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreateForContacts:** `?bool` — Whether the attribute is required to be filled in when contacts are creating the ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$visibleOnCreate:** `?bool` — Whether the attribute is visible to teammates when creating a ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$visibleToContacts:** `?bool` — Whether the attribute is visible to contacts when creating a ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$multiline:** `?bool` — Whether the attribute allows multiple lines of text (only applicable to string attributes)
    
</dd>
</dl>

<dl>
<dd>

**$listItems:** `?string` — A comma delimited list of items for the attribute value (only applicable to list attributes)
    
</dd>
</dl>

<dl>
<dd>

**$allowMultipleValues:** `?bool` — Whether the attribute allows multiple files to be attached to it (only applicable to file attributes)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->ticketTypeAttributes->updateTicketTypeAttribute($request) -> ?TicketTypeAttribute</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update an existing attribute for a ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->ticketTypeAttributes->updateTicketTypeAttribute(
    new UpdateTicketTypeAttributeRequest([
        'ticketTypeId' => 'ticket_type_id',
        'id' => 'id',
        'description' => 'New Attribute Description',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$ticketTypeId:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier for the ticket type attribute which is given by Intercom.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — The name of the ticket type attribute
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — The description of the attribute presented to the teammate or contact
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreate:** `?bool` — Whether the attribute is required to be filled in when teammates are creating the ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$requiredToCreateForContacts:** `?bool` — Whether the attribute is required to be filled in when contacts are creating the ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$visibleOnCreate:** `?bool` — Whether the attribute is visible to teammates when creating a ticket in Inbox.
    
</dd>
</dl>

<dl>
<dd>

**$visibleToContacts:** `?bool` — Whether the attribute is visible to contacts when creating a ticket in Messenger.
    
</dd>
</dl>

<dl>
<dd>

**$multiline:** `?bool` — Whether the attribute allows multiple lines of text (only applicable to string attributes)
    
</dd>
</dl>

<dl>
<dd>

**$listItems:** `?string` — A comma delimited list of items for the attribute value (only applicable to list attributes)
    
</dd>
</dl>

<dl>
<dd>

**$allowMultipleValues:** `?bool` — Whether the attribute allows multiple files to be attached to it (only applicable to file attributes)
    
</dd>
</dl>

<dl>
<dd>

**$archived:** `?bool` — Whether the attribute should be archived and not shown during creation of the ticket (it will still be present on previously created tickets)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ticket Types
<details><summary><code>$client->unstable->ticketTypes->listTicketTypes() -> TicketTypeList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can get a list of all ticket types for a workspace.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ticketTypes->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->ticketTypes->createTicketType($request) -> ?TicketType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can create a new ticket type.
> 📘 Creating ticket types.
>
> Every ticket type will be created with two default attributes: _default_title_ and _default_description_.
> For the `icon` propery, use an emoji from [Twemoji Cheatsheet](https://twemoji-cheatsheet.vercel.app/)
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->ticketTypes->createTicketType(
    [
        'key' => "value",
    ],
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->ticketTypes->getTicketType($request) -> ?TicketType</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single ticket type.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->ticketTypes->getTicketType(
    new GetTicketTypeRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the ticket type which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tickets
<details><summary><code>$client->unstable->tickets->replyTicket($request) -> TicketReply</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can reply to a ticket with a message from an admin or on behalf of a contact, or with a note for admins.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->replyTicket(
    new ReplyTicketRequest([
        'id' => '123',
        'body' => new ContactReplyTicketIntercomUserIdRequest([
            'messageType' => 'comment',
            'type' => 'user',
            'body' => 'Thanks again :)',
            'intercomUserId' => '6762f2971bb69f9f2193bc49',
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$request:** `ContactReplyTicketIntercomUserIdRequest|ContactReplyTicketUserIdRequest|ContactReplyTicketEmailRequest|AdminReplyTicketRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tickets->enqueueCreateTicket($request) -> Jobs</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Enqueues ticket creation for asynchronous processing, returning if the job was enqueued successfully to be processed. We attempt to perform a best-effort validation on inputs before tasks are enqueued. If the given parameters are incorrect, we won't enqueue the job.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tickets->enqueueCreateTicket(
    new EnqueueCreateTicketRequest([
        'ticketTypeId' => '1234',
        'contacts' => [
            new CreateTicketRequestContactsItemId([
                'id' => '6762f2d81bb69f9f2193bc54',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$skipNotifications:** `?bool` — Option to disable notifications when a Ticket is created.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tickets->getTicket($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->getTicket(
    new GetTicketRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the ticket which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tickets->updateTicket($request) -> ?Ticket</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can update a ticket.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->updateTicket(
    new UpdateTicketRequest([
        'id' => 'id',
        'ticketAttributes' => [
            '_default_title_' => "example",
            '_default_description_' => "there is a problem",
        ],
        'ticketStateId' => '123',
        'open' => true,
        'snoozedUntil' => 1673609604,
        'adminId' => 991268011,
        'assigneeId' => '123',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the ticket which is given by Intercom
    
</dd>
</dl>

<dl>
<dd>

**$ticketAttributes:** `?array` — The attributes set on the ticket.
    
</dd>
</dl>

<dl>
<dd>

**$ticketStateId:** `?string` — The ID of the ticket state associated with the ticket type.
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `?string` — The ID of the company that the ticket is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
    
</dd>
</dl>

<dl>
<dd>

**$open:** `?bool` — Specify if a ticket is open. Set to false to close a ticket. Closing a ticket will also unsnooze it.
    
</dd>
</dl>

<dl>
<dd>

**$isShared:** `?bool` — Specify whether the ticket is visible to users.
    
</dd>
</dl>

<dl>
<dd>

**$snoozedUntil:** `?int` — The time you want the ticket to reopen.
    
</dd>
</dl>

<dl>
<dd>

**$adminId:** `?int` — The ID of the admin performing ticket update. Needed for workflows execution and attributing actions to specific admins.
    
</dd>
</dl>

<dl>
<dd>

**$assigneeId:** `?string` — The ID of the admin or team to which the ticket is assigned. Set this 0 to unassign it.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tickets->deleteTicket($request) -> DeleteTicketResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can delete a ticket using the Intercom provided ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->deleteTicket(
    new DeleteTicketRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the ticket which is given by Intercom.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->tickets->searchTickets($request) -> TicketList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can search for multiple tickets by the value of their attributes in order to fetch exactly which ones you want.

To search for tickets, you send a `POST` request to `https://api.intercom.io/tickets/search`.

This will accept a query object in the body which will define your filters.
{% admonition type="warning" name="Optimizing search queries" %}
  Search queries can be complex, so optimizing them can help the performance of your search.
  Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
  pagination to limit the number of results returned. The default is `20` results per page.
  See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
{% /admonition %}

### Nesting & Limitations

You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
There are some limitations to the amount of multiples there can be:
- There's a limit of max 2 nested filters
- There's a limit of max 15 filters for each AND or OR group

### Accepted Fields

Most keys listed as part of the Ticket model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foobar"`).
The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.

| Field                                     | Type                                                                                     |
| :---------------------------------------- | :--------------------------------------------------------------------------------------- |
| id                                        | String                                                                                   |
| created_at                                | Date (UNIX timestamp)                                                                    |
| updated_at                                | Date (UNIX timestamp)                                                                    |
| title                           | String                                                                                   |
| description                     | String                                                                                   |
| category                                  | String                                                                                   |
| ticket_type_id                            | String                                                                                   |
| contact_ids                               | String                                                                                   |
| teammate_ids                              | String                                                                                   |
| admin_assignee_id                         | String                                                                                   |
| team_assignee_id                          | String                                                                                   |
| open                                      | Boolean                                                                                  |
| state                                     | String                                                                                   |
| snoozed_until                             | Date (UNIX timestamp)                                                                    |
| ticket_attribute.{id}                     | String or Boolean or Date (UNIX timestamp) or Float or Integer                           |

{% admonition type="info" name="Searching by Category" %}
When searching for tickets by the **`category`** field, specific terms must be used instead of the category names:
* For **Customer** category tickets, use the term `request`.
* For **Back-office** category tickets, use the term `task`.
* For **Tracker** category tickets, use the term `tracker`.
{% /admonition %}

### Accepted Operators

{% admonition type="info" name="Searching based on `created_at`" %}
  You may use the `<=` or `>=` operators to search by `created_at`.
{% /admonition %}

The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).

| Operator | Valid Types                    | Description                                                  |
| :------- | :----------------------------- | :----------------------------------------------------------- |
| =        | All                            | Equals                                                       |
| !=       | All                            | Doesn't Equal                                                |
| IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
| NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
| >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
| <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
| ~        | String                         | Contains                                                     |
| !~       | String                         | Doesn't Contain                                              |
| ^        | String                         | Starts With                                                  |
| $        | String                         | Ends With                                                    |
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->tickets->searchTickets(
    new SearchRequest([
        'query' => new SingleFilterSearchRequest([]),
        'pagination' => new StartingAfterPaging([
            'perPage' => 5,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `SearchRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Visitors
<details><summary><code>$client->unstable->visitors->retrieveVisitorWithUserId($request) -> ?Visitor</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can fetch the details of a single visitor.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->visitors->find(
    new FindVisitorRequest([
        'userId' => 'user_id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — The user_id of the Visitor you want to retrieve.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->visitors->updateVisitor($request) -> ?Visitor</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Sending a PUT request to `/visitors` will result in an update of an existing Visitor.

**Option 1.** You can update a visitor by passing in the `user_id` of the visitor in the Request body.

**Option 2.** You can update a visitor by passing in the `id` of the visitor in the Request body.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->visitors->update(
    new UpdateVisitorRequestWithId([
        'id' => '6762f30c1bb69f9f2193bc5e',
        'name' => 'Gareth Bale',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->visitors->convertVisitor($request) -> Contact</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

You can merge a Visitor to a Contact of role type `lead` or `user`.

> 📘 What happens upon a visitor being converted?
>
> If the User exists, then the Visitor will be merged into it, the Visitor deleted and the User returned. If the User does not exist, the Visitor will be converted to a User, with the User identifiers replacing it's Visitor identifiers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->visitors->convertVisitor(
    new ConvertVisitorRequest([
        'type' => 'user',
        'user' => [
            'email' => "foo@bar.com",
        ],
        'visitor' => [
            'user_id' => "3ecf64d0-9ed1-4e9f-88e1-da7d6e6782f3",
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$type:** `string` — Represents the role of the Contact model. Accepts `lead` or `user`.
    
</dd>
</dl>

<dl>
<dd>

**$user:** `mixed` 
    
</dd>
</dl>

<dl>
<dd>

**$visitor:** `mixed` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Brands
<details><summary><code>$client->unstable->brands->listBrands() -> BrandList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieves all brands for the workspace, including the default brand.
The default brand id always matches the workspace
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->brands->listBrands();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->brands->retrieveBrand($request) -> Brand</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetches a specific brand by its unique identifier
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->brands->retrieveBrand(
    new RetrieveBrandRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the brand
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Emails
<details><summary><code>$client->unstable->emails->listEmails() -> EmailList</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Lists all sender email address settings for the workspace
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->emails->listEmails();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client->unstable->emails->retrieveEmail($request) -> EmailSetting</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetches a specific email setting by its unique identifier
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->unstable->emails->retrieveEmail(
    new RetrieveEmailRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the email setting
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>
