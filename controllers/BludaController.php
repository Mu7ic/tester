<?php

namespace app\controllers;

use app\models\TableBlud;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\Console\Helper\Table;
use Yii;
use app\models\Bluda;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BludaController implements the CRUD actions for Bluda model.
 */
class BludaController extends Controller
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
     * Lists all Bluda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Bluda::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bluda model.
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
     * Creates a new Bluda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bluda();



        if ($model->load(Yii::$app->request->post())) {
            $model->datecreate=time();
            $model->lastupdate=time();
            $model->status=1;
            $ing=$_POST['Bluda']['ingredient'];
            if($model->validate()){
                $model->save();
                foreach ($ing as $i){
                $this->tableBlud($model->id,$i);
                }
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }
            return $this->render('create', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing Bluda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    private function tableBlud($id_bluda,$id_ingredient,$upd=null){
        if(!is_null($upd))
            $check=$this->checkTableBlud($id_bluda,$id_ingredient);
        $new=new TableBlud();
        $new->id_bluda=$id_bluda;
        $new->id_ingredient=$id_ingredient;
        $new->datecreate=time();
        $new->lastupdate=time();
        $new->status=1;
        if(empty($check)){
        if ($new->save())
            return true;
        return false;
        }else return false;
    }

    private function checkTableBlud($id_bluda,$id_ingredient){
        return TableBlud::find()->where(['id_bluda'=>$id_bluda,'id_ingredient'=>$id_ingredient])->one();
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $ing=$_POST['Bluda']['ingredient'];
            foreach ($ing as $i){
                $this->tableBlud($model->id,$i,$i->id);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bluda model.
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
     * Finds the Bluda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bluda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bluda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
