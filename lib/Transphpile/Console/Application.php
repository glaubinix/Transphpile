<?php

namespace Transphpile\Console;

use Transphpile\IO\IOInterface;
use Transphpile\IO\SymfonyIO;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Transphpile\Console\Command as Commands;

class Application extends BaseApplication
{
    const TRANSPHPILE_SEMVER = '0.0.1';

    /**
     * @var IOInterface
     */
    protected $io;


    function __construct()
    {
        parent::__construct('Transphpile', self::TRANSPHPILE_SEMVER);

        $this->add(new Commands\TranspileCommand());
        $this->add(new Commands\SelfUpdateCommand());
    }

    /**
     * @return IOInterface
     */
    public function getIO()
    {
        return $this->io;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        // Store IO in application
        $this->io = new SymfonyIO($input, $output);

        return parent::doRun($input, $output);
    }
}
