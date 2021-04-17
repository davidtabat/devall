<?php


namespace Devall\Tabatadze\Model;


use Devall\Tabatadze\Api\Data\CompanyInterface;
use Magento\Framework\Model\AbstractModel;

class Company extends AbstractModel implements CompanyInterface
{
    const NAME = 'name';
    protected function _construct()
    {
         $this->_init(\Devall\Tabatadze\Model\ResourceModel\Company::class);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }
}
