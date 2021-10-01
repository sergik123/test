<?php


namespace command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use command\GameCommand;

class GameValidation extends Command
{
    public int $number;
    public string $name;

    public function __construct(int $number = null, string $name = '')
    {
        $this->number = $number;
        $this->name = $name;
    }

    public function validate(InputInterface $input, OutputInterface $output, $helper)
    {
        $random = rand(0, $this->number);
        $output->writeln('Рандомное число ' . $random);
        $cnt = 0;
        while (true) {
            $question = new Question('Угадайте число ', 'AcmeDemoBundle');

            $userNumber = $helper->ask($input, $output, $question);
            if ($userNumber > $random) {
                $output->writeln('Ваше число больше ');
            } elseif ($userNumber < $random) {
                $output->writeln('Ваше число меньше ');
            } elseif ($userNumber == $random) {
                $output->writeln('Поздравляю ' . $this->name . '!! Вы угадали число');
                $output->writeln('Вы угадали число за ' . $cnt . ' раз(а)');

                $question = new Question('Вы хотите сыграть ещё раз? [yes/no] ', 'AcmeDemoBundle');

                $answer = $helper->ask($input, $output, $question);
                if ($answer == 'yes') {
                    return 'yes';
                    //  exit();

                } else {
                    exit();
                }
            }
            $cnt++;
        }
    }
}