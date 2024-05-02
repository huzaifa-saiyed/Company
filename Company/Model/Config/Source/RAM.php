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
class RAM extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => '2 GB'],
            ['value' => 1, 'label' => '4 GB'],
            ['value' => 2, 'label' => '8 GB'],
            ['value' => 3, 'label' => '16 GB'],
            ['value' => 4, 'label' => '32 GB']
        ];
        
        }
    }
