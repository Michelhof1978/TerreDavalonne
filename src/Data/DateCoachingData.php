<?php

namespace App\Data;

use DateTime;

class DateCoachingData
{
    /**
     * @var DateTime
     */
    public $date = '';


    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }
}
