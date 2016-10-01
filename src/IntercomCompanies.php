<?php

namespace Intercom;

class IntercomCompanies {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomCompanies constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Creates a Company.
   * @see https://developers.intercom.io/reference#create-or-update-company
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function create($options)
  {
    return $this->client->post("companies", $options);
  }

  /**
   * Returns list of Companies.
   * @see https://developers.intercom.io/reference#list-companies
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getCompanies($options)
  {
    return $this->client->get("companies", $options);
  }
}
