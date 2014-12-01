<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ItemController extends CController
{
    public function actionCreate()
    {
        $model=new Item;
        if(isset($_POST['Item']))
        {
            $model->attributes=$_POST['Item'];
            $model->image=CUploadedFile::getInstance($model,'image');
//            if($model->save())
//            {
//                $model->image->saveAs('path/to/localFile');
//                // redirect to success page
//            }
            
            if($model->validate()) {
                //The image is valid, you can save it
                $path = 'assets/img/'.$model->image;
                $model->image->saveAs($path);
            }
        }
        $this->render('create', array('model'=>$model));
    }
}


?>
