<?php

declare(strict_types=1);

namespace Domain\Model;

use Doctrine\Common\Collections\Collection;

interface Storage
{
    public function getName();

    public function getFiles(): Collection;
}
