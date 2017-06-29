<?php

namespace app\controllers;

use Yii;
use app\models\Procesos;
use app\models\Propietarios;
use app\models\Recepcionclinica;
use app\models\Referidos;
use app\models\Mascotas;
use app\models\Planes;
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
            
                /*procesos*/
                $procesos = new Procesos();
                $procesos->fecha_serv=$model->fecha_serv;
                $procesos->procesos_libro=$model->procesos_libro;
                $procesos->procesos_pagina=$model->procesos_pagina;
                $procesos->procesos_linea=$model->procesos_linea;
                $procesos->save(false);
               
                return $this->redirect(['index']);
            
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
        $procesos_2 = $this->findModel($id);
        $propietarios_=Propietarios::findBySql('SELECT * FROM propietarios WHERE propietarios_id ='.$procesos_2->propietarios_id)->one();
        $mascotas_=Mascotas::findBySql('SELECT * FROM mascotas WHERE mascotas_id ='.$procesos_2->mascotas_id)->one();
        $referidos_=Referidos::findBySql('SELECT * FROM referidos WHERE referidos_id ='.$procesos_2->referidos_id)->one();
        $recepcion_=Recepcionclinica::findBySql('SELECT * FROM recepcion WHERE mascotas_id ='.$procesos_2->mascotas_id)->one();
        /*$planes_=Planes::findBySql('SELECT * FROM planes WHERE planes_id ='.$procesos_2->planes_nombre);*/
        
        $model = new Newsform();
            /*propietarios*/
            $model->propietarios_doc=$propietarios_->propietarios_doc;
            $model->propietarios_nombre=$propietarios_->propietarios_nombre;
            $model->propietarios_apellido=$propietarios_->propietarios_apellido;
            $model->propietarios_telf=$propietarios_->propietarios_telf;
            /*end propietarios*/
            /*mascota*/
            $model->mascotas_nombre=$mascotas_->mascotas_nombre;
            $model->mascotas_peso=$mascotas_->mascotas_peso;
            $model->mascotas_edad=$mascotas_->mascotas_edad; 
            $model->mascotas_raza=$mascotas_->mascotas_raza;
            $model->mascotas_fdef=$mascotas_->mascotas_fdef;
            $model->id_tipo=$mascotas_->id_tipo;
            /*end mascotas*/
            /*referidos*/   
            $model->referidos_nombre=$referidos_->referidos_nombre;
            $model->referidos_telf=$referidos_->referidos_telf;
            $model->referidos_email=$referidos_->referidos_email; 
            /*end referidos*/
            /*procesos*/               
            $model->fecha_serv=$procesos_2->fecha_serv;
            $model->procesos_libro=$procesos_2->procesos_libro;
            $model->procesos_pagina=$procesos_2->procesos_pagina;
            $model->procesos_linea=$procesos_2->procesos_linea;
            /*end procesos*/
            $model->propietarios_id=$propietarios_->propietarios_id;
            
        if ($model->load(Yii::$app->request->post())) {
            
            /*propietarios*/
            $propietarios_->propietarios_doc=$model->propietarios_doc;
            $propietarios_->propietarios_nombre=$model->propietarios_nombre;
            $propietarios_->propietarios_apellido=$model->propietarios_apellido;
            $propietarios_->propietarios_telf=$model->propietarios_telf;
            $propietarios_->save(false);
            /*procesos*/
            $mascotas_->mascotas_nombre=$model->mascotas_nombre;
            $mascotas_->mascotas_peso=$model->mascotas_peso;      
            $mascotas_->mascotas_raza=$model->mascotas_raza;
            $mascotas_->mascotas_edad=$model->mascotas_edad;
            $mascotas_->mascotas_fdef=$model->mascotas_fdef;
            $mascotas_->id_tipo=$model->id_tipo;
            $mascotas_->save(false);
            /*referidos*/  
            $referidos_->referidos_nombre=$model->referidos_nombre;
            $referidos_->referidos_telf=$model->referidos_telf;
            $referidos_->referidos_email=$model->referidos_email;
            $referidos_->save(false);
            /*end referidos*/

            $procesos_2->fecha_serv=$model->fecha_serv;
            $procesos_2->procesos_libro=$model->procesos_libro;
            $procesos_2->procesos_pagina=$model->procesos_pagina;
            $procesos_2->procesos_linea=$model->procesos_linea;
            $procesos_2->save(false);

           
            return $this->redirect(['view','id'=>$procesos_2->procesos_id]);
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
            'format' => Pdf::FORMAT_LETTER, 
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
