<?php

namespace Devall\Tabatadze\Controller\Company;

use Exception;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Customer;
use Magento\Framework\App\Action\Action;

class EditPost extends Action
{
    /**
     * @var Session
     */
    protected $session;
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        Customer $customer,
        Session $customerSession,
        PageFactory $resultPageFactory
    ) {
        $this->customer = $customer;
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getParam('company');
            if ($data) {
                $customerId = $this->session->getCustomerId();
                $customer = $this->customer->load($customerId);
                $customerData = $customer->getDataModel();
                $customerData->setCustomAttribute('customer_pan_number',$data);
                $customer->updateData($customerData);
                $customer->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl('http://localhost/customer/account');
        return $resultRedirect;

    }
}
