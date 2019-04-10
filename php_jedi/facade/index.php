<?php

class Purchase {

    private $order, $billing, $shipping;

    public function __construct(OrderInterface $order, BillingInterface $billing, ShippingInterface $shipping) {
        $this->order = $order;
        $this->billing = $billing;
        $this->shipping = $shipping;
    }

    public function finish() {
        $this->billing->chargeCreditCard();
        $this->order->setStatus($this->billing->getStatus());

        if($this->order->isOK()) {
            $this->shipping->addToPipeLine($this->order);
        }
    }
    
}

?>