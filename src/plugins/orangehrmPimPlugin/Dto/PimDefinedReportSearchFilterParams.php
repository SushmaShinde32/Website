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

namespace OrangeHRM\Pim\Dto;

use OrangeHRM\Core\Dto\FilterParams;

class PimDefinedReportSearchFilterParams extends FilterParams
{
    public const ALLOWED_SORT_FIELDS = ['report.name'];

    /**
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * @var int|null
     */
    protected ?int $reportId = null;

    public function __construct()
    {
        $this->setSortField('report.name');
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getReportId(): ?int
    {
        return $this->reportId;
    }

    /**
     * @param int|null $reportId
     */
    public function setReportId(?int $reportId): void
    {
        $this->reportId = $reportId;
    }
}
