<?php

class TestController extends CController
{
    public function actions()
    {
        return array(
            'hoge'=>'application.controllers.test.hogeAction',
        );
    }

	public function actionIndex()
	{
		// empty
	}
}
