<?php
namespace Magegain\Novaposhta\Controller\Ajax;

use Magento\Backend\App\Action\Context;
use Magegain\Novaposhta\Api\CityRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Locale\Resolver;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magegain\Novaposhta\Model\CityFactory;
use Magegain\Novaposhta\Api\WarehouseRepositoryInterface;

class Departments extends \Magento\Framework\App\Action\Action
{

    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $resultJsonFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var Resolver
     */
    private $resolver;

    /**
     * @var CityFactory
     */
    private $cityFactory;

    /**
     * @var null|string
     */
    private $loc;

    /**
     * @var
     */
    private $warehouseRepository;

    /**
     * @var FilterGroupBuilder
     */
    private $filterGroup;

    /**
     * @var \Magento\Customer\Model\Session
     */
    private $customerSession;

    /**
     * @var \Magento\Customer\Model\Address
     */
    private  $modelAdress;

    /**
     * Departments constructor.
     * @param Context $context
     * @param CityRepositoryInterface $cityRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param Resolver $resolver
     * @param FilterBuilder $filterBuilder
     * @param CityFactory $cityFactory
     * @param WarehouseRepositoryInterface $warehouseRepository
     * @param FilterGroupBuilder $filterGroup
     * @param \Magento\Customer\Model\Address $modelAdress
     * @param \Magento\Customer\Model\Session $customerSession
     */
    public function __construct(
        Context $context,
        CityRepositoryInterface $cityRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        Resolver $resolver,
        FilterBuilder $filterBuilder,
        CityFactory $cityFactory,
        WarehouseRepositoryInterface $warehouseRepository,
        FilterGroupBuilder $filterGroup,
        \Magento\Customer\Model\Address $modelAdress,
        \Magento\Customer\Model\Session $customerSession
    ) {
    
        parent::__construct($context);
        $this->cityRepository = $cityRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->resolver = $resolver;
        $this->filterBuilder = $filterBuilder;
        $this->cityFactory = $cityFactory;
        $this->loc = $resolver->getLocale();
        $this->warehouseRepository = $warehouseRepository;
        $this->filterGroup = $filterGroup;
        $this->modelAdress =  $modelAdress;
        $this->customerSession = $customerSession;
    }


    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {


        $warehouses = $this->_getWhCollection();
        $to_json = [];
        $loc = $this->loc;
        foreach ($warehouses as $key => $wh) {
            $to_json[] = ($loc == 'ru_RU') ? $wh->getNameRu() : $wh->getName();
        }
        return $this->resultJsonFactory->create()->setData(json_encode($to_json));
    }

    /**
     * return warehouse collection
     * @return mixed
     */
    protected function _getWhCollection()
    {
        $postData = json_decode(file_get_contents('php://input'));
        $fieldName = ($this->loc == 'ru_RU') ? 'city_name_ru' : 'city_name';

        $cityColl = $this->cityFactory->create()->getCollection();
        $city = $postData->city;
        if ($city == '') {
            $billingID =  $this->customerSession->getCustomer()->getDefaultBilling();
            $address = $this->modelAdress->load($billingID);
            $data = $address->getData();
            if (isset($data['city'])) {
                $city = $data['city'];
            }
        }

        $cityColl->addFieldToFilter($fieldName, $city);
        $filters[] = $this->filterBuilder
            ->setConditionType('eq')
            ->setField('main_table.city_id')
            ->setValue($cityColl->getFirstItem()->getId())
            ->create();

        $whnameField = ($this->loc == 'ru_RU') ? 'warehouse_name_ru' : 'warehouse_name';
        $filters[] = $this->filterBuilder
            ->setConditionType('like')
            ->setField($whnameField)
            ->setValue('%'. $postData->q.'%')
            ->create();
        $filter_group = [
            $this->filterGroup
                ->addFilter($filters[0])
                ->create(),
            $this->filterGroup
                ->addFilter($filters[1])
                ->create(),
        ];

        $this->searchCriteriaBuilder->setFilterGroups($filter_group);
        return $this->warehouseRepository->getList(
            $this->searchCriteriaBuilder->create()
        )->getItems();
    }
}
