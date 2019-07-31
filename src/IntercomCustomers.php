<?php

namespace Intercom;

use Http\Client\Exception;
use stdClass;

class IntercomCustomers
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomCustomers constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Saerch Customers
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#customers
     * @param  array query
     * @return stdClass
     * @throws Exception
     */
    public function searchCustomers($query)
    {
        return $this->client->post('customers/search', $query);
    }
}
