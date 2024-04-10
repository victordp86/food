<?php

namespace App\Aplication\UseCase\Command\Order;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once 'src/Domain/Entity/Order.php';
require_once 'src/Domain/Entity/OrderItem.php';
#[AsCommand(
    name: 'app:order:delivery',
    description: 'Get orders with delivery.',
    aliases: ['app:order:delivery'],
    hidden: false
)]
class DeliveryOrderCommand extends Command
{

    private $myOrder;
    private $myOrderItem1;
    protected function configure(): void
    {
        $this->myOrder = new \App\Entity\Order();

        $this->myOrderItem1 = new \App\Entity\OrderItem();
        $this->setHelp('Gets all orders with delivery');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->myOrder = new \App\Entity\Order();
        $this->myOrderItem1 = new \App\Entity\OrderItem();


        $ordersWithDelivery = $this->loadOrder();

        foreach ($ordersWithDelivery as $orderWithDelivery) {

            $output->writeln($orderWithDelivery);
            return Command::SUCCESS;
        }
    }
}
