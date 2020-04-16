<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomContacts extends IntercomResource
{
    /**
     * Returns list of Contacts that match search query.
     *
     * @see     https://developers.intercom.com/reference#search-for-contacts
     * @param   array $options
     * @return  stdClass
     * @throws  Exception
     */
    public function searchContacts(array $options)
    {
        $path = 'contacts/search';
        return $this->client->post($path, $options);
    }
}
