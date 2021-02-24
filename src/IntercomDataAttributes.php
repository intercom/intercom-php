<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomDataAttributes extends IntercomResource
{
    /**
     * Creates a Data Attribute
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#create-data-attributes
     * @param array $options
     * @return stdClass
     * @throws Exception
     */
    public function create(array $options)
    {
        return $this->client->post($this->dataAttributePath(), $options);
    }

    /**
     * Updates a Data Attribute
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#update-data-attributes
     * @param array $options
     * @return stdClass
     * @throws Exception
     */
    public function update(array $options)
    {
        return $this->client->put($this->dataAttributePath(), $options);
    }

    /**
     * List all data attributes
     *
     * @see    https://developers.intercom.com/intercom-api-reference/reference#list-data-attributes
     * @param string $model
     * @param bool $include_archived
     * @return stdClass
     */
    public function list(string $model = 'contact', bool $include_archived = false )
    {
        $options = [
            'model' => $model,
            'include_archived' => $include_archived
        ];

        return $this->client->get($this->dataAttributePath(), $options);
    }

    /**
     * @param string $id
     * @return string
     */
    public function dataAttributePath()
    {
        return 'data_attributes';
    }

}
