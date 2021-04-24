<?php
namespace Devall\Tabatadze\Model;

use Devall\Tabatadze\Api\Data\CompanyInterface;
use Magento\Framework\Model\AbstractModel;

class Company extends AbstractModel implements CompanyInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const COUNTRY = 'country';
    const STREET = 'street';
    const NUMBER = 'street_number';
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

    /**
     * @inheritDoc
     */
    public function getCountry()
    {
        return $this->_getData(self::COUNTRY);
    }

    /**
     * @inheritDoc
     */
    public function getStreet()
    {
        return $this->_getData(self::STREET);
    }

    /**
     * @inheritDoc
     */
    public function getNumber()
    {
        return $this->_getData(self::NUMBER);
    }
}
