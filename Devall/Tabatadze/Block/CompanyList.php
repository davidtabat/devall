<?php
namespace Devall\Tabatadze\Block;

use Devall\Tabatadze\Model\ResourceModel\Company\Collection;
use Magento\Framework\View\Element\Template;
use Devall\Tabatadze\Model\CompanyRepository;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Model\Customer;

class CompanyList extends Template
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * Display constructor.
     * @param Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        CustomerSession $customerSession,
        CompanyRepository $companyRepository,
        Customer $customer,
        Template\Context $context,
        Collection $collection,
        array $data = []
    ) {
        $this->collection = $collection;
        parent::__construct($context, $data);
        $this->customer = $customer;
        $this->customerSession = $customerSession;
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies(){
        return $this->collection;
    }

    /**
     * Return the save action Url.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->getUrl('devall/company/editpost');
    }

    public function getCustomerId()
    {
        return $this->customerSession->getId();
    }

    public function compareCompany(){
        $customerId = $this->getCustomerId();
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $companyId = $customerData->getCustomAttribute('customer_pan_number');
        if (!empty($companyId)) {
            return $companyId->getValue();
        }
        return false;
    }

    public function getCompany(){
        $customerId = $this->getCustomerId();
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $companyId = $customerData->getCustomAttribute('customer_pan_number')->getValue();
        $company = $this->companyRepository->getById($companyId);
        return $company;
    }
}
