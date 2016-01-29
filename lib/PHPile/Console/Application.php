<?php

namespace PHPile\Console;

use PHPile\IO\IOInterface;
use PHPile\IO\SymfonyIO;
use \Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends BaseApplication {

    /**
     * @var IOInterface
     */
    protected $io;

    /**
     * @return IOInterface
     */
    function getIO() {
        return $this->io;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        // Store IO in application
        $this->io = new SymfonyIO($input, $output);

        return parent::doRun($input, $output);
    }


}
