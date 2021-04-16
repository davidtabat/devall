<?php

namespace Devall\Tabatadze\Api\Data;

interface CompanyInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();
}
