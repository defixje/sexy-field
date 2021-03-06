<?php

/*
 * This file is part of the SexyField package.
 *
 * (c) Dion Snoeijen <hallo@dionsnoeijen.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types = 1);

namespace Tardigrades\SectionField\Generator;

use Tardigrades\Entity\SectionInterface;
use Tardigrades\SectionField\Generator\Writer\Writable;

class Generators implements GeneratorsInterface
{
    /** @var GeneratorInterface[] */
    private $generators;

    /** @var string[] */
    private $buildMessages = [];

    public function __construct(array $generators)
    {
        $this->generators = $generators;
    }

    public function generateBySection(SectionInterface $section): array
    {
        $writables = [];

        /** @var GeneratorInterface $generator */
        foreach ($this->generators as $generator) {
            try {
                $writables[] = $generator->generateBySection($section);
            } catch (\Exception $exception) {
                $this->buildMessages[] = $exception->getMessage();
            }
            $this->buildMessages = array_merge($this->buildMessages, $generator->getBuildMessages());
        }

        return $writables;
    }

    public function getBuildMessages(): array
    {
        return $this->buildMessages;
    }
}
