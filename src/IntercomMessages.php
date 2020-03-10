<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomMessages extends IntercomResource
{
    /**
     * Creates Message.
     *
     * @see    https://developers.intercom.io/reference#conversations
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("messages", $options);
    }

    /**
     * Creates Message Export Job
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#creating-an-export-job
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function createExport($options)
    {
        return $this->client->post("export/messages/data", $options);
    }

    /**
     * Retrieves Export Job Status
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#checking-the-status-of-the-job
     * @param  string $job_identifier
     * @return stdClass
     * @throws Exception
     */
    public function retrieveExportStatus($job_identifier)
    {
        return $this->client->get("export/messages/data/" . $job_identifier, []);
    }

    /**
     * Retrieves Export Job Data
     *
     * Important: The Intercom Client Accept Header must be application/octet-stream
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#downloading-the-data
     * @param  string $job_identifier
     * @return stdClass
     * @throws Exception
     */
    public function retrieveExportData($job_identifier)
    {
        return $this->client->get("download/messages/data/" . $job_identifier, []);
    }
}
