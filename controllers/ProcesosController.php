<?php

namespace app\controllers;

use Yii;
use app\models\Procesos;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Mascotas;
use app\models\ProcesosSearch;
use app\models\Newsform;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


/**
 * ProcesosController implements the CRUD actions for Procesos model.
 */
class ProcesosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Procesos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProcesosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Procesos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Procesos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
/*
$mascotas->mascotas_nombre=$model->mascotas_nombre;
$mascotas->mascotas_peso=$model->mascotas_peso;
*/

    public function actionCreate()
    {
        $model = new Newsform();

        if ($model->load(Yii::$app->request->post()) ) {
            /*propietarios*/
            // var_dump($model);
            $cedula=Propietarios::find()->where(['propietarios_doc'=>$model->propietarios_doc])->one();

            if(empty($cedula)){

            $propietarios = new Propietarios();
            $propietarios->propietarios_doc=$model->propietarios_doc;
            $propietarios->propietarios_nombre=$model->propietarios_nombre;
            $propietarios->propietarios_apellido=$model->propietarios_apellido;
            $propietarios->propietarios_telf=$model->propietarios_telf;
            $propietarios->propietarios_email=$model->propietarios_email;
            $propietarios->save(false);
            /*end propietarios*/
            }
            else{
                $propietarios=$cedula;
            }
            /*mascotas*/
                $mascotas= new Mascotas();
                $mascotas->mascotas_nombre=$model->mascotas_nombre;
                $mascotas->mascotas_peso=$model->mascotas_peso;
                $mascotas->mascotas_tipo=$model->mascotas_tipo;
                $mascotas->mascotas_raza=$model->mascotas_raza;
                $mascotas->propietarios_id=$propietarios->propietarios_id;
                $mascotas->save(false);
                /* end mascotas*/
                /*referidos*/
            
            $email_ref=Referidos::find()->where(['referidos_email'=>$model->referidos_email])->one();
            if(empty($email_ref)){

                $referidos = new Referidos();
                $referidos->referidos_nombre=$model->referidos_nombre;
                $referidos->referidos_telf=$model->referidos_telf;
                $referidos->referidos_email=$model->referidos_email;
                $referidos->save(false);
                /*end referidos*/
            }
            else{
                $referidos=$email_ref;
            }
                /*procesos*/
                $procesos = new Procesos();
                $procesos->propietarios_id=$propietarios->propietarios_id;
                $procesos->mascotas_id=$mascotas->mascotas_id;
                $procesos->referidos_id=$referidos->referidos_id;
                $procesos->fecha_ing=$model->fecha_ing;
                $procesos->fecha_serv=$model->fecha_serv;
                $procesos->obs=$model->obs;
                $procesos->planes_id=$model->planes_nombre;
                $procesos->procesos_libro=$model->procesos_libro;
                $procesos->procesos_pagina=$model->procesos_pagina;
                $procesos->procesos_linea=$model->procesos_linea;
                $procesos->save(false);
               
                return $this->redirect(['index']);


            // end procesos

            
        } else {
            
            return $this->render('create', [
                'model' => $model,
                //'data' => $data,

            ]);
        }
    }

    /**
     * Updates an existing Procesos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $procesos_ = $this->findModel($id);
        $propietarios_=Propietarios::findBySql('SELECT * FROM propietarios WHERE propietarios_id ='.$procesos_->propietarios_id)->one();
        $mascotas_=Mascotas::findBySql('SELECT * FROM mascotas WHERE mascotas_id ='.$procesos_->mascotas_id)->one();
        $referidos_=Referidos::findBySql('SELECT * FROM referidos WHERE referidos_id ='.$procesos_->referidos_id)->one();
        /*$planes_=Planes::findBySql('SELECT * FROM planes WHERE planes_id ='.$procesos_->planes_nombre);*/

        $model = new Newsform();
            
            $model->propietarios_doc=$propietarios_->propietarios_doc;
            $model->propietarios_nombre=$propietarios_->propietarios_nombre;
            $model->propietarios_apellido=$propietarios_->propietarios_apellido;
            $model->propietarios_telf=$propietarios_->propietarios_telf;
            $model->propietarios_email=$propietarios_->propietarios_email;
  
            $model->mascotas_nombre=$mascotas_->mascotas_nombre;
            $model->mascotas_peso=$mascotas_->mascotas_peso;
            $model->mascotas_tipo=$mascotas_->mascotas_tipo;
            $model->mascotas_raza=$mascotas_->mascotas_raza;
            /*referidos*/
            
            $model->referidos_nombre=$referidos_->referidos_nombre;
            $model->referidos_telf=$referidos_->referidos_telf;
            $model->referidos_email=$referidos_->referidos_email;        
            /*end referidos*/
            /*procesos*/               
            $model->fecha_ing=$procesos_->fecha_ing;
            $model->fecha_serv=$procesos_->fecha_serv;
            $model->obs=$procesos_->obs;
            $model->procesos_libro=$procesos_->procesos_libro;
            $model->procesos_pagina=$procesos_->procesos_pagina;
            $model->procesos_linea=$procesos_->procesos_linea;

            $model->planes_nombre=$procesos_->planes_id;
            
        if ($model->load(Yii::$app->request->post())) {
            /*propietarios*/
            
            $propietarios_->propietarios_doc=$model->propietarios_doc;
            $propietarios_->propietarios_nombre=$model->propietarios_nombre;
            $propietarios_->propietarios_apellido=$model->propietarios_apellido;
            $propietarios_->propietarios_telf=$model->propietarios_telf;
            $propietarios_->propietarios_email=$model->propietarios_email;
            $propietarios_->save(false);
            /*end propietarios*/
            /*mascotas*/
            
            $mascotas_->mascotas_nombre=$model->mascotas_nombre;
            $mascotas_->mascotas_peso=$model->mascotas_peso;
            $mascotas_->mascotas_tipo=$model->mascotas_tipo;
            $mascotas_->mascotas_raza=$model->mascotas_raza;
            $mascotas_->save(false);
            /* end mascotas*/
            /*referidos*/
            
            $referidos_->referidos_nombre=$model->referidos_nombre;
            $referidos_->referidos_telf=$model->referidos_telf;
            $referidos_->referidos_email=$model->referidos_email;
            $referidos_->save(false);
            /*end referidos*/
            /*procesos*/
            
            // $procesos_->propietarios_id=$propietarios->propietarios_id;
            // $procesos_->mascotas_id=$mascotas->mascotas_id;
            // $procesos_->referidos_id=$referidos->referidos_id;
            $procesos_->fecha_ing=$model->fecha_ing;
            $procesos_->fecha_serv=$model->fecha_serv;
            $procesos_->obs=$model->obs;
            $procesos_->planes_id=$model->planes_nombre;
            $procesos_->procesos_libro=$model->procesos_libro;
            $procesos_->procesos_pagina=$model->procesos_pagina;
            $procesos_->procesos_linea=$model->procesos_linea;
           
            $procesos_->save(false);
           
            return $this->redirect(['view','id'=>$procesos_->procesos_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Procesos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Procesos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Procesos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Procesos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /*pdf*/

 
    public function actionPdf($id) {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('pdf', [
            'model' => $this->findModel($id),
        ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => 
            '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Ecolpets'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>[''], 
                'SetFooter'=>[''],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

}
