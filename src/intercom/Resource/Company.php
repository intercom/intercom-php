<?php
namespace Intercom\Resource;

use \InvalidArgumentException;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;

class Company implements ResponseClassInterface
{
    private $app_id;
    private $created_at;
    private $custom_data;
    private $id;
    private $last_request_at;
    private $monthly_spend;
    private $name;
    private $plan_id;
    private $remote_company_id;
    private $remote_created_at;
    private $session_count;
    private $tag_ids;
    private $updated_at;
    private $user_count;

    public function __construct($company = [])
    {
        if (!empty($company)) {
            $this->setCompanyFromData($company);
        }
    }

    private function setDataFromAPI(array $api_data)
    {
        if (!isset($api_data['type']) || $api_data['type'] !== 'company') {
            // @todo: Decide if this is an exception or a silent failure
            throw new InvalidArgumentException('API response not valid, type of response is incorrect');
        }

        $this->setCompanyFromData($api_data);
    }

    /**
     * Takes the response from a successful API call and creates the
     * object based on that
     *
     * @param OperationCommand $command The command
     * @return ResponseClassInterface|User
     */
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $obj = new self();

        if ($response->getBody()) {
            $obj->setDataFromAPI($response->json());
        }

        return $obj;
    }

    /**
     * Sets company data from an array
     *
     * @param array $company Company data
     */
    private function setCompanyFromData($company)
    {
        foreach ($company as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $setter_method = sprintf('set%s', str_replace('_', '', $attribute));
                if (method_exists($this, $setter_method)) {
                    $this->$setter_method($value);
                }
            }
        }
    }

    /**
     * @param mixed $app_id
     */
    public function setAppId($app_id)
    {
        $this->app_id = $app_id;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $custom_data
     */
    public function setCustomData($custom_data)
    {
        $this->custom_data = $custom_data;
    }

    /**
     * @return mixed
     */
    public function getCustomData()
    {
        return $this->custom_data;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $last_request_at
     */
    public function setLastRequestAt($last_request_at)
    {
        $this->last_request_at = $last_request_at;
    }

    /**
     * @return mixed
     */
    public function getLastRequestAt()
    {
        return $this->last_request_at;
    }

    /**
     * @param mixed $monthly_spend
     */
    public function setMonthlySpend($monthly_spend)
    {
        $this->monthly_spend = $monthly_spend;
    }

    /**
     * @return mixed
     */
    public function getMonthlySpend()
    {
        return $this->monthly_spend;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $plan_id
     */
    public function setPlanId($plan_id)
    {
        $this->plan_id = $plan_id;
    }

    /**
     * @return mixed
     */
    public function getPlanId()
    {
        return $this->plan_id;
    }

    /**
     * @param mixed $remote_company_id
     */
    public function setRemoteCompanyId($remote_company_id)
    {
        $this->remote_company_id = $remote_company_id;
    }

    /**
     * @return mixed
     */
    public function getRemoteCompanyId()
    {
        return $this->remote_company_id;
    }

    /**
     * @param mixed $remote_created_at
     */
    public function setRemoteCreatedAt($remote_created_at)
    {
        $this->remote_created_at = $remote_created_at;
    }

    /**
     * @return mixed
     */
    public function getRemoteCreatedAt()
    {
        return $this->remote_created_at;
    }

    /**
     * @param mixed $session_count
     */
    public function setSessionCount($session_count)
    {
        $this->session_count = $session_count;
    }

    /**
     * @return mixed
     */
    public function getSessionCount()
    {
        return $this->session_count;
    }

    /**
     * @param mixed $tag_ids
     */
    public function setTagIds($tag_ids)
    {
        $this->tag_ids = $tag_ids;
    }

    /**
     * @return mixed
     */
    public function getTagIds()
    {
        return $this->tag_ids;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $user_count
     */
    public function setUserCount($user_count)
    {
        $this->user_count = $user_count;
    }

    /**
     * @return mixed
     */
    public function getUserCount()
    {
        return $this->user_count;
    }
}