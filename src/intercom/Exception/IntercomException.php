<?php
namespace Intercom\Exception;

use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

class IntercomException extends BadResponseException
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * Simple exception factory for creating Intercom standardised exceptions
     *
     * @param RequestInterface $request The Request
     * @param Response $response The response
     * @return BadResponseException
     */
    public static function factory(RequestInterface $request, Response $response) {
        if (!static::isValidIntercomError($response->json())) {
            $label = 'Unsuccessful response';
            $class = __CLASS__;
        } elseif ($response->isClientError()) {
            $label = 'Client error response';
            $class = __NAMESPACE__ . '\\ClientErrorResponseException';
        } elseif ($response->isServerError()) {
            $label = 'Server error response';
            $class = __NAMESPACE__ . '\\ServerErrorResponseException';
        } else {
            $label = 'Unsuccessful response';
            $class = __CLASS__;
        }

        $message = $label . PHP_EOL . implode(PHP_EOL, array(
            '[status code] ' . $response->getStatusCode(),
            '[reason phrase] ' . $response->getReasonPhrase(),
            '[url] ' . $request->getUrl(),
        ));

        $e = new $class($message);
        $e->setResponse($response);
        $e->setRequest($request);

        // Sets the errors if the error response is the standard Intercom error type
        if (!static::isValidIntercomError($response->json())) {
            $e->errors = $response->json()['errors'];
        }

        return $e;
    }

    /**
     * Verifies that a response body is a standard Intercom
     * @param $response_body
     * @return bool
     */
    private function isValidIntercomError($response_body) {
        if (array_key_exists('type', $response_body) &&
            $response_body['type'] == 'error.list' &&
            array_key_exists('errors', $response_body)) {
                return true;
        }
        return false;
    }

    /**
     * Gets errors
     *
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }
}
