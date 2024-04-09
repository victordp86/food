<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;

/**
 * @ORM\Entity(repositoryClass=OrderItemRepository::class)
 */
class OrderItem
{
    // ...
    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderRef;
    /** @var string */
    private $product;

    /** @var float */
    private $amount;

    /** @var float */
    private $itemPrice;

    /** @var float */
    private $orderLinePrice;

    /** @var integer */
    private $drinks;

    /** @var bool */
    private $isDelivery;


    // ...
    public function getOrderRef(): ?Order
    {
        return $this->orderRef;
    }

    public function setOrderRef(?Order $orderRef): self
    {
        $this->orderRef = $orderRef;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * @param mixed $orderAmount
     */
    public function setOrderAmount($orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * @return mixed
     */

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getItemPrice(): float
    {
        return $this->itemPrice;
    }

    public function setItemPrice(float $itemPrice): void
    {
        $this->itemPrice = $itemPrice;
    }

    public function getOrderLinePrice(): float
    {
        return $this->orderLinePrice;
    }

    public function setOrderLinePrice(float $orderLinePrice): void
    {
        $this->orderLinePrice = $orderLinePrice;
    }

    public function isDelivery(): bool
    {
        return $this->isDelivery;
    }

    public function setIsDelivery(bool $isDelivery): void
    {
        $this->isDelivery = $isDelivery;
    }

    public function getDrinks(): int
    {
        return $this->drinks;
    }

    public function setDrinks(int $drinks): void
    {
        $this->drinks = $drinks;
    }

}
