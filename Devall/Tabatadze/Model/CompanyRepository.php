<?php

namespace Devall\Tabatadze\Model;

use Devall\Tabatadze\Api\CompanyRepositoryInterface;
use Devall\Tabatadze\Model\ResourceModel\Company;

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
        Company $company

    ) {
        $this->companyFactory = $companyFactory;
        $this->company = $company;
    }

    public function getById($id)
    {
       $company = $this->companyFactory->create();
       $this->company->load($company,$id);
       return $company;
    }
}
