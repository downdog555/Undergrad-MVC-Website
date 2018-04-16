<?php
session_start();
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
<div class="row">
    <div class="large-9">
        <?php
        $jan = 0;
        $feb = 0;
        $march = 0;
        $april = 0;
        $may =0;
        $june = 0;
        $july = 0;
        $august = 0;
        $september = 0;
        $october = 0;
        $november = 0;
        $december = 0;

        $arrayData  = array();
        foreach ($data as $time) {
           //echo($this->Time->format($time['time_accessed'], 'dd/MM/yyyy HH:mm:ss'));
           array_push($arrayData,$this->Time->format($time['time_accessed'], 'yyyy/MM/dd HH:mm:ss') );
        }
//echo("Len: ".sizeof($arrayData));

for ($i=0; $i < (sizeof($arrayData)-1); $i = $i+2) { 
    //we can take them in pairs
    $isOdd;
    if(sizeof($arrayData)%2 == 0)
    {
        $isOdd = false;
    }
    else
    {
        $isOdd = true;
    }
        if($isOdd)
        {
           //we just remove the last item
            array_pop($arrayData);
        }
        //echo("<br />");
//echo($arrayData[$i].':'.$arrayData[$i+1].'<br />');
        //we can just take in pairs
        $startTime = new DateTime($arrayData[$i]);
        $endTime = new DateTime($arrayData[$i+1]);
        $diff = $startTime->diff($endTime);
        $diff= $diff->format("%H:%I:%S") ;
       // echo($diff."<br />");

        //we have the difference
        //we then need to add it to the above lsit
        $h = explode(':', $diff)[0];
        $m = explode(':', $diff)[1];
        $total = (float)$h + (float)($m/60);
       // print_r($arrayData[$i]);
        switch (explode('/', $arrayData[$i])[1]) {
            case '1':
                $jan += $total;
                break;
                 case '2':
                $feb += $total;
                break;
                 case '3':
                $march += $total;
                break;
                 case '4':
                $april += $total;
                break;
                 case '5':
                $may += $total;
                break;
                 case '6':
                $june += $total;
                break;
                 case '7':
                $july += $total;
                break;
                 case '8':
                $august += $total;
                break;
                 case '9':
                $september += $total;
                break;
                 case '10':
                $october += $total;
                break;
                 case '11':
                $november += $total;
                break;
                 case '12':
                $december += $total;
                break;
            
            default:
                # code...
                break;
        }



    }
        ?>
    </div>
</div>
<div class="employees view large-9 medium-8 columns content">
    <div class="chart large-8 medium-6 columns">
        <canvas id="ChartMonth" width="400" height="400"></canvas>
        <script>
        var ctx = document.getElementById("ChartMonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug","sep", "oct","nov","dec"],
                datasets: [{
                    label: 'Number of Hours worked per month, current year',
                    data: [<?php echo($jan); ?>, <?php echo($feb); ?>, <?php echo($march); ?>, <?php echo($april); ?>, <?php echo($may); ?>, <?php echo($june); ?>,<?php echo($july); ?>,<?php echo($august); ?>,<?php echo($september); ?>,<?php echo($october); ?>,<?php echo($november); ?>,<?php echo($december); ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
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
                        'rgba(255, 159, 64, 1)',
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
    <?php
        print_r($_SESSION);

    ?>
</div>
<div class="">
	<!--User Metrics-->
</div>
