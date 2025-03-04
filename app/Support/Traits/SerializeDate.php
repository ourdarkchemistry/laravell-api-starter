<?php


namespace App\Support\Traits;


use Carbon\Carbon;
use DateTimeInterface;

trait SerializeDate
{
    /**
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: Carbon::DEFAULT_TO_STRING_FORMAT);
    }
}
