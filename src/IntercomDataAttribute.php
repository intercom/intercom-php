<?php

namespace Intercom;

use stdClass;
use Http\Client\Exception;

class IntercomDataAttribute extends IntercomResource
{
    /**
     * Creates Data Attribute.
     *
     * @see https://developers.intercom.com/intercom-api-reference/reference#create-data-attributes
     *
     * @param array $options
     *
     * @return stdClass
     * @throws Exception
     */
    public function create(array $options)
    {
        return $this->client->post('data_attributes', $options);
    }

    /**
     * Update a Data Attribute.
     *
     * @see https://developers.intercom.com/intercom-api-reference/reference#update-data-attributes
     *
     * @param array $options
     *
     * @return stdClass
     * @throws Exception
     */
    public function update(string $id, array $options)
    {
        $path = $this->dataAttributePath($id);

        return $this->client->put($path, $options);
    }

    /**
     * Lists Data Attributes.
     *
     * @see https://developers.intercom.com/intercom-api-reference/reference#list-data-attributes
     *
     * @param array $options
     *
     * @return stdClass
     * @throws Exception
     */
    public function getDataAttributes(array $options = [])
    {
        return $this->client->get('data_attributes', $options);
    }

    /**
     * @param string $id
     *
     * @return string
     */
    public function dataAttributePath(string $id)
    {
        return 'data_attributes/' . $id;
    }
}
