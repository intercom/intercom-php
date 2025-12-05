<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A CSV output file
 */
class DataExportCsv extends JsonSerializableType
{
    /**
     * @var ?string $userId The user_id of the user who was sent the message.
     */
    #[JsonProperty('user_id')]
    private ?string $userId;

    /**
     * @var ?string $userExternalId The external_user_id of the user who was sent the message
     */
    #[JsonProperty('user_external_id')]
    private ?string $userExternalId;

    /**
     * @var ?string $companyId The company ID of the user in relation to the message that was sent. Will return -1 if no company is present.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @var ?string $email The users email who was sent the message.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $name The full name of the user receiving the message
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $rulesetId The id of the message.
     */
    #[JsonProperty('ruleset_id')]
    private ?string $rulesetId;

    /**
     * @var ?string $contentId The specific content that was received. In an A/B test each version has its own Content ID.
     */
    #[JsonProperty('content_id')]
    private ?string $contentId;

    /**
     * @var ?string $contentType Email, Chat, Post etc.
     */
    #[JsonProperty('content_type')]
    private ?string $contentType;

    /**
     * @var ?string $contentTitle The title of the content you see in your Intercom workspace.
     */
    #[JsonProperty('content_title')]
    private ?string $contentTitle;

    /**
     * @var ?string $rulesetVersionId As you edit content we record new versions. This ID can help you determine which version of a piece of content that was received.
     */
    #[JsonProperty('ruleset_version_id')]
    private ?string $rulesetVersionId;

    /**
     * @var ?string $receiptId ID for this receipt. Will be included with any related stats in other files to identify this specific delivery of a message.
     */
    #[JsonProperty('receipt_id')]
    private ?string $receiptId;

    /**
     * @var ?int $receivedAt Timestamp for when the receipt was recorded.
     */
    #[JsonProperty('received_at')]
    private ?int $receivedAt;

    /**
     * @var ?string $seriesId The id of the series that this content is part of. Will return -1 if not part of a series.
     */
    #[JsonProperty('series_id')]
    private ?string $seriesId;

    /**
     * @var ?string $seriesTitle The title of the series that this content is part of.
     */
    #[JsonProperty('series_title')]
    private ?string $seriesTitle;

    /**
     * @var ?string $nodeId The id of the series node that this ruleset is associated with. Each block in a series has a corresponding node_id.
     */
    #[JsonProperty('node_id')]
    private ?string $nodeId;

    /**
     * @var ?int $firstReply The first time a user replied to this message if the content was able to receive replies.
     */
    #[JsonProperty('first_reply')]
    private ?int $firstReply;

    /**
     * @var ?int $firstCompletion The first time a user completed this message if the content was able to be completed e.g. Tours, Surveys.
     */
    #[JsonProperty('first_completion')]
    private ?int $firstCompletion;

    /**
     * @var ?int $firstSeriesCompletion The first time the series this message was a part of was completed by the user.
     */
    #[JsonProperty('first_series_completion')]
    private ?int $firstSeriesCompletion;

    /**
     * @var ?int $firstSeriesDisengagement The first time the series this message was a part of was disengaged by the user.
     */
    #[JsonProperty('first_series_disengagement')]
    private ?int $firstSeriesDisengagement;

    /**
     * @var ?int $firstSeriesExit The first time the series this message was a part of was exited by the user.
     */
    #[JsonProperty('first_series_exit')]
    private ?int $firstSeriesExit;

    /**
     * @var ?int $firstGoalSuccess The first time the user met this messages associated goal if one exists.
     */
    #[JsonProperty('first_goal_success')]
    private ?int $firstGoalSuccess;

    /**
     * @var ?int $firstOpen The first time the user opened this message.
     */
    #[JsonProperty('first_open')]
    private ?int $firstOpen;

    /**
     * @var ?int $firstClick The first time the series the user clicked on a link within this message.
     */
    #[JsonProperty('first_click')]
    private ?int $firstClick;

    /**
     * @var ?int $firstDismisall The first time the series the user dismissed this message.
     */
    #[JsonProperty('first_dismisall')]
    private ?int $firstDismisall;

    /**
     * @var ?int $firstUnsubscribe The first time the user unsubscribed from this message.
     */
    #[JsonProperty('first_unsubscribe')]
    private ?int $firstUnsubscribe;

    /**
     * @var ?int $firstHardBounce The first time this message hard bounced for this user
     */
    #[JsonProperty('first_hard_bounce')]
    private ?int $firstHardBounce;

