<?php

namespace Abhinay\LeadForm\Model;

class Lead extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init("Abhinay\LeadForm\Model\ResourceModel\Lead");
    }
}
