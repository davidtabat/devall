<?php

namespace Devall\Tabatadze\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CompanySearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Devall\Tabatadze\Api\Data\CompanyInterface[]
     */
    public function getItems();

    /**
     * @param \Devall\Tabat\Api\Data\CompanyInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
