<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php
            if($employee && $employee['jobType'] === 'admin')
            {
                echo( "<li>".$this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $employee['id'])]).'</li>');
                echo('<li>'.$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']]).'</li>');
                echo('<li>'.$this->Html->link(__('List Employees'), ['action' => 'index']).'</li>');
            }
            if($employee && $employee['jobType'] === 'manager')
            {
                echo('<li>'.$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']]).'</li>');
                echo('<li>'.$this->Html->link(__('List Employees'), ['action' => 'index']).'</li>');
        
            }
            if($employee && $employee['id'] == $employeeView['id'])
            {
                if($employee['jobType'] != 'manager' && $employee['jobType'] != 'admin')
                {
                echo('<li>'.$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']]).'</li>');
            }
            }

        ?>
       
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employeeView['name']) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employeeView['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($employeeView['address']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ContactNumber') ?></th>
            <td><?= h($employeeView['contactNumber']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($employeeView['username']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JobType') ?></th>
            <td><?= h($employeeView['jobType']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeView['id']) ?></td>
        </tr>
    </table>
</div>
