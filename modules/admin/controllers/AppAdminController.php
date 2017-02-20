<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\admin\controllers;

use yii\web\controller;
use yii\filters\AccessControl; 

class AppAdminController extends Controller{
    
    public function behaviors(){
        
        return[
            'access' =>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
        
    }
}
