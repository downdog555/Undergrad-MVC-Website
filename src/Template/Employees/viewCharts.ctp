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
                echo( "<li>".$this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employeeView['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeView['id'])]).'</li>');
                echo('<li>'.$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employeeView['id']]).'</li>');
                echo('<li>'.$this->Html->link(__('List Employees'), ['action' => 'index']).'</li>');
                echo('<li>'.$this->Html->link(__('New Employee'), ['action' => 'add']) .'</li>');
                echo('<li>'.$this->Html->link(__('View Assigned Cards'), ['controller' => 'cards' ,'action' => 'viewEmployeeCard',  $employeeView['id']]).'</li>');

            }
            elseif($employee && $employee['jobType'] === 'manager')
            {
                echo('<li>'.$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employeeView['id']]).'</li>');
                echo('<li>'.$this->Html->link(__('List Employees'), ['action' => 'index']).'</li>');
                echo('<li>'.$this->Html->link(__('New Employee'), ['action' => 'add']) .'</li>');
                echo('<li>'.$this->Html->link(__('View Assigned Cards'), ['controller' => 'cards' ,'action' => 'viewEmployeeCard',  $employeeView['id']]).'</li>');

        
            }
            elseif($employee && $employee['id'] == $employeeView['id'])
            {
                if($employee['jobType'] != 'manager' && $employee['jobType'] != 'admin')
                {
                echo('<li>'.$this->Html->link(__('Edit Details'), ['action' => 'edit', $employee['id']]).'</li>');
                echo('<li>'.$this->Html->link(__('View Assigned Cards'), ['controller' => 'cards' ,'action' => 'viewEmployeeCard',  $employeeView['id']]).'</li>');
               
            }
            }

        ?>
       
      
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <div class="chart large-8 medium-6 columns">
        <canvas id="ChartMonth" width="400" height="400"></canvas>
        <script>
        var ctx = document.getElementById("ChartMonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
    </div>
</div>
<div class="">
	<!--User Metrics-->
</div>
