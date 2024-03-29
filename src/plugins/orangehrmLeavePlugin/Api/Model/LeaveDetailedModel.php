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

namespace OrangeHRM\Leave\Api\Model;

use OrangeHRM\Core\Api\V2\Serializer\Normalizable;
use OrangeHRM\Core\Traits\Service\DateTimeHelperTrait;
use OrangeHRM\Core\Traits\Service\NormalizerServiceTrait;
use OrangeHRM\Leave\Dto\LeaveRequest\DetailedLeave;

/**
 * @OA\Schema(
 *     schema="Leave-LeaveDetailedModel",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="dates", type="object",
 *         @OA\Property(property="fromDate", type="string", format="date"),
 *         @OA\Property(property="toDate", type="string", format="date"),
 *         @OA\Property(property="durationType", type="object",
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="type", type="string"),
 *         ),
 *     @OA\Property(property="startTime", type="string", format="time")),
 * @OA\Property(property="endTime", type="string", format="time")),
 *     ),
 * @OA\Property(property="lengthHours", type="integer"),
 * @OA\Property(property="leaveBalance", type="object"),
 * @OA\Property(property="leaveStatus", type="object"),
 * @OA\Property(property="allowedActions", type="object"),
 * @OA\Property(property="leaveType", type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="deleted", type="boolean"),
 * ),
 * @OA\Property(property="lastComment", type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="comment", type="string"),
 *     @OA\Property(property="date", type="string", format="date"),
 *     @OA\Property(property="time", type="string", format="time"),
 * ),
 * )
 */
class LeaveDetailedModel implements Normalizable
{
    use DateTimeHelperTrait;
    use NormalizerServiceTrait;

    private DetailedLeave $leave;

    /**
     * @param DetailedLeave $leave
     */
    public function __construct(DetailedLeave $leave)
    {
        $this->leave = $leave;
    }

    public function toArray(): array
    {
        $detailedLeave = $this->leave;
        $leaveType = $detailedLeave->getLeave()->getLeaveType();
        $lastComment = $detailedLeave->getLeave()->getDecorator()->getLastComment();
        $dates = $detailedLeave->getDatesDetail();

        $status = [
            'id' => $detailedLeave->getLeaveStatus()->getId(),
            'name' => $detailedLeave->getLeaveStatus()->getName(),
            'lengthDays' => $detailedLeave->getLeaveStatus()->getLengthDays(),
        ];

        $allowedActions = [];
        foreach ($detailedLeave->getAllowedActions() as $action) {
            $allowedActions[] = [
                'action' => $action,
                'name' => ucwords(strtolower($action)),
            ];
        }

        $leaveBalanceWithLeavePeriod = $detailedLeave->getLeaveBalance();
        $leaveBalance = [
            'period' => $this->getNormalizerService()
                ->normalize(LeavePeriodModel::class, $leaveBalanceWithLeavePeriod->getLeavePeriod()),
            'balance' => $this->getNormalizerService()
                ->normalize(LeaveBalanceModel::class, $leaveBalanceWithLeavePeriod->getLeaveBalance())
        ];

        return [
            'id' => $detailedLeave->getLeave()->getId(),
            'dates' => [
                'fromDate' => $this->getDateTimeHelper()->formatDateTimeToYmd($dates->getFromDate()),
                'toDate' => $this->getDateTimeHelper()->formatDateTimeToYmd($dates->getToDate()),
                'durationType' => [
                    'id' => $dates->getDurationTypeId(),
                    'type' => $dates->getDurationType(),
                ],
                'startTime' => $this->getDateTimeHelper()->formatDateTimeToTimeString($dates->getStartTime()),
                'endTime' => $this->getDateTimeHelper()->formatDateTimeToTimeString($dates->getEndTime()),
            ],
            'lengthHours' => $detailedLeave->getLeave()->getLengthHours(),
            'leaveBalance' => $leaveBalance,
            'leaveStatus' => $status,
            'allowedActions' => $allowedActions,
            'leaveType' => [
                'id' => $leaveType->getId(),
                'name' => $leaveType->getName(),
                'deleted' => $leaveType->isDeleted(),
            ],
            'lastComment' => $lastComment ? [
                'id' => $lastComment->getId(),
                'comment' => $lastComment->getComment(),
                'date' => $lastComment->getDecorator()->getCreatedAtDate(),
                'time' => $lastComment->getDecorator()->getCreatedAtTime(),
            ] : null,
        ];
    }
}
