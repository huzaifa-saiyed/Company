<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Kitchen\Company\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class Brand extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => 'ASUS'],
            ['value' => 1, 'label' => 'Dell'],
            ['value' => 2, 'label' => 'Apple'],
            ['value' => 3, 'label' => 'Lenovo'],
            ['value' => 4, 'label' => 'Acer']
        ];
        
        }
    }
