<?php

namespace Intercom;

use Http\Client\Exception;

class IntercomCompanies
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomCompanies constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Creates a Company.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-company
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function create($options)
    {
        return $this->client->post("companies", $options);
    }

    /**
     * Updates a Company.
     *
     * @see    https://developers.intercom.io/reference#create-or-update-company
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function update($options)
    {
        return $this->create($options);
    }

    /**
     * Returns list of Companies.
     *
     * @see    https://developers.intercom.io/reference#list-companies
     * @param  array $options
     * @return stdClass
     * @throws Exception
     */
    public function getCompanies($options)
    {
        return $this->client->get("companies", $options);
    }

    /**
     * Gets a single Company based on the Intercom ID.
     *
     * @see    https://developers.intercom.com/reference#view-a-company
     * @param  string $id
     * @param  array  $options
     * @return stdClass
     * @throws Exception
     */
    public function getCompany($id, $options = [])
    {
        $path = $this->companyPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * @param string $id
     * @return string
     */
    public function companyPath($id)
    {
        return 'companies/' . $id;
    }
}
