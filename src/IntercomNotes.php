<?php

namespace Intercom;

class IntercomNotes {

  /** @var IntercomClient */
  private $client;

  /**
   * IntercomNotes constructor.
   * @param IntercomClient $client
   */
  public function __construct($client)
  {
    $this->client = $client;
  }

  /**
   * Creates Note.
   * @see https://developers.intercom.io/reference#create-a-note
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function create($options)
  {
    return $this->client->post("notes", $options);
  }

  /**
   * Lists Notes.
   * @see https://developers.intercom.io/reference#list-notes-for-a-user
   * @param array $options
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getNotes($options)
  {
    return $this->client->get("notes", $options);
  }

  /**
   * Returns single Note.
   * @see https://developers.intercom.io/reference#view-a-note
   * @param string $id
   * @return mixed
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getNote($id)
  {
    return $this->client->get("notes/" . $id, []);
  }
}
