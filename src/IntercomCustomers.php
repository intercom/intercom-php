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
    public function __construct(IntercomClient $client)
    {
        $this->client = $client;
    }

    /**
     * Search Customers
     *
     * @see    https://developers.intercom.com/intercom-api-reference/v0/reference#customers
     * @param  array query
     * @return stdClass
     * @throws Exception
     */
    public function search($query)
    {
        return $this->client->post('customers/search', $query);
    }
}
