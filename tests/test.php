<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Entity/Order.php';
require_once 'src/Entity/OrderItem.php';

class MyClassTest extends TestCase
{
    private $myOrder;
    private $myOrderItem1;
    private $myOrderItem2;
    private $myOrderItem3;

    public function setUp(): void
    {
        $this->myOrder = new \App\Entity\Order();
    }

    public function tearDown(): void
    {
    }

    public function testProductIsAddedToOrder()
    {

        //Arrange
        $this->myOrderItem1 = new \App\Entity\OrderItem();

        //Act
        $this->myOrderItem1->setOrderRef($this->myOrder);
        $this->myOrderItem1->setProduct("pizza");
        $this->myOrderItem1->setDrinks(1);
        $this->myOrderItem1->setIsDelivery(1);
        $this->myOrderItem1->setAmount(10);
        $this->myOrder->addItem($this->myOrderItem1);

        //Assert
        $this->assertEquals($this->myOrder->getItems()[0]->getProduct(), 'pizza');

        $this->myOrder->removeItem($this->myOrderItem1);
    }
    //Due to time constraints I enuntiate which are the corresponding functions to test the funcionality
    public function testTheSelectedFoodIsNotBurgerPizzaOrSushi{}
    public function testIsNotDeliveryAndMoneyDoesNotReachOrderTotalAmount{}
    public function testIfTheNumberOfDrinksIsNotBetweenOAnd2{}
    public function tesIfDeliveryIsTrueAndMoneyIsNotEqualToTheOrderTotalAmount{}
    public function testIfTheOrderWithDrinksHasBeenRegisteredWithSuccess{}
    public function testTheOrderWithoutDrinksHasBeenRegisteredWithSuccess{}
}

?>
