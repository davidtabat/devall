<?php

namespace Devall\Tabatadze\Api;

interface CompanyRepositoryInterface
{
    /**
     * @param int $id
     * @return \Devall\Tabatadze\Api\Data\CompanyRepository
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);
}
