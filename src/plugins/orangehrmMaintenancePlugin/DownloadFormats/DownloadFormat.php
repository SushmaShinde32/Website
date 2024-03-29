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

namespace OrangeHRM\Maintenance\DownloadFormats;

use OrangeHRM\Entity\EmployeeTerminationRecord;
use OrangeHRM\Pim\Service\EmployeeService;

/**
 * Class DownloadFormat
 */
abstract class DownloadFormat
{
    /**
     * @param $values
     * @return mixed
     */
    abstract public function getFormattedString($values);

    /**
     * @param $empNumber
     * @return string
     */
    public function getDownloadFileName($empNumber): string
    {
        $employee = $this->getEmployeeService()->getEmployeeByEmpNumber($empNumber);
        $pastEmployee = "";
        if ($employee->getEmployeeTerminationRecord() instanceof EmployeeTerminationRecord) {
            $pastEmployee = " (Past Employee)";
        }
        return $employee->getDecorator()->getFullName() . $pastEmployee . '.json';
    }

    /**
     * @return EmployeeService
     */
    public function getEmployeeService(): EmployeeService
    {
        if (!isset($this->employeeService)) {
            $this->employeeService = new EmployeeService();
        }
        return $this->employeeService;
    }
}
