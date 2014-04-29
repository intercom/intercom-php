<?php
namespace Intercom\Resource;

use \InvalidArgumentException as ArgumentException;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use Intercom\Util\FlatStore;

class User implements ResponseClassInterface
{
    /**
     * @var null|array
     */
    protected $avatar;

    /**
     * @var null|string
     */
    protected $app_id;

    /**
     * @var null|array
     */
    protected $companies;

    /**
     * @var null|array
     */
    protected $company_ids;

    /**
     * @var null|int
     */
    protected $created_at;

    /**
     * @var null|FlatStore
     */
    protected $custom_data;

    /**
     * @var null|string
     */
    protected $email;

    /**
     * @var null|string
     */
    protected $last_seen_ip;

    /**
     * @var null|int
     */
    protected $last_request_at;

    /**
     * @var null|string
     */
    protected $name;

    /**
     * @var null|int
     */
    protected $remote_created_at;

    /**
     * @var null|int
     */
    protected $session_count;

    /**
     * @var null|array
     */
    protected $social_accounts;

    /**
     * @var null|array
     */
    protected $segment_ids;

    /**
     * @var null|array
     */
    protected $tag_ids;

    /**
     * @var null|bool
     */
    protected $unsubscribed_from_emails;

    /**
     * @var null|int
     */
    protected $updated_at;

    /**
     * @var null|mixed
     */
    protected $user_id;

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
            $this->companies[] = new FlatStore($company);
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
     * Sets the user information from data received from the API
     *
     * @param array $user_details The user details
     * @throws ArgumentException If the type of the response from the API is not a 'user'
     */
    private function setUserInfoFromAPI(array $user_details) {
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
    public static function fromCommand(OperationCommand $command) {
        $response = $command->getResponse();
        $user = new self();

        if ($response->getBody()) {
            $user->setUserInfoFromAPI($response->json());
        }

        return $user;
    }
}