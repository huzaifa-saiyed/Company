<?php

namespace Kitchen\Company\Model;

use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;
use Magento\Customer\Model\CustomerFactory;

class Ping extends Command
{
    protected $_customerFactory;

    public function __construct(
        CustomerFactory $_customerFactory
    ) {
        $this->_customerFactory = $_customerFactory;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('kitchen:cleans')
        ->setDescription('Kitchen Cleans Commands!');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $varCustomer = $this->_customerFactory->create();
        $varCollection = $varCustomer->getCollection();
        
        foreach ($varCollection as $row) {
            $output->writeln('Customer ID is: ' . $row->getId());
        }

        return 1;
    }
}