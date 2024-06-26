<?php
 
namespace Kitchen\Company\Block;
 
class ShowPrice extends \Magento\Framework\View\Element\Template
{
    protected $customersesstion;
 
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\SessionFactory $customersesstion,
        array $data = []
    ) {
        $this->customersesstion = $customersesstion;
        parent::__construct($context, $data);
    }
 
    public function checkallowprice()
    {
        $customersessionData = $this->customersesstion->create();
        $customerdata=$customersessionData->getCustomer();
        $allowprice=$customerdata->getAllowPrice();
        return $allowprice;
    }
    
    public function checkallowproduct()
    {
        $customersessionData = $this->customersesstion->create();
        $customerdata=$customersessionData->getCustomer();
        $allowproduct=$customerdata->getAllowPageListing();
        return $allowproduct;
    }
}