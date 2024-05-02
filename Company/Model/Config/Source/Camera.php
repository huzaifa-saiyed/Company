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
class Camera extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Options getter
     *
     * @return array
     */

    

    public function getAllOptions()
    {
        return [
            ['value' => 0, 'label' => 'Front'],
            ['value' => 1, 'label' => 'Rear']
        ];
        
        }
    }
