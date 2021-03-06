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

namespace Tardigrades\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Output\OutputInterface;
use Tardigrades\Entity\Field;

abstract class FieldCommand extends Command
{
    protected function renderTable(
        OutputInterface $output,
        array $fields,
        string $info
    ): void {
        $table = new Table($output);

        $rows = [];
        /** @var Field $field */
        foreach ($fields as $field) {
            $rows[] = [
                $field->getId(),
                $field->getName(),
                $field->getHandle(),
                $field->getFieldType()->getType(),
                (string) $field->getConfig(),
                $field->getUpdated()->format('d-m-y h:i')
            ];
        }

        $rows[] = new TableSeparator();
        $rows[] = [
            new TableCell('<info>' . $info . '</info>', ['colspan' => 7])
        ];

        $table
            ->setHeaders([
                '#id', 'name', 'handle',
                'type', 'config', 'updated'
            ])
            ->setRows($rows)
        ;
        $table->render();
    }
}
