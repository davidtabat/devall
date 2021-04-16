<?php

namespace Devall\Tabatadze\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Devall\Tabatadze\Api\Data\CompanyInterface;
use Devall\Tabatadze\Api\Data\CompanySearchResultInterface;
use Devall\Tabatadze\Api\Data\CompanySearchResultInterfaceFactory;
use Devall\Tabatadze\Api\CompanyRepositoryInterface;
use Devall\Tabatadze\Model\ResourceModel\Company\CollectionFactory as CompanyCollectionFactory;
use Devall\Tabatadze\Model\ResourceModel\Company\Collection;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * @var CompanyFactory
     */
    private $companyFactory;

    /**
     * @var CompanyCollectionFactory
     */
    private $companyCollectionFactory;

    /**
     * @var CompanySearchResultInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        CompanyFactory $companyFactory,
        CompanyCollectionFactory $companyCollectionFactory,
        CompanySearchResultInterfaceFactory $companySearchResultInterfaceFactory
    ) {
        $this->companyFactory = $companyFactory;
        $this->companyCollectionFactory = $companyCollectionFactory;
        $this->searchResultFactory = $companySearchResultInterfaceFactory;
    }

    // ... getById, save and delete methods listed above ...

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    public function getById($id){
        return $this;
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
