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
class CPU extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => 'AMD'],
            ['value' => 1, 'label' => 'Apple'],
            ['value' => 2, 'label' => 'Intel'],
            ['value' => 3, 'label' => 'VIA'],
            ['value' => 4, 'label' => 'MediaTek']
        ];
        
        }
    }
