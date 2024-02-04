<?php

namespace Abhinay\LeadForm\Model\ResourceModel\Lead;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init(
            'Abhinay\LeadForm\Model\Lead',
            'Abhinay\LeadForm\Model\ResourceModel\Lead'
        );
    }
}
