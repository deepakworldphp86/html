<?php

namespace MGS\QuickView\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    const XML_PATH_QUICKVIEW_ENABLED = 'mgs_quickview/general/enabled';
    const XML_PATH_QUICKVIEW_BUTTONSTYLE = 'mgs_quickview/general/button_style';

    protected $urlInterface;
    protected $scopeConfig;

    public function __construct(
    \Magento\Framework\App\Helper\Context $context, \Magento\Framework\UrlInterface $urlInterface, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->urlInterface = $urlInterface;
        $this->scopeConfig = $scopeConfig;
    }

    public function aroundQuickViewHtml(
    \Magento\Catalog\Model\Product $product
    ) {
        $result = '';
        $isEnabled = $this->scopeConfig->getValue(self::XML_PATH_QUICKVIEW_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if ($isEnabled) {
            $buttonStyle = 'mgs_quickview_button_' . $this->scopeConfig->getValue(self::XML_PATH_QUICKVIEW_BUTTONSTYLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $productUrl = $this->urlInterface->getUrl('mgs_quickview/catalog_product/view', array('id' => $product->getId()));
            return $result . '<a class="mgs-quickview ' . $buttonStyle . '" data-quickview-url=' . $productUrl . ' href="javascript:void(0);"><span><em class="fa fa-search"></em>' . __("Quick View") . '</span></a>';
        }
        return $result;
    }

}
