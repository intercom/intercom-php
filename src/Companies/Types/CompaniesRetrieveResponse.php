<?php

namespace Intercom\Companies\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\CompanyList;
use Exception;
use Intercom\Core\Json\JsonDecoder;

class CompaniesRetrieveResponse extends JsonSerializableType
{
    /**
     * @var (
     *    'company'
     *   |'list'
     *   |'_unknown'
     * ) $type
     */
    private readonly string $type;

    /**
     * @var (
     *    Company
     *   |CompanyList
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'company'
     *   |'list'
     *   |'_unknown'
     * ),
     *   value: (
     *    Company
     *   |CompanyList
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return (
     *    'company'
     *   |'list'
     *   |'_unknown'
     * )
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return (
     *    Company
     *   |CompanyList
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param Company $company
     * @return CompaniesRetrieveResponse
     */
    public static function company(Company $company): CompaniesRetrieveResponse
    {
        return new CompaniesRetrieveResponse([
            'type' => 'company',
            'value' => $company,
        ]);
    }

    /**
     * @param CompanyList $list
     * @return CompaniesRetrieveResponse
     */
    public static function list(CompanyList $list): CompaniesRetrieveResponse
    {
        return new CompaniesRetrieveResponse([
            'type' => 'list',
            'value' => $list,
        ]);
    }

    /**
     * @return bool
     */
    public function isCompany(): bool
    {
        return $this->value instanceof Company && $this->type === 'company';
    }

    /**
     * @return Company
     */
    public function asCompany(): Company
    {
        if (!($this->value instanceof Company && $this->type === 'company')) {
            throw new Exception(
                "Expected company; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isList_(): bool
    {
        return $this->value instanceof CompanyList && $this->type === 'list';
    }

    /**
     * @return CompanyList
     */
    public function asList_(): CompanyList
    {
        if (!($this->value instanceof CompanyList && $this->type === 'list')) {
            throw new Exception(
                "Expected list; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'company':
                $value = $this->asCompany()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'list':
                $value = $this->asList_()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'company':
                $args['value'] = Company::jsonDeserialize($data);
                break;
            case 'list':
                $args['value'] = CompanyList::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
