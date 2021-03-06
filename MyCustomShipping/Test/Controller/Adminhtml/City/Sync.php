<?php

namespace MyCustomShipping\Test\Controller\Adminhtml\City;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use MyCustomShipping\Test\Api\CityRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Sync extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    private $cityRepository;
    private $cityFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\HTTP\ZendClientFactory
     */
    private $_httpClientFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param CityRepositoryInterface $cityRepository
     * @param \Magegain\Novaposhta\Model\CityFactory $cityFactory
     * @param \Magento\Framework\HTTP\ZendClientFactory $httpClientFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CityRepositoryInterface $cityRepository,
        \MyCustomShipping\Test\Model\CityFactory $cityFactory,
        \Magento\Framework\HTTP\ZendClientFactory $httpClientFactory,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->cityRepository = $cityRepository;
        $this->cityFactory = $cityFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_httpClientFactory = $httpClientFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $citiesApiJson = $this->_getCitiesFromServer();
        $citiesApi = json_decode($citiesApiJson);
        if (property_exists($citiesApi, 'success') && $citiesApi->success === true) {
            $this->_syncWithDb($citiesApi->data);
            $this->messageManager->addSuccess(
                __('Успешно синхронизировано')
            );
            $this->_redirect('mycustomshipping/city/index');
        } else {
            $this->messageManager->addError(
                __('Новая почта не отвечет или отвечает не правльно')
            );
            $this->messageManager->addError($citiesApi->message);
            $this->_redirect('mycustomshipping/city/index');
        }
    }

    /**
     * Get cities from api
     *
     *
     * @return json
     */
    private function _getCitiesFromServer()
    {
        $apiKey = $this->scopeConfig->getValue('carriers/custom/apikey', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $client = $this->_httpClientFactory->create();
        $client->setUri('http://testapi.novaposhta.ua/v2.0/json/Address/getCities');
        $request = ['modelName' => 'Address', 'calledMethod' => 'getCities', 'apiKey' => $apiKey];
        $client->setConfig(['maxredirects' => 0, 'timeout' => 30]);
        $client->setRawData(utf8_encode(json_encode($request)));
        return $client->request(\Zend_Http_Client::POST)->getBody();
    }

    private function _syncWithDb($citiesApi)
    {
        $currentCitiesIds = $this->_getCitiesIdArray();
        foreach ($citiesApi as $key => $cityApi) {
            $cityApiId = $cityApi->CityID;
            if (isset($currentCitiesIds[$cityApiId])) {
                continue;
            } else {
                $this->_addNewCity($cityApi);
            }
        }
    }

    private function _getCitiesIdArray()
    {
        $citiesCollection = $this->_getCitiesCollection();
        $idsArray = [];
        foreach ($citiesCollection as $key => $city_model) {
            $idsArray[$city_model->getCityId()] = '';
        }
        return $idsArray;
    }

    protected function _getCitiesCollection()
    {
        return $this->cityRepository->getList(
            $this->searchCriteriaBuilder->create()
        )->getItems();
    }

    private function _addNewCity($cityApi)
    {
        $modelCity = $this->cityFactory->create();
        $modelCity->setCityId($cityApi->CityID);
        $modelCity->setCityName($cityApi->Description);
        $modelCity->setCityNameRu($cityApi->DescriptionRu);
        $modelCity->setRef($cityApi->Ref);
        $this->cityRepository->save($modelCity);
    }
}
