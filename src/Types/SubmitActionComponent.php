<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;

/**
 * A submit action triggers a [Submit Request](https://developers.intercom.com/docs/canvas-kit#submit-request) to be sent. This request will include all values which have been entered into all the interactive components on the current canvas.
 */
class SubmitActionComponent extends JsonSerializableType
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
