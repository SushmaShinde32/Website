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

namespace OrangeHRM\Leave\Event;

use OrangeHRM\Entity\LeaveRequest;
use OrangeHRM\Entity\User;
use OrangeHRM\Entity\WorkflowStateMachine;
use OrangeHRM\Framework\Event\Event;
use OrangeHRM\Leave\Dto\LeaveRequest\DetailedLeaveRequest;

abstract class LeaveAllocate extends Event
{
    /**
     * @var LeaveRequest|DetailedLeaveRequest
     */
    private $leaveRequest;

    /**
     * @var WorkflowStateMachine
     */
    private WorkflowStateMachine $workflow;

    /**
     * @var User
     */
    private User $performer;

    /**
     * @param LeaveRequest|DetailedLeaveRequest $leaveRequest
     * @param WorkflowStateMachine $workflow
     * @param User $performer
     */
    public function __construct($leaveRequest, WorkflowStateMachine $workflow, User $performer)
    {
        $this->leaveRequest = $leaveRequest;
        $this->workflow = $workflow;
        $this->performer = $performer;
    }

    /**
     * @return DetailedLeaveRequest
     */
    public function getDetailedLeaveRequest(): DetailedLeaveRequest
    {
        if ($this->leaveRequest instanceof LeaveRequest) {
            $this->leaveRequest = new DetailedLeaveRequest($this->leaveRequest);
            $this->leaveRequest->fetchLeaves();
        }
        return $this->leaveRequest;
    }

    /**
     * @return WorkflowStateMachine
     */
    public function getWorkflow(): WorkflowStateMachine
    {
        return $this->workflow;
    }

    /**
     * @return User
     */
    public function getPerformer(): User
    {
        return $this->performer;
    }
}
