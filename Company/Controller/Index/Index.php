<?php
namespace Kitchen\Company\Controller\Index;

use Magento\Customer\Model\Session;
 
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        Session $_session,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_session = $_session;
        return parent::__construct($context);
    }
 
    public function execute()
    {
        echo "Hello World";

        $customer = $this->_session->getCustomer()->getEntityId();
        echo $customer;
        
        return $this->_pageFactory->create();
        
        
		
	
    }
}