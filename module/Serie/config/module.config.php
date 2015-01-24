<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
     'controllers' => array(
         'invokables' => array(
             'Serie\Controller\Serie' => 'Serie\Controller\SerieController',
         ),
     ),
    
     'router' => array(
         'routes' => array(
             'serie' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/serie[/][:action][/:idSerie]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'idSerie'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Serie\Controller\Serie',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'serie' => __DIR__ . '/../view',
         ),
     ),
 );