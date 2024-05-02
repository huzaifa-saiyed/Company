<?php
// namespace Kitchen\Company\Observer;

use Magento\Framework\Event\ObserverInterface;

class PriceType implements ObserverInterface
{
    protected $productRepository;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');

        $product = $item->getProduct();
        
        
        if($customPrice = $product->getData('custom_price_field')) {
            $priceType = $product->getCustomPriceTypes();
            $defaultPrice = $product->getFinalPrice();
            
            if ($priceType == 0) {
                $newPrice = $defaultPrice + $customPrice;
            } elseif ($priceType == 1) {
                $price = $defaultPrice * $customPrice / 100;
                $newPrice = $defaultPrice - $price;
            } else {
                $newPrice = $defaultPrice;
            }

            // Set custom price
            $item->setCustomPrice($newPrice);
            $item->setOriginalCustomPrice($newPrice);
            $item->getProduct()->setIsSuperMode(true);
        }
        
        

    }
}


