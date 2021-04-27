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

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getStreet();

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @return int
     */
    public function getCompanySize();
}
