<?php 
namespace Kitchen\Company\Model;

use Kitchen\Company\Api\CustomInterface;
use Kitchen\News\Model\GalleryFactory;

class Custom implements CustomInterface
{
    private $moduleFactory;
    private $quote;

    public function __construct(GalleryFactory $moduleFactory, \Magento\Quote\Model\Quote $quote)
    {
        $this->quote = $quote;
        $this->moduleFactory = $moduleFactory;
    }

    public function postCustomer($name, $desc, $is_active, $a_id)
    {
        try {
            $insertData = $this->moduleFactory->create();
            $insertData->setNewsTitle($name)
            ->setNewsDesc($desc)
            ->setIsActive($is_active)
            ->setAId($a_id)
            ->save();
            $response = ['success' => true, 'message' => 'User Created Successfully'];
            return $response;
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }

    /** * @return string */
    public function getCustomer()
    {
        try {
            $data = $this->moduleFactory->create()->getCollection()->getData();
            return ['success' => true, 'message' => $data];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** * @return string */
    public function putCustomer($id, $name, $desc, $is_active, $a_id)
    {
        try {
            $insertData = $this->moduleFactory->create()->load($id);
            $insertData->setNewsTitle($name)
            ->setNewsDesc($desc)
            ->setIsActive($is_active)
            ->setAId($a_id)
            ->save();
            $response = ['success' => true, 'message' => 'User Updated Successfully'];
            return $response;
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }

    /** * @return string */
    public function delCustomer($id)
    {
        try {
            $insertData = $this->moduleFactory->create()->load($id);
            $insertData
            ->delete();
            $response = ['success' => true, 'message' => 'User Deleted Successfully'];
            return $response;
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }
 

    
    


}