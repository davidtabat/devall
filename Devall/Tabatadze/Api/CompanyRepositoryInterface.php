<?php

namespace Devall\Tabatadze\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Devall\Tabatadze\Api\Data\CompanyInterface;

interface CompanyRepositoryInterface
{
    /**
     * @param int $id
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Devall\Tabatadze\Api\Data\CompanySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
