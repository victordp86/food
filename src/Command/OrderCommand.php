<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once 'src/Domain/Entity/Order.php';
require_once 'src/Domain/Entity/OrderItem.php';
#[AsCommand(
    name: 'app:order:register',
    description: 'Registers a new order.',
    aliases: ['app:order:register'],
    hidden: false
)]
class OrderCommand extends Command
{

    private $myOrder;
    private $myOrderItem1;
    protected function configure(): void
    {
        $this->myOrder = new \App\Entity\Order();

        $this->myOrderItem1 = new \App\Entity\OrderItem();
        $this->setHelp('Registers a new order in the system');

        $this
            ->addArgument('selectedFood', InputArgument::REQUIRED, 'Type of food')
            ->addArgument('money', InputArgument::REQUIRED, 'Amount of money given by the user')
            ->addArgument('isDelivery', InputArgument::REQUIRED, 'Is delivered or user must get the food from the restaurant')
            ->addArgument('drinks', InputArgument::OPTIONAL, 'Number of drinks', 0);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->myOrder = new \App\Entity\Order();
        $this->myOrderItem1 = new \App\Entity\OrderItem();
        $selectedFood = $input->getArgument('selectedFood');
        $money = $input->getArgument('money');
        $drinks = $input->getArgument('drinks');
        $isDelivery = $input->getArgument('isDelivery');

        $this->myOrderItem1->setOrderRef($selectedFood);
        if (!in_array($selectedFood, ['pizza', 'burger', 'sushi'])) {
            $output->writeln('Selected food must be pizza, burger or sushi.');
            return Command::FAILURE;
        } else {
            $foodAmount = 0;
            switch ($selectedFood) {
                case 'pizza':
                    $foodAmount = 12.5;
                    break;
                case 'burger':
                    $foodAmount = 9;
                    break;
                case 'sushi':
                    $foodAmount = 24;
                    break;
            }

            $this->myOrderItem1->setOrderRef($selectedFood);

            if (is_null($drinks)) {
                $drinks = 0;
            }
            $this->myOrderItem1->setDrinks($drinks);

            if ($drinks < 0 || $drinks > 2) {
                $output->writeln('Number of drinks should be between 0 and 2.');
                return Command::FAILURE;
            } else {
                if ($isDelivery == true) {
                    $totalOrderAmount = $foodAmount + ($drinks * 2) + 1.5;
                    if ($money < $totalOrderAmount || $money > $totalOrderAmount) {
                        $output->writeln('Money must be the exact order amount on delivery orders.');
                        return Command::FAILURE;
                    }
                } else {
                    $totalOrderAmount = $foodAmount + ($drinks * 2);
                    if ($money < $totalOrderAmount) {
                        $output->writeln('Money does not reach the order amount.');
                        return Command::FAILURE;
                    }
                }
                $this->myOrderItem1->setAmount($totalOrderAmount);
                $output->writeln('Your order '.$this->myOrder->printOrderWithDrinks().'has been registered.');
                return Command::SUCCESS;
            }
        }
    }
}
