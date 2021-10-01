<?php


namespace command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class GameCreateUser extends Command
{
    public string $name;

    public function setData(InputInterface $input, OutputInterface $output, $helper, $message, $outMessage)
    {
        $question = new Question($message, 'AcmeDemoBundle');
        $this->name = $helper->ask($input, $output, $question);
        $output->writeln($outMessage . $this->name);
        return $this->name;
    }

}