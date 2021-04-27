<?php

namespace Devall\Tabatadze\Model;

use Devall\Tabatadze\Api\CompanyRepositoryInterface;
use Devall\Tabatadze\Model\ResourceModel\Company;
use Devall\Tabatadze\Model\ResourceModel\Company\Collection;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * @var CompanyFactory
     */
    public $companyFactory;

    /**
     * @var Company
     */
    public $company;

    public function __construct(
        CompanyFactory $companyFactory,
        Company $company,
        Collection $collection
    )
    {
        $this->collection = $collection;
        $this->companyFactory = $companyFactory;
        $this->company = $company;
    }

    public function getById($id)
    {
        $company = $this->companyFactory->create();
        $this->company->load($company, $id);
        return $company;
    }

    public function getList()
    {
        return $this->collection->getData();
    }

    public function getByIdApi($id)
    {
        return $this->getById($id)->getData();
    }
}
