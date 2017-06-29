<?php

namespace app\controllers;

use Yii;
use app\models\Procesos;
use app\models\Recepcionclinica;
use app\models\Propietarios;
use app\models\Referidos;
use app\models\Mascotas;
use app\models\MascotasSearch;
use app\models\RecepcionclinicaSearch;
use app\models\Newsform;
use app\models\Planes;
use app\models\Urnas;
use app\models\Tipos;
use app\models\Devolucion;
use app\models\Select;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


/**
 * ProcesosController implements the CRUD actions for Procesos model.
 */
class RecepcionclinicaController extends Controller
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
        $searchModel = new RecepcionclinicaSearch();
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

                $cedula=Propietarios::find()->where(['propietarios_doc'=>$model->propietarios_doc])->one();

                if(empty($cedula)){

                    $propietarios = new Propietarios();
                    $propietarios->propietarios_doc=$model->propietarios_doc;
                    $propietarios->propietarios_nombre=$model->propietarios_nombre;
                    $propietarios->propietarios_apellido=$model->propietarios_apellido;
                    $propietarios->propietarios_telf=$model->propietarios_telf;
                    $propietarios->propietarios_dir=$model->propietarios_dir;
                    $propietarios->propietarios_cel=$model->propietarios_cel;
                    $propietarios->save(false);
                    /*end propietarios*/
                }
                else{
                    $propietarios=$cedula;
                }
                /*referidos*/
                    $email_ref=Referidos::find()->where(['referidos_email'=>$model->referidos_email])->one();
                    if(empty($email_ref)){

                    $referidos = new Referidos();
                    $referidos->referidos_nombre=$model->referidos_nombre;
                    $referidos->cod_registro=$model->cod_registro;
                    $referidos->referidos_telf=$model->referidos_telf;
                    $referidos->referidos_email=$model->referidos_email;
                    $referidos->referidos_dir=$model->referidos_dir;
                    $referidos->referidos_nit=$model->referidos_nit;
                    $referidos->referidos_rep=$model->referidos_rep;
                    $referidos->referidos_ced=$model->referidos_ced;
                        $referidos->save(false);
                    }
                    else{
                        $referidos=$email_ref;
                    }
                /*end referidos*/  
                /*mascotas*/
                $mascotas= new Mascotas();
                $mascotas->propietarios_id=$propietarios->propietarios_id;
                $mascotas->mascotas_nombre=$model->mascotas_nombre;
                $mascotas->mascotas_peso=$model->mascotas_peso;
                $mascotas->mascotas_edad=$model->mascotas_edad;
                $mascotas->mascotas_raza=$model->mascotas_raza;
                $mascotas->mascotas_fdef=$model->mascotas_fdef;
                $mascotas->id_tipo=$model->id_tipo;
                    $mascotas->save(false);
                /* end mascotas*/
                /* procesos*/
                $procesos = new Procesos();
                $procesos->propietarios_id=$propietarios->propietarios_id;
                $procesos->mascotas_id=$mascotas->mascotas_id;
                $procesos->referidos_id=$referidos->referidos_id;
                $procesos->fecha_ing=$model->recepcion_fecha;
                $procesos->planes_id=$model->planes_id;
                    $procesos->save(false);
                /*en procesos*/ 
                /*recepcion*/
                $recepcion = new Recepcionclinica();
                $recepcion->procesos_id=$procesos->procesos_id;
                $recepcion->cod_registro=$referidos->cod_registro;
                $recepcion->propietarios_id=$propietarios->propietarios_id;
                $recepcion->mascotas_id = $mascotas->mascotas_id;
                $recepcion->urna_id=$model->urna_id;
                $recepcion->referidos_id=$referidos->referidos_id;
                $recepcion->devolucion_id=$model->devolucion_id;
                $recepcion->planes_id=$model->planes_id;
                $recepcion->recepcion_fecha=$model->recepcion_fecha;
                $recepcion->fecha_programada=$model->fecha_programada;
                $recepcion->hora_programada=$model->hora_programada;
                $recepcion->id_tipo=$model->id_tipo;
                    $recepcion->save(false);
                /*end recepcion*/              
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
        $recepcion_ = $this->findModel($id);
        $mascotas_=Mascotas::findBySql('SELECT * FROM mascotas WHERE mascotas_id ='.$recepcion_->mascotas_id)->one();
        $referidos_=Referidos::findBySql('SELECT * FROM referidos WHERE referidos_id ='.$recepcion_->referidos_id)->one();
        $procesos_=Procesos::findBySql('SELECT * FROM procesos WHERE mascotas_id ='.$recepcion_->mascotas_id)->one();
        $propietarios_=Propietarios::findBySql('SELECT * FROM propietarios WHERE propietarios_id ='.$recepcion_->propietarios_id)->one();
        $tipos_=Tipos::findBySql('SELECT * FROM tipos WHERE id_tipo ='.$recepcion_->id_tipo)->one();
        /*$planes_=Planes::findBySql('SELECT * FROM planes WHERE planes_id ='.$procesos_->planes_nombre);*/

        $model = new Newsform();
            /*propietarios*/
            $model->propietarios_doc=$propietarios_->propietarios_doc;
            $model->propietarios_nombre=$propietarios_->propietarios_nombre;
            $model->propietarios_apellido=$propietarios_->propietarios_apellido;
            $model->propietarios_telf=$propietarios_->propietarios_telf;
            $model->propietarios_dir=$propietarios_->propietarios_dir;
            $model->propietarios_cel=$propietarios_->propietarios_cel;
            /* end propietarios*/
            /*mascotas*/
            $model->mascotas_nombre=$mascotas_->mascotas_nombre;
            $model->mascotas_peso=$mascotas_->mascotas_peso;
            $model->mascotas_edad=$mascotas_->mascotas_edad; 
            $model->mascotas_raza=$mascotas_->mascotas_raza;
            $model->mascotas_fdef=$mascotas_->mascotas_fdef;
            $model->id_tipo=$mascotas_->id_tipo;
            /*end mascotas*/
            /*referidos*/   
            $model->referidos_nombre=$referidos_->referidos_nombre;
            $model->cod_registro=$referidos_->cod_registro;
            $model->referidos_telf=$referidos_->referidos_telf;
            $model->referidos_email=$referidos_->referidos_email;
            $model->referidos_dir=$referidos_->referidos_dir;
            $model->referidos_nit=$referidos_->referidos_nit;
            $model->referidos_rep=$referidos_->referidos_rep;
            $model->referidos_ced=$referidos_->referidos_ced;
            /*end referidos*/
            /*recepcion*/
            $model->urna_id=$recepcion_->urna_id;
            $model->cod_registro=$recepcion_->cod_registro;
            $model->devolucion_id=$recepcion_->devolucion_id;
            $model->planes_id=$recepcion_->planes_id;
            $model->urna_id=$recepcion_->urna_id;
            $model->referidos_id=$recepcion_->referidos_id;
            $model->fecha_programada=$recepcion_->fecha_programada;
            $model->hora_programada=$recepcion_->hora_programada;
            $model->id_tipo=$recepcion_->id_tipo;
            /*en recepcion*/
            /*procesos*/
            $model->propietarios_id=$procesos_->propietarios_id;
            $model->mascotas_id=$procesos_->mascotas_id;
            $model->referidos_id=$procesos_->referidos_id;
            $model->recepcion_fecha=$procesos_->fecha_ing;
            $model->planes_id=$procesos_->planes_id;
            /*end procesos*/

        if ($model->load(Yii::$app->request->post())) {
            /*propietarios*/
            $propietarios_->propietarios_doc=$model->propietarios_doc;
            $propietarios_->propietarios_nombre=$model->propietarios_nombre;
            $propietarios_->propietarios_apellido=$model->propietarios_apellido;
            $propietarios_->propietarios_telf=$model->propietarios_telf;
            $propietarios_->propietarios_cel=$model->propietarios_cel;
            $propietarios_->propietarios_dir=$model->propietarios_dir;
            $propietarios_->save(false);
            /*end propietarios*/
            /*referidos*/  
            $referidos_->referidos_nombre=$model->referidos_nombre;
            $referidos_->cod_registro=$model->referidos_nombre;
            $referidos_->referidos_telf=$model->referidos_telf;
            $referidos_->referidos_email=$model->referidos_email;
            $referidos_->referidos_dir=$model->referidos_dir;
            $referidos_->referidos_nit=$model->referidos_nit;
            $referidos_->referidos_rep=$model->referidos_rep;
            $referidos_->referidos_ced=$model->referidos_ced;
            $referidos_->save(false);
            /*end referidos*/
            /*mascotas*/
            $mascotas_->propietarios_id=$model->propietarios_id;  
            $mascotas_->mascotas_nombre=$model->mascotas_nombre;
            $mascotas_->mascotas_peso=$model->mascotas_peso;      
            $mascotas_->mascotas_raza=$model->mascotas_raza;
            $mascotas_->mascotas_edad=$model->mascotas_edad;
            $mascotas_->mascotas_fdef=$model->mascotas_fdef;
            $mascotas_->id_tipo=$model->id_tipo;
            $mascotas_->save(false);
            /* end mascotas*/
            /*recepcion*/

            $recepcion_->urna_id=$model->urna_id;
            $recepcion_->cod_registro=$model->cod_registro;
            $recepcion_->referidos_id=$model->referidos_id; 
            $recepcion_->devolucion_id=$model->devolucion_id;
            $recepcion_->planes_id=$model->planes_id;
            $recepcion_->recepcion_fecha=$model->recepcion_fecha;
            $recepcion_->fecha_programada=$model->fecha_programada;
            $recepcion_->hora_programada=$model->hora_programada;
            $recepcion_->id_tipo=$model->id_tipo;
            $recepcion_->save(false);
            /*end recepcion*/
            /*procesos*/
            $procesos_->propietarios_id=$model->propietarios_id;
            $procesos_->mascotas_id=$model->mascotas_id;
            $procesos_->referidos_id=$model->referidos_id;
            $procesos_->fecha_ing=$model->recepcion_fecha;
            $procesos_->planes_id=$model->planes_id;
            $procesos_->save(false);
            /*end procesos*/
            return $this->redirect(['view','id'=>$recepcion_->recepcion_id]);
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
        if (($model = Recepcionclinica::findOne($id)) !== null) {
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
            'orientation' => Pdf::ORIENT_PORTRAIT, 
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
