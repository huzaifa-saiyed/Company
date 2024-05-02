<?php
namespace Kitchen\Company\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\AddressFactory;
use Magento\Framework\App\RequestInterface;

class SaveAddress implements ObserverInterface
{
    protected $customerRepository;
    protected $_addressFactory;
    protected $request;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        RequestInterface $request,
        AddressFactory $addressFactory,	
    ) {
        $this->customerRepository = $customerRepository;
        $this->_addressFactory = $addressFactory;
        $this->request = $request;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customerID = $customer->getId();
        $firstname = $this->request->getParam('firstname');
        $lastname = $this->request->getParam('lastname');
        $nameprefix = $this->request->getParam('nameprefix');
        $namesuffix = $this->request->getParam('namesuffix');
        $initial = $this->request->getParam('initial');
        $company = $this->request->getParam('company');
        $street = $this->request->getParam('street');
        $country = $this->request->getParam('country_id');
        if($this->request->getParam('region_id'))
        {
            $state = $this->request->getParam('region_id');    
        }
        else
        {
            $state = $this->request->getParam('region');
        }
        $city = $this->request->getParam('city');
        $pincode = $this->request->getParam('pincode');
        $phone = $this->request->getParam('phone');
        $vat = $this->request->getParam('vat');

        // echo $customerID;
        // echo $firstname;
        // echo $lastname;
        // echo $nameprefix;
        // echo $namesuffix;
        // echo $initial;
        // echo $company;
        // echo $street;
        // echo $country;
        // echo $state;
        // echo $city;
        // echo $pincode;
        // echo $phone;
        // echo $vat;die;

        $customerType = $this->request->getParam('customers_types');
 
        if($customerType == 1)
        {
            $this->saveToCustomTable($firstname, $lastname, $nameprefix, $namesuffix, $initial, $company, $street, $country, $state, $city, $pincode, $phone, $vat, $customerID);
        }
        
    }

    protected function saveToCustomTable($firstname, $lastname, $nameprefix, $namesuffix, $initial, $company, $street, $country, $state, $city, $pincode, $phone, $vat, $customerID)
    {
        $addressModel = $this->_addressFactory->create();
        $addressModel->setFirstname($firstname);
        $addressModel->setLastname($lastname);
        $addressModel->setParentId($customerID);
        $addressModel->setPrefix($nameprefix);
        $addressModel->setSuffix($namesuffix);
        $addressModel->setMiddlename($initial);
        $addressModel->setPostcode($company);
        $addressModel->setStreet($street);
        $addressModel->setCountryId($country);
        $addressModel->setRegion($state);
        $addressModel->setCity($city);
        $addressModel->setPostcode($pincode);
        $addressModel->setTelephone($phone);
        $addressModel->setVatId($vat);
        $addressModel->setCustomerId($customerID);
        $addressModel->save();
    }
}
?>
