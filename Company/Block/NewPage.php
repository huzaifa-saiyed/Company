<?php

namespace Kitchen\Company\Block;

use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\UrlInterface;


class NewPage extends \Magento\Framework\View\Element\Template
{

    protected $_customerFactory;
    protected $session;
    protected $_urlBuilder;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CustomerFactory $_customerFactory,
        Session $session,
        UrlInterface $_urlBuilder
    ) {
        $this->_customerFactory = $_customerFactory;
        $this->session = $session;
        $this->_urlBuilder = $_urlBuilder;
        parent::__construct($context);
    }

    public function newPage(){
        // echo "hello";   
     }
}
