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
class HDD extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => 'Up to 159 GB'],
            ['value' => 1, 'label' => '160 - 249 GB'],
            ['value' => 2, 'label' => '250 - 499 GB'],
            ['value' => 3, 'label' => '500 - 999 GB'],
            ['value' => 4, 'label' => '1 TB & above']
        ];
        
        }
    }
