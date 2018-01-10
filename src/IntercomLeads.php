<?php

namespace Intercom;

class IntercomLeads
{

    /**
     * @var IntercomClient
     */
    private $client;

    /**
     * IntercomLeads constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Creates Lead.
     *
     * @see    https://developers.intercom.io/reference#create-lead
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($options)
    {
        return $this->client->post("contacts", $options);
    }

    /**
     * Creates Lead.
     *
     * @see    https://developers.intercom.io/reference#create-lead
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update($options)
    {
        return $this->create($options);
    }

    /**
     * Lists Leads.
     *
     * @see    https://developers.intercom.io/reference#list-leads
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLeads($options)
    {
        return $this->client->get("contacts", $options);
    }

    /**
     * Returns single Lead.
     *
     * @see    https://developers.intercom.io/reference#view-a-lead
     * @param  string $id
     * @param  array  $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLead($id, $options = [])
    {
        $path = $this->leadPath($id);
        return $this->client->get($path, $options);
    }

    /**
     * Deletes Lead.
     *
     * @see    https://developers.intercom.io/reference#delete-a-lead
     * @param  string $id
     * @param  array  $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteLead($id, $options = [])
    {
        $path = $this->leadPath($id);
        return $this->client->delete($path, $options);
    }

    /**
     * Converts Lead.
     *
     * @see    https://developers.intercom.io/reference#convert-a-lead
     * @param  $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function convertLead($options)
    {
        return $this->client->post("contacts/convert", $options);
    }

    /**
     * Returns endpoint path to Lead with given ID.
     *
     * @param  string $id
     * @return string
     */
    public function leadPath($id)
    {
        return "contacts/" . $id;
    }

    /**
     * Gets a list of Leads through the contacts scroll API.
     *
     * @see    https://developers.intercom.com/v2.0/reference#iterating-over-all-leads
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function scrollLeads($options = [])
    {
        return $this->client->get('contacts/scroll', $options);
    }
}
