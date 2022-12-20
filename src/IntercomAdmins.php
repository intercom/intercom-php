<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomAdmins extends IntercomResource
{
    /**
     * Returns list of Admins.
     *
     * @see    https://developers.intercom.io/reference#list-admins
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getAdmins($options = [])
    {
        return $this->client->get("admins", $options);
    }

    /**
     * Gets a single Admin based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/v2.0/reference#view-an-admin
     * @param  integer $id
     * @param  array   $options
     * @return stdClass
     * @throws Exception
     */
    public function getAdmin($id, $options = [])
    {
        $path = $this->adminPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Returns endpoint path to Admin with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function adminPath($id)
    {
        return 'admins/' . $id;
    }
}
