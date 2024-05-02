<?php


namespace Kitchen\Company\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class CreateCustomAttr for Create Custom Product Attribute using Data Patch.
 */
class CustomCatalogAttr implements DataPatchInterface
{

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $attributes = [
            [
                'code' => 'custom_brand',
                'label' => 'Brand',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\Brand',
            ],
            [
                'code' => 'custom_hdd',
                'label' => 'HDD',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\HDD',
            ],
            [
                'code' => 'custom_ram',
                'label' => 'RAM',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\RAM',
            ],
            [
                'code' => 'custom_camera',
                'label' => 'Camera',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\Camera',
            ],
            [
                'code' => 'custom_weight',
                'label' => 'Weight',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\Weight',
            ],
            [
                'code' => 'custom_cpu',
                'label' => 'CPU',
                'input' => 'select',
                'source' => 'Kitchen\Company\Model\Config\Source\CPU',
            ]
        ];

        foreach ($attributes as $attribute) {
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                $attribute['code'],
                [
                    'type' => 'varchar',
                    'backend' => '',
                    'frontend' => '',
                    'label' => $attribute['label'],
                    'input' => $attribute['input'],
                    'class' => '',
                    'source' => $attribute['source'],
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => '',
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => true,

                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
