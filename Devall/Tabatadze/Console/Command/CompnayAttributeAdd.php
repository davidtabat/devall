<?php
namespace Devall\Tabatadze\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Model\ResourceModel\CustomerFactory;

class CompnayAttributeAdd extends Command
{
    public function __construct(
        Customer $customer,
        CustomerFactory $customerFactory,
        string $name = null
    ) {
        $this->customer = $customer;
        $this->customerFactory = $customerFactory;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('company:add');
        $this->setDescription('Adding value to attribute.');
        parent::configure();
    }



    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Testing Companies.</info>');
        $customerId = "3";
        $customer = $this->customer->load($customerId);
        $customerData = $customer->getDataModel();
        $companyId = $customerData->getCustomAttribute('customer_pan_number')->getValue();
        $customer->updateData($customerData);
        $customer->save();
        $output->writeln('<info>Testing Companies again.</info>');
    }
}
