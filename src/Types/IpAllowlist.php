<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * IP allowlist settings for the workspace.
 */
class IpAllowlist extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `ip_allowlist`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?bool $enabled Whether the IP allowlist is enabled for the workspace.
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * List of allowed IP addresses and/or IP ranges in CIDR notation.
     * Examples:
     * - Single IP: `192.168.0.1`
     * - IP range: `192.168.0.1/24` (allows 192.168.0.0 - 192.168.0.255)
     *
     * @var ?array<string> $ipAllowlist
     */
    #[JsonProperty('ip_allowlist'), ArrayType(['string'])]
    private ?array $ipAllowlist;

    /**
     * @param array{
     *   type?: ?string,
     *   enabled?: ?bool,
     *   ipAllowlist?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->ipAllowlist = $values['ipAllowlist'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getIpAllowlist(): ?array
    {
        return $this->ipAllowlist;
    }

    /**
     * @param ?array<string> $value
     */
    public function setIpAllowlist(?array $value = null): self
    {
        $this->ipAllowlist = $value;
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
