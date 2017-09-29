<?php

/*
 * This file is part of the SexyField package.
 *
 * (c) Dion Snoeijen <hallo@dionsnoeijen.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare (strict_types=1);

namespace Tardigrades\SectionField\Service;

use Tardigrades\Entity\SectionInterface;
use Tardigrades\SectionField\ValueObject\Handle;
use Tardigrades\SectionField\ValueObject\Id;
use Tardigrades\SectionField\ValueObject\Version;

interface SectionHistoryManagerInterface
{
    public function create(SectionInterface $entity): SectionInterface;
    public function read(Id $id): SectionInterface;
    public function readAll(): array;
    public function update(SectionInterface $entity): void;
    public function delete(SectionInterface $entity): void;
    public function readByHandleAndVersion(Handle $handle, Version $version): SectionInterface;
}
