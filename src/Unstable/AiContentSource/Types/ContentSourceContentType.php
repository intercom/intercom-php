<?php

namespace Intercom\Unstable\AiContentSource\Types;

enum ContentSourceContentType: string
{
    case File = "file";
    case Article = "article";
    case ExternalContent = "external_content";
    case ContentSnippet = "content_snippet";
    case WorkflowConnectorAction = "workflow_connector_action";
}
