<?php

namespace Devall\Tabatadze\Api;

interface CompanyRepositoryInterface
{
    /**
     * @param int $id
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param string $name
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getName($name);

    /**
     * @param string $country
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCountry($name);

    /**
     * @param string $street
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStreet($street);

    /**
     * @param string $number
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getNumber($number);

    /**
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getList();
}
