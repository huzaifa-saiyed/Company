<?php

namespace Kitchen\Company\Block;

use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\UrlInterface;


class Index extends \Magento\Framework\View\Element\Template
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

    public function showStaffData()
    {
        $customerIds = $this->getIds();
        $varCustomer = $this->_customerFactory->create();
        $varCollection = $varCustomer->getCollection()->addFieldToFilter('parent_id', $customerIds);

        foreach ($varCollection as $row) {
            echo "<tr>";
            echo "<td>" . $row->getEntityId() . "</td>";
            echo "<td>" . $row->getParentId() . "</td>";
            echo "<td>" . $row->getFirstname() . "</td>";
            echo "<td>" . $row->getLastname() . "</td>";
            echo "<td>" . $row->getEmail() . "</td>";
            echo "<td>" . $row->getCreatedAt() . "</td>";
            echo "<td>" . $row->getUpdatedAt() . "</td>";
            echo "<td><a href='" . $this->_urlBuilder->getUrl('company/index/form', ['entity_id' => $row->getEntityId()]) . "'><button>Edit</button></a></td>";
            echo "<td><a href=''><button>Delete</button></a></td>";
            echo "</tr>";
        }

    }

    public function getIds() {
        $customer = $this->session->getCustomer()->getEntityId();
        return $customer;
        
    }
}
