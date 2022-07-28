<?php

class webo_removeallitemajaxModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        ob_end_clean();
        header('Content-Type: application/json');
        if(Tools::getValue("action") == "deleteitemfromcart")
        {
            $this->deleteAllItem(Tools::getAllValues());
        }
    }

    public function deleteAllItem(array $variable)
    {
        $result = DB::getInstance()->delete("cart_product", 'id_cart = '.Tools::getValue("cartid").'');
        if($result)
        {
            die ($this->ajaxRender(json_encode([
                'success' => true,
                'code' => '200',
                'data' => "We delete cart"
            ])));
        }
        else {
            die ($this->ajaxRender(json_encode([
                'success' => false,
                'code' => '200',
                'data' => "We can't delete cart list"
            ])));
        }
    }
}