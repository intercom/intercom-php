<?php

namespace Intercom;

class IntercomBulk
{

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomBulk constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
      $this->client = $client;
  }

  /**
   * Creates Users in bulk.
   * @see https://developers.intercom.com/v2.0/reference?showHidden=a10b1#bulk-user-ops
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function users($options)
  {
      return $this->client->post("bulk/users", $options);
  }

  /**
   * Creates Events in bulk.
   * @see https://developers.intercom.com/v2.0/reference?showHidden=a10b1#bulk-event-ops
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function events($options)
  {
      return $this->client->post("bulk/events", $options);
  }
}
