<?php
namespace Intercom\Resource;

use \InvalidArgumentException as ArgumentException;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use Intercom\Util\FlatStore;

class User implements ResponseClassInterface
{
    /**
     * @var null|string
     */
    private $app_id;

    /**
     * @var null|array
     */
    private $avatar;

    /**
     * @var null|array
     */
    private $companies;

    /**
     * @var null|array
     */
    private $company_ids;

    /**
     * @var null|int
     */
    private $created_at;

    /**
     * @var null|FlatStore
     */
    private $custom_data;

    /**
     * @var null|string
     */
    private $email;

    /**
     * @var null|array
     */
    private $geoip_data;

    /**
     * @var null|string
     */
    private $id;

    /**
     * @var null|int
     */
    private $last_contacted_at;

    /**
     * @var null|int
     */
    private $last_request_at;

    /**
     * @var null|string
     */
    private $last_seen_ip;

    /**
     * @var null|int
     */
    private $last_session_start;

    /**
     * @var null|string
     */
    private $name;

    /**
     * @var null|int
     */
    private $remote_created_at;

    /**
     * @var null|array
     */
    private $segment_ids;

    /**
     * @var null|int
     */
    private $session_count;

    /**
     * @var null|int
     */
    private $session_count_ios;

    /**
     * @var null|array
     */
    private $social_accounts;

    /**
     * @var null|array
     */
    private $tag_ids;

    /**
     * @var null|bool
     */
    private $unsubscribed_from_emails;

    /**
     * @var null|int
     */
    private $updated_at;

    /**
     * @var null|array
     */
    private $user_agent_data;

    /**
     * @var null|mixed
     */
    private $user_id;

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
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = [];
        foreach ($companies as $company) {
            $this->companies[] = new Company($company);
        }
    }

    /**
     * @return mixed
     */
    public function getCompanies()
    {
        $companies = [];
        foreach ($this->companies as $company) {
            $companies[] = $company->getStore();
        }
        return $companies;
    }

    /**
     * @param mixed $company_ids
     */
    public function setCompanyIds($company_ids)
    {
        $this->company_ids = $company_ids;
    }

    /**
     * @return mixed
     */
    public function getCompanyIds()
    {
        return $this->company_ids;
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
     * Sets the custom data. If $custom_data is an array then this data will overwrite all existing custom data. If
     * $custom_data is a string then this piece of data (along with the value) will be added/updated in the custom
     * data array.
     *
     * @param array|string $custom_data
     * @param null|mixed $value
     */
    public function setCustomData($custom_data, $value = null)
    {
        // Array provided, nuke any existing attributes
        if (is_array($custom_data)) {
            $this->custom_data = new FlatStore($custom_data);
        } else {
            if (!$this->custom_data instanceof FlatStore) {
                $this->custom_data = new FlatStore([$custom_data => $value]);
            } else {
                $this->custom_data->offsetSet($custom_data, $value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCustomData()
    {
        return $this->custom_data->getStore();
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $id
     */
    public function setUserId($id)
    {
        $this->user_id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
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
     * @param mixed $segment_ids
     */
    public function setSegmentIds($segment_ids)
    {
        $this->segment_ids = $segment_ids;
    }

    /**
     * @return mixed
     */
    public function getSegmentIds()
    {
        return $this->segment_ids;
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
     * @param mixed $social_accounts
     */
    public function setSocialAccounts($social_accounts)
    {
        $this->social_accounts = $social_accounts;
    }

    /**
     * @return mixed
     */
    public function getSocialAccounts()
    {
        return $this->social_accounts;
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
     * @param mixed $unsubscribed_from_emails
     */
    public function setUnsubscribedFromEmails($unsubscribed_from_emails)
    {
        $this->unsubscribed_from_emails = $unsubscribed_from_emails;
    }

    /**
     * @return mixed
     */
    public function getUnsubscribedFromEmails()
    {
        return $this->unsubscribed_from_emails;
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
     * @param array|null $geoip_data
     */
    public function setGeoipData($geoip_data)
    {
        $this->geoip_data = $geoip_data;
    }

    /**
     * @return array|null
     */
    public function getGeoipData()
    {
        return $this->geoip_data;
    }

    /**
     * @param null|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $last_contacted_at
     */
    public function setLastContactedAt($last_contacted_at)
    {
        $this->last_contacted_at = $last_contacted_at;
    }

    /**
     * @return int|null
     */
    public function getLastContactedAt()
    {
        return $this->last_contacted_at;
    }

    /**
     * @param null|string $last_seen_ip
     */
    public function setLastSeenIp($last_seen_ip)
    {
        $this->last_seen_ip = $last_seen_ip;
    }

    /**
     * @return null|string
     */
    public function getLastSeenIp()
    {
        return $this->last_seen_ip;
    }

    /**
     * @param int|null $last_session_start
     */
    public function setLastSessionStart($last_session_start)
    {
        $this->last_session_start = $last_session_start;
    }

    /**
     * @return int|null
     */
    public function getLastSessionStart()
    {
        return $this->last_session_start;
    }

    /**
     * @param int|null $session_count_ios
     */
    public function setSessionCountIos($session_count_ios)
    {
        $this->session_count_ios = $session_count_ios;
    }

    /**
     * @return int|null
     */
    public function getSessionCountIos()
    {
        return $this->session_count_ios;
    }

    /**
     * @param array|null $user_agent_data
     */
    public function setUserAgentData($user_agent_data)
    {
        $this->user_agent_data = $user_agent_data;
    }

    /**
     * @return array|null
     */
    public function getUserAgentData()
    {
        return $this->user_agent_data;
    }


    /**
     * Sets the user information from data received from the API
     *
     * @param array $user_details The user details
     * @throws ArgumentException If the type of the response from the API is not a 'user'
     */
    private function setUserInfoFromAPI(array $user_details)
    {
        if (!isset($user_details['type']) || $user_details['type'] !== 'user') {
            // @todo: Decide if this is an exception or a silent failure
            throw new ArgumentException('API response not valid, type of response is incorrect');
        }

        foreach ($user_details as $attribute => $value) {
            if (property_exists($this, $attribute)) {
                $setter_method = sprintf('set%s', str_replace('_', '', $attribute));
                if (method_exists($this, $setter_method)) {
                    $this->$setter_method($value);
                }
            }
        }
    }

    /**
     * Takes the response from a successful API call and creates the
     * user based on that
     *
     * @param OperationCommand $command The command
     * @return ResponseClassInterface|User
     */
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $user = new self();

        if ($response->getBody()) {
            $user->setUserInfoFromAPI($response->json());
        }

        return $user;
    }
}