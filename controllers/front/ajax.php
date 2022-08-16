<?php

class webo_removeallitemAjaxModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        ob_end_clean();
        header('Content-Type: application/json');
        if((string)Tools::getValue("action") == "deleteitemfromcart")
        {
            $this->deleteAllItem(Tools::getAllValues());
        }
    }

    public function deleteAllItem(array $variable)
    {
        if(DB::getInstance()->delete("cart_product", 'id_cart = '.(string)Tools::getValue("cartid").''))
        {
            Hook::exec('actionObjectProductInCartDeleteAfter');
            echo ($this->ajaxRender(json_encode([
                'success' => true,
                'code' => '200',
                'data' => "We delete cart"
            ])));
        }
        else {
            echo ($this->ajaxRender(json_encode([
                'success' => false,
                'code' => '200',
                'data' => "We can't delete cart list"
            ])));
        }
    }
}