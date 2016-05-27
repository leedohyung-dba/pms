<?php
namespace App\View\Helper;
use Cake\View\Helper\TimeHelper as CoreTimeHelper;
use App\I18n\Time;
class TimeHelper extends CoreTimeHelper
{
    /**
     * isHoliday.
     */
    public function isHoliday($dateString, $timezone = null)
    {
        return (new Time($dateString, $timezone))->isHoliday();
    }
    /**
     * WeekJp.
     */
    public function weekJp($dateString, $timezone = null)
    {
        return (new Time($dateString, $timezone))->weekJp();
    }
}