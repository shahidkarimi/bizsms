<?php
namespace Shahidkarimi\Bizsms\Traits;

use Exception;
use Shahidkarimi\Bizsms\Facade\Bizsms;

trait SmsNotifiable
{
    public function notifyBySMS($smsBody)
    {
        if (!isset($this->phone)) {
            throw new Exception("Since the object has no attribute 'phone' message can not be sesnt.");
        }
        return Bizsms::send($this->phone, $smsBody);
    }
}
