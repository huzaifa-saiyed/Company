<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Kitchen\Company\Api;

/**
 * CMS page CRUD interface.
 * @api
 * @since 100.0.2
 */
interface PageInterface
{
    public function getByIds();
}
