<?php

namespace Abhinay\LeadForm\Model\ResourceModel;

class Lead extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init("schoolmart_lead", "id");
    }
}
