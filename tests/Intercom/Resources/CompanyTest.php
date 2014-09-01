<?php

namespace Intercom;

class CompanyTest extends IntercomTestCase
{
    public function testGetCompanyByID()
    {
        $this->setMockResponse($this->client, 'Company/Company.txt');
        $response = $this->client->getCompany(['id' => '123456']);

        $this->assertBasicAuth('my-app', '1234');
        $this->assertRequest('GET', '/companies/123456');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Blue Sun', $response['name']);
    }

    public function testGetCompanyByName()
    {
        $this->setMockResponse($this->client, 'Company/Company.txt');
        $this->client->getCompany(['name' => 'Blue Sun']);

        $this->assertRequest('GET', '/companies/?name=Blue%20Sun');
    }

    public function testGetCompanyByCompanyID()
    {
        $this->setMockResponse($this->client, 'Company/Company.txt');
        $this->client->getCompany(['company_id' => 'hgsdfhsasdfg']);

        $this->assertRequest('GET', '/companies/?company_id=hgsdfhsasdfg');
    }

    public function testCreateCompany()
    {
        $this->setMockResponse($this->client, 'Company/Company.txt');
        $response = $this->client->createCompany(['name' => 'Blue Sun', 'company_id' => '1234']);

        $this->assertRequest('POST', '/companies');
        $this->assertRequestJson(['company_id' => '1234', 'name' => 'Blue Sun']);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Blue Sun', $response['name']);
    }

    public function testUpdateCompany()
    {
        $this->setMockResponse($this->client, 'Company/Company.txt');
        $response = $this->client->updateCompany(['id' => '123456', 'company_id' => '1234', 'hi' => 'hello']);

        $this->assertRequest('POST', '/companies');
        $this->assertRequestJson(['company_id' => '1234']);

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals('Blue Sun', $response['name']);
    }

    public function testGetCompanies()
    {
        $this->setMockResponse($this->client, 'Company/CompanyList.txt');
        $response = $this->client->getCompanies();
        $companies = $response->get('companies');

        $this->assertRequest('GET', '/companies');

        $this->assertInstanceOf('\Guzzle\Service\Resource\Model', $response);
        $this->assertEquals(2, count($companies));
        $this->assertEquals('Blue Sun', $companies['0']['name']);
        $this->assertEquals('Blue Moon', $companies['1']['name']);
    }

    public function testGetCompaniesByTagID()
    {
        $this->setMockResponse($this->client, 'Company/CompanyList.txt');
        $this->client->getCompanies(['tag_id' => '10', 'hello'=>'hi']);

        $this->assertRequest('GET', '/companies?tag_id=10');
    }

    public function testGetCompaniesBySegmentID()
    {
        $this->setMockResponse($this->client, 'Company/CompanyList.txt');
        $this->client->getCompanies(['segment_id' => '20', 'hello'=>'hi']);

        $this->assertRequest('GET', '/companies?segment_id=20');
    }

    public function testGetCompanyUsers()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getCompanyUsers(['id' => '1234']);

        $this->assertRequest('GET', '/companies/1234/users');
    }

    public function testGetCompanyUsersByCompanyID()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getCompanyUsersByCompanyID(['company_id' => '10', 'type' => 'user']);

        $this->assertRequest('GET', '/companies?company_id=10&type=user');
    }

    public function testGetCompanyUsersByCompanyIDNoType()
    {
        $this->setMockResponse($this->client, 'User/UserList.txt');
        $this->client->getCompanyUsersByCompanyID(['company_id' => '10']);

        $this->assertRequest('GET', '/companies?company_id=10&type=user');
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testCreateCompanyNoCompanyID()
    {
        $this->client->createCompany();
    }

    /**
     * @expectedException \Guzzle\Service\Exception\ValidationException
     */
    public function testUpdateCompanyNoCompanyID()
    {
        $this->client->updateCompany();
    }
}