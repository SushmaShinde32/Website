<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software: you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with OrangeHRM.
 * If not, see <https://www.gnu.org/licenses/>.
 */

namespace OrangeHRM\Core\Vue;

class Component
{
    /**
     * @var string
     */
    public string $name;
    /**
     * @var array
     */
    public array $props = [];

    /**
     * @param string $name
     * @param Prop[] $props
     */
    public function __construct(string $name, array $props = [])
    {
        $this->name = $name;
        $this->props = $props;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Prop[]
     */
    public function getProps(): array
    {
        return $this->props;
    }

    /**
     * @param Prop[] $props
     */
    public function setProps(array $props): void
    {
        $this->props = $props;
    }

    /**
     * @param Prop $prop
     */
    public function addProp(Prop $prop): void
    {
        $this->props = array_merge($this->props, [$prop]);
    }
}
