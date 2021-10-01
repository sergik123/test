<?php

namespace command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class GameCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:start-game';

    public function startGame(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $username = new GameCreateUser();
        $name = $username->setData($input, $output, $helper, 'Введите ваше имя ', 'Ваше имя ');
        $number = $username->setData($input, $output, $helper, 'Введите ваше число ', 'Ваше число ');
        if (is_numeric($number)) {
            $validate = new GameValidation($number, $name);
            $result = $validate->validate($input, $output, $helper);
            if ($result == 'yes') {
                $this->startGame($input, $output);
            }
        } else {
            $output->writeln('Вы ввели текст вместо числа');
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->startGame($input, $output);

        return Command::SUCCESS;
    }
}