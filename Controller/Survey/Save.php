<?php

namespace Abhinay\LeadForm\Controller\Survey;

/**
 * Class Save
 * @package Abhinay\LeadForm\Controller\Survey
 */
class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Abhinay\LeadForm\Model\LeadFactory
     */
    protected $leadFactory;

    protected $_messageManager;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Abhinay\LeadForm\Model\LeadFactory $leadFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Abhinay\LeadForm\Model\LeadFactory $leadFactory
    )
    {
        $this->leadFactory = $leadFactory;
        $this->_pageFactory = $pageFactory;
        $this->_messageManager = $context->getMessageManager();
        return parent::__construct($context);
    }

    /**
     * Save Lead Informations
     * @return void
     */
    public function execute()
    {
        $postData = $this->getRequest()->getParams();
        $model = $this->leadFactory->create();
        $model->setSchoolName($postData['school_name']);
        $model->setSchoolEmail($postData['school_email']);
        $model->setContactNumber($postData['contact_number']);
        $model->setLocation($postData['location']);
        $model->setSchoolBoard($postData['school_board']);
        $model->setSchoolInfrastructure($postData['school_infrastructure']);
        $model->setSchoolInfrastructureComment($postData['school_infrastructure_comment']);
        $model->setDigitalInfrastructure($postData['digital_infrastructure']);
        $model->setDigitalInfrastructureComment($postData['digital_infrastructure_comment']);
        $model->setEdtechContent($postData['edtech_content']);
        $model->setEdtechContentComment($postData['edtech_content_comment']);
        $model->setSmartSportsPhysicalEducation($postData['smart_sports_physical_education']);
        $model->setSmartSportsPhysicalEducationComment($postData['smart_sports_physical_education_comment']);
        $model->setSkillDevelopmentPrograms($postData['skill_development_programs']);
        $model->setSkillDevelopmentProgramsComment($postData['skill_development_programs_comment']);
        $model->setGamificationScienceMath($postData['gamification_science_math']);
        $model->setGamificationScienceMathComment($postData['gamification_science_math_comment']);
        $model->setInterestFurtherSupport($postData['interest_further_support']);
        $model->setInterestFurtherSupportComment($postData['interest_further_support_comment']);
        $model->setAdditionalComment($postData['additional_comment']);
        try {
            $model->save();
            $this->_messageManager->addSuccessMessage('Thank you for your valuable time and submission of the form.');
        } catch (\Exception $e) {
            $this->_messageManager->addErrorMessage('There was an issue during the form submission.');
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('lead/survey/index');
        return $resultRedirect;
    }
}
