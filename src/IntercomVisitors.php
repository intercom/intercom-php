<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomVisitors extends IntercomResource
{
     /**
     * Updates Visitor.
     *
     * @see    https://developers.intercom.com/reference#update-a-visitor
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function update($options)
    {
        return $this->client->put("visitors", $options);
    }


    /**
     * Returns single Visitor.
     *
     * @see    https://developers.intercom.com/reference#view-a-visitor
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getVisitor($id, $options = [])
    {
        $path = $this->visitorPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Deletes Visitor.
     *
     * @see    https://developers.intercom.com/reference#delete-a-visitor
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function deleteVisitor($id, $options = [])
    {
        $path = $this->visitorPath($id);
        return $this->client->delete($path, $options);
    }

    /**
     * Converts Visitor.
     *
     * @see    https://developers.intercom.io/reference#convert-a-lead
     * @param  $options
     * @return stdClass
     * @throws Exception
     */
    public function convertVisitor($options)
    {
        return $this->client->post("visitors/convert", $options);
    }

    /**
     * Returns endpoint path to Visitor with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function visitorPath($id)
    {
        return "visitors/" . $id;
    }
}
