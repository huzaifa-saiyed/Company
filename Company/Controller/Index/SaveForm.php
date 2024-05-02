<?php

namespace Kitchen\Company\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\CustomerFactory; 
use Magento\Customer\Model\Session; 

class SaveForm extends Action
{
    protected $_customerFactory;
    protected $session;
    protected $messageManager;

    public function __construct(
        Context $context,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        CustomerFactory $_customerFactory,
        Session $session
    ) {
        $this->messageManager = $messageManager;
        $this->_customerFactory = $_customerFactory;
        $this->session = $session;
        parent::__construct($context);
    }

    public function execute()
    {
        $varData = $this->getRequest()->getPostValue();
        $varCustomer = $this->_customerFactory->create();
        $varCustomerId = $this->session->getCustomerId();

        echo $varCustomerId;
        if ($varData) {
            $varCustomer->setFirstname($varData['firstName']);
            $varCustomer->setLastname($varData['lastName']);
            $varCustomer->setEmail($varData["emails"]);
            $varCustomer->setPasswordHash($varData["pwds"]);
            $varCustomer->setParentId($varData["parent_id"]);
            $varCustomer->save();
            $this->messageManager->addSuccess(__("New Member Added in Staff Successfully."));
            $this->_redirect('company/index/index');
        }
    }
}
