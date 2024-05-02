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
class Weight extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => 'Up to 0.9 kg'],
            ['value' => 1, 'label' => '1.0 to 1.4 kg'],
            ['value' => 2, 'label' => '1.5 to 1.9 kg'],
            ['value' => 3, 'label' => '2.0 to 2.4 kg'],
            ['value' => 4, 'label' => '2.5 kg & above']
        ];
        
        }
    }
