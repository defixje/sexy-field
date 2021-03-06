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

namespace Tardigrades\Entity;

use Doctrine\Common\Collections\Collection;
use Tardigrades\SectionField\ValueObject\Created;
use Tardigrades\SectionField\ValueObject\FieldConfig;
use Tardigrades\SectionField\ValueObject\Handle;
use Tardigrades\SectionField\ValueObject\Id;
use Tardigrades\SectionField\ValueObject\Name;
use Tardigrades\SectionField\ValueObject\Updated;

interface FieldInterface
{
    public function setId(int $id): FieldInterface;
    public function getId(): ?int;
    public function getIdValueObject(): Id;
    public function getName(): Name;
    public function setName(string $name): FieldInterface;
    public function setHandle(string $handle): FieldInterface;
    public function getHandle(): Handle;
    public function addSection(SectionInterface $section): FieldInterface;
    public function removeSection(SectionInterface $section): FieldInterface;
    public function getSections(): Collection;
    public function setFieldType(FieldTypeInterface $fieldType): FieldInterface;
    public function removeFieldType(FieldTypeInterface $fieldType): FieldInterface;
    public function getFieldType(): FieldTypeInterface;
    public function setConfig(array $config): FieldInterface;
    public function getConfig(): FieldConfig;
    public function setCreated(\DateTime $created): FieldInterface;
    public function getCreated(): \DateTime;
    public function getCreatedValueObject(): Created;
    public function setUpdated(\DateTime $updated): FieldInterface;
    public function getUpdated(): \DateTime;
    public function getUpdatedValueObject(): Updated;
    public function onPrePersist(): void;
    public function onPreUpdate(): void;
}
