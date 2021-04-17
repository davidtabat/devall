<?php
namespace Devall\Tabatadze\Console\Command;

use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CompanyTest
 */
class CompanyTest extends Command
{
    const NAME = 'name';

    /**
     * @inheritDoc
     */
    protected $objectManager;
    public function __construct(
        ObjectManagerInterface $objectManager,
        $name=null
    )
    {
        $this->objectManager = $objectManager;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('company:test');
        $this->setDescription('Testing Company Module.');
        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Testing Companies.</info>');
        $repo = $this->objectManager->get('Devall\Tabatadze\Model\CompanyRepository');
        $object = $repo->companyFactory->create();
        $object->load(1);
        $output->writeln('<info>Testing Companies again.</info>');
    }
}
