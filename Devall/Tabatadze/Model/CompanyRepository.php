<?php

namespace Devall\Tabatadze\Model;

use Devall\Tabatadze\Api\CompanyRepositoryInterface;
use Devall\Tabatadze\Model\ResourceModel\Company;
use Devall\Tabatadze\Model\ResourceModel\Company\Collection;
use Devall\Tabatadze\Model\ResourceModel\Company\CollectionFactory;

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
        CollectionFactory $companyCollectionFactory,
        CompanyFactory $companyFactory,
        Company $company

    ) {
        $this->companyFactory = $companyFactory;
        $this->companyCollectionFactory = $companyCollectionFactory;
        $this->company = $company;
    }

    public function getById($id)
    {
       $company = $this->companyFactory->create();
       $this->company->load($company,$id);
       return $company;
    }

    public function getList()
    {
        $collection = $this->companyCollectionFactory->create();
        $collection->getCollection();
        return $collection;
    }

    public function getName($name){}
    public function getCountry($country){}
    public function getStreet($street){}
    public function getNumber($number){}

}