    /**
     * @param array{
     *   userId?: ?string,
     *   userExternalId?: ?string,
     *   companyId?: ?string,
     *   email?: ?string,
     *   name?: ?string,
     *   rulesetId?: ?string,
     *   contentId?: ?string,
     *   contentType?: ?string,
     *   contentTitle?: ?string,
     *   rulesetVersionId?: ?string,
     *   receiptId?: ?string,
     *   receivedAt?: ?int,
     *   seriesId?: ?string,
     *   seriesTitle?: ?string,
     *   nodeId?: ?string,
     *   firstReply?: ?int,
     *   firstCompletion?: ?int,
     *   firstSeriesCompletion?: ?int,
     *   firstSeriesDisengagement?: ?int,
     *   firstSeriesExit?: ?int,
     *   firstGoalSuccess?: ?int,
     *   firstOpen?: ?int,
     *   firstClick?: ?int,
     *   firstDismisall?: ?int,
     *   firstUnsubscribe?: ?int,
     *   firstHardBounce?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->userId = $values['userId'] ?? null;
        $this->userExternalId = $values['userExternalId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->rulesetId = $values['rulesetId'] ?? null;
        $this->contentId = $values['contentId'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->contentTitle = $values['contentTitle'] ?? null;
        $this->rulesetVersionId = $values['rulesetVersionId'] ?? null;
        $this->receiptId = $values['receiptId'] ?? null;
        $this->receivedAt = $values['receivedAt'] ?? null;
        $this->seriesId = $values['seriesId'] ?? null;
        $this->seriesTitle = $values['seriesTitle'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->firstReply = $values['firstReply'] ?? null;
        $this->firstCompletion = $values['firstCompletion'] ?? null;
        $this->firstSeriesCompletion = $values['firstSeriesCompletion'] ?? null;
        $this->firstSeriesDisengagement = $values['firstSeriesDisengagement'] ?? null;
        $this->firstSeriesExit = $values['firstSeriesExit'] ?? null;
        $this->firstGoalSuccess = $values['firstGoalSuccess'] ?? null;
        $this->firstOpen = $values['firstOpen'] ?? null;
        $this->firstClick = $values['firstClick'] ?? null;
        $this->firstDismisall = $values['firstDismisall'] ?? null;
        $this->firstUnsubscribe = $values['firstUnsubscribe'] ?? null;
        $this->firstHardBounce = $values['firstHardBounce'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param ?string $value
     */
    public function setUserId(?string $value = null): self
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUserExternalId(): ?string
    {
        return $this->userExternalId;
    }

    /**
     * @param ?string $value
     */
    public function setUserExternalId(?string $value = null): self
    {
        $this->userExternalId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRulesetId(): ?string
    {
        return $this->rulesetId;
    }

    /**
     * @param ?string $value
     */
    public function setRulesetId(?string $value = null): self
    {
        $this->rulesetId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContentId(): ?string
    {
        return $this->contentId;
    }

    /**
     * @param ?string $value
     */
    public function setContentId(?string $value = null): self
    {
        $this->contentId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param ?string $value
     */
    public function setContentType(?string $value = null): self
    {
        $this->contentType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContentTitle(): ?string
    {
        return $this->contentTitle;
    }

    /**
     * @param ?string $value
     */
    public function setContentTitle(?string $value = null): self
    {
        $this->contentTitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRulesetVersionId(): ?string
    {
        return $this->rulesetVersionId;
    }

    /**
     * @param ?string $value
     */
    public function setRulesetVersionId(?string $value = null): self
    {
        $this->rulesetVersionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReceiptId(): ?string
    {
        return $this->receiptId;
    }

    /**
     * @param ?string $value
     */
    public function setReceiptId(?string $value = null): self
    {
        $this->receiptId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getReceivedAt(): ?int
    {
        return $this->receivedAt;
    }

    /**
     * @param ?int $value
     */
    public function setReceivedAt(?int $value = null): self
    {
        $this->receivedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSeriesId(): ?string
    {
        return $this->seriesId;
    }

    /**
     * @param ?string $value
     */
    public function setSeriesId(?string $value = null): self
    {
        $this->seriesId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSeriesTitle(): ?string
    {
        return $this->seriesTitle;
    }

    /**
     * @param ?string $value
     */
    public function setSeriesTitle(?string $value = null): self
    {
        $this->seriesTitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNodeId(): ?string
    {
        return $this->nodeId;
    }

    /**
     * @param ?string $value
     */
    public function setNodeId(?string $value = null): self
    {
        $this->nodeId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstReply(): ?int
    {
        return $this->firstReply;
    }

    /**
     * @param ?int $value
     */
    public function setFirstReply(?int $value = null): self
    {
        $this->firstReply = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstCompletion(): ?int
    {
        return $this->firstCompletion;
    }

    /**
     * @param ?int $value
     */
    public function setFirstCompletion(?int $value = null): self
    {
        $this->firstCompletion = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstSeriesCompletion(): ?int
    {
        return $this->firstSeriesCompletion;
    }

    /**
     * @param ?int $value
     */
    public function setFirstSeriesCompletion(?int $value = null): self
    {
        $this->firstSeriesCompletion = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstSeriesDisengagement(): ?int
    {
        return $this->firstSeriesDisengagement;
    }

    /**
     * @param ?int $value
     */
    public function setFirstSeriesDisengagement(?int $value = null): self
    {
        $this->firstSeriesDisengagement = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstSeriesExit(): ?int
    {
        return $this->firstSeriesExit;
    }

    /**
     * @param ?int $value
     */
    public function setFirstSeriesExit(?int $value = null): self
    {
        $this->firstSeriesExit = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstGoalSuccess(): ?int
    {
        return $this->firstGoalSuccess;
    }

    /**
     * @param ?int $value
     */
    public function setFirstGoalSuccess(?int $value = null): self
    {
        $this->firstGoalSuccess = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstOpen(): ?int
    {
        return $this->firstOpen;
    }

    /**
     * @param ?int $value
     */
    public function setFirstOpen(?int $value = null): self
    {
        $this->firstOpen = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstClick(): ?int
    {
        return $this->firstClick;
    }

    /**
     * @param ?int $value
     */
    public function setFirstClick(?int $value = null): self
    {
        $this->firstClick = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstDismisall(): ?int
    {
        return $this->firstDismisall;
    }

    /**
     * @param ?int $value
     */
    public function setFirstDismisall(?int $value = null): self
    {
        $this->firstDismisall = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstUnsubscribe(): ?int
    {
        return $this->firstUnsubscribe;
    }

    /**
     * @param ?int $value
     */
    public function setFirstUnsubscribe(?int $value = null): self
    {
        $this->firstUnsubscribe = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstHardBounce(): ?int
    {
        return $this->firstHardBounce;
    }

    /**
     * @param ?int $value
     */
    public function setFirstHardBounce(?int $value = null): self
    {
        $this->firstHardBounce = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
