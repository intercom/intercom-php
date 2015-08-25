<?php

namespace Intercom;

class ContactTest extends IntercomTestCase
{
    public function testGetContactByUserId()
    {
      $this->setMockResponse($this->client, 'Contact/Contact.txt');
      $response = $this->client->getContact(['user_id' => 'foo']);

      $this->assertRequest('GET', '/contacts?user_id=foo');
    }

    public function testGetContactByEmail()
    {
        $this->setMockResponse($this->client, 'Contact/ContactList.txt');
        $response = $this->client->getContacts(['email' => 'bob@example.com']);

        $this->assertBasicAuth('my-app', '1234');
        $this->assertRequest('GET', '/contacts?email=bob%40example.com');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $contacts = $response->get('contacts');
        $this->assertEquals(1, count($contacts));
        $this->assertEquals('bob@example.com', $contacts['0']['email']);
    }

    public function testUpdateContact()
    {
      $this->setMockResponse($this->client, 'Contact/Contact.txt');
      $response = $this->client->updateContact(['id' => '1234', 'custom_attributes' => ['foo' => 'bar']]);

      $this->assertRequest('PUT', '/contacts');
      $this->assertRequestJson(['id' => '1234', 'custom_attributes' => ['foo' => 'bar']]);
    }

    public function testCreateContact()
    {
      $this->setMockResponse($this->client, 'Contact/Contact.txt');
      $response = $this->client->createContact();

      $this->assertRequest('POST', '/contacts');
      $this->assertEquals("Silver Dove", $response['pseudonym']);
    }

    public function testDeleteContact()
    {
        $this->setMockResponse($this->client, 'Contact/Contact.txt');
        $response = $this->client->deleteContact(['id' => '1234']);

        $this->assertRequest('DELETE', '/contacts');
        $this->assertRequestJson(['id' => '1234']);
    }

    public function testConvertContact()
    {
      $this->setMockResponse($this->client, 'Contact/Contact.txt');
      $response = $this->client->convertContact([
        "contact" => array("user_id" => 1),
        "user" => array("user_id" => 2)
      ]);

      $this->assertRequest('POST', '/contacts/convert');
      $this->assertRequestJson([
        "contact" => ["user_id" => 1],
        "user" => ["user_id" => 2]
      ]);
    }
}
