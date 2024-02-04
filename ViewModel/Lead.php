<?php

namespace Abhinay\LeadForm\ViewModel;

/**
 * Class Lead
 * @package Abhinay\LeadForm\ViewModel
 */
class Lead implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\Data\Form\FormKey $formKey,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->formKey = $formKey;
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Getting FormKey
     * @return array
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getBaseUrl()
    {
        $baseUrl = $this->storeManager->getStore()->getBaseUrl();
        return $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getHeaderContent()
    {
        return $this->scopeConfig->getValue('leadform/general/header_content',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getHeaderTitle()
    {
        return $this->scopeConfig->getValue('leadform/general/header_title',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
