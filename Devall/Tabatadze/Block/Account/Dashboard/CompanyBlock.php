<?php
namespace Devall\Tabatadze\Block\Account\Dashboard;

use \Magento\Framework\View\Element\Template;
use Devall\Tabatadze\Model\CompanyRepository;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Model\Customer;

class CompanyBlock extends Template
{
    public function __construct(
        CustomerSession $customerSession,
        CompanyRepository $companyRepository,
        Customer $customer,
        Template\Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->customer = $customer;
        $this->customerSession = $customerSession;
        $this->companyRepository = $companyRepository;
    }

    public function hasCompany(){
        $customerId = $this->getCustomerId();
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $companyId = $customerData->getCustomAttribute('customer_pan_number');
        return !empty($companyId);
    }

    public function getCustomerId()
    {
        return $this->customerSession->getId();
    }

    public function getCompany(){
        $customerId = $this->getCustomerId();
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $companyId = $customerData->getCustomAttribute('customer_pan_number')->getValue();
        $company = $this->companyRepository->getById($companyId);
        return $company;
    }

    public function getName(){
        return $this->getCompany()->getName();
    }

    public function getCountry(){
        return $this->getCompany()->getCountry();
    }

    public function getStreet(){
        return $this->getCompany()->getStreet();
    }

    public function getNumber(){
        return $this->getCompany()->getNumber();
    }
    public function getCompanyEditUrl()
    {
        return $this->getUrl('devall/company/edit/');
    }
}
