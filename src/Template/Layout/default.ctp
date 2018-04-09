<?php


$cakeDescription = 'HR System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    
    <?= $this->Html->css('foundation.css') ?>
    <?= $this->Html->css('app.css') ?>

    <?= $this->fetch('meta') ?>

</head>
<body>
    <nav class="top-bar topbar-responsive">
  <div class="top-bar-title">
    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <a class="topbar-responsive-logo" href="#"><strong><?= $cakeDescription ?></strong></a>
  </div>
  <div id="topbar-responsive" class="topbar-responsive-links">
    <div class="top-bar-right">
      <?= $this->Form->Create(null, array('type'=>'get','url'=>$this->Url->build(array('controller'=>'Employees','action'=>'search')))); ?>
      <ul class="menu simple vertical medium-horizontal">
        <li>
          <?php 
          if($employee)
          {
            echo($this->Html->link('View My Details', ['controller' => 'Employees' ,'action' => 'view', $employee['id']]));
          }


          ?>
          
        </li>
        <?php
          if($employee['jobType'] === 'admin' || $employee['jobType'] === 'manager' || $employee['jobType'] === 'receptionist')
          {
              echo('<li>'.$this->Html->link('View Employees', ['controller' => 'Employees' ,'action' => 'index']).'</li>');
              echo('<li>'.$this->Html->link('View All Cards', ['controller' => 'Cards' ,'action' => 'index']).'</li>');
              echo('<li>'.$this->Html->link('View All Stations', ['controller' => 'Stations' ,'action' => 'index']).'</li>');
              echo('<li>'.$this->Html->link('View All Employees Currently In Building', ['controller' => 'Employees' ,'action' => 'listincurrently']).'</li>');
          }

        ?>
        <li><?php

        if($employee)
        {
            echo $this->Html->link('Logout', ['controller' => 'Employees' ,'action' => 'logout']);
        }
        else
        {
              echo $this->Html->link('login', ['controller' => 'Employees' ,'action' => 'login']);
        }
        ?></li>


        
      </ul>
    </div>
  </div>
  <?= $this->Form->end() ?>
</nav>


<div class="grid-container">

    <?= $this->Flash->render() ?>

    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="">
              <?= $this->fetch('content') ?>
          </div>
        </div>
      </div>
  </div>
    <footer>
        <?= $this->Html->script('vendor/jquery'); ?>
        <?= $this->Html->script('vendor/what-input'); ?>
        <?= $this->Html->script('vendor/foundation'); ?>
        <?= $this->Html->script('app'); ?>
    
   
    </footer>
</body>
</html>
