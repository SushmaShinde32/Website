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

namespace OrangeHRM\Core\Report\FilterField;

use OrangeHRM\Admin\Service\LanguageService;
use OrangeHRM\Entity\Language;
use OrangeHRM\ORM\QueryBuilderWrapper;

class EmployeeLanguage extends FilterField implements ValueXNormalizable
{
    /**
     * @inheritDoc
     */
    public function addWhereToQueryBuilder(QueryBuilderWrapper $queryBuilderWrapper): void
    {
        $qb = $queryBuilderWrapper->getQueryBuilder();
        if ($this->getOperator() === Operator::EQUAL && !is_null($this->getX())) {
            $qb->andWhere($qb->expr()->eq('language.language', ':EmployeeLanguage_language'))
                ->setParameter('EmployeeLanguage_language', $this->getX());
        }
    }

    /**
     * @inheritDoc
     */
    public function getEntityAliases(): array
    {
        return ['language'];
    }

    /**
     * @inheritDoc
     */
    public function toArrayXValue(): ?array
    {
        $languageService = new LanguageService();
        $language = $languageService->getLanguageById($this->getX());
        if ($language instanceof Language) {
            return [
                'id' => $language->getId(),
                'label' => $language->getName(),
            ];
        }
        return null;
    }
}
