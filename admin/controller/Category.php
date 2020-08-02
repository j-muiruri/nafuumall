<?php

require_once $dir.'admin/config/Db.php';

require_once $dir.'admin/Model/CategoriesModel.php';
/**
 * Category Controller Class
 *
 * @author John Muiruri <jontedev@gmail.com>
 */
class Category extends Database
{
    /**
     * Categorys data array
     */
    public $data = array();

    // /**
    //  * ID data array
    //  */
    // public $id= array();

    /***********************************
     * Categories Section
     * 
     */


    /**
     * List All Categoriess
     */
    public function AllCategories()
    {
        $db = new Database;
        $model = new CategoryModel;

        return $model->getCategories($db);
    }

    /**
     * Get Single Category Details
     */
    public function singleCategory($id)
    {
        $db = new Database;
        $model = new CategoryModel;
        $data['cat_id'] = $id;
        //    print_r($id);
        return $model->getCategory($db, $data);
    }


    /**
     * Create a Category
     */
    public function createCategory()
    {
        $data['cat_name'] = $_POST['cat_name'];


        $db = new Database;
        $model = new CategoryModel;

        $add = $model->addCategory($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to add New Category";
            }
       
    }

     /**
     * Update Category Details
     */
    public function updateCategory()
    {
        $data['cat_id'] = $_POST['cat_id'];
        $data['cat_name'] = $_POST['cat_name'];


        $db = new Database;
        $model = new CategoryModel;

        $edit = $model->updateCategory($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to Update Category Details";
            }
       
    }
     /**
     * Delete Category
     */
    public function deleteCategory()
    {
        $data['cat_id'] = $_POST['cat_id'];


        $db = new Database;
        $model = new CategoryModel;

        $delete= $model->deleteCategory($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to delete Category";
            }
       
    }



    /***********************************
     * Sub - Categories Section
     * 
     */



      /**
     * List All sub-Categories
     */
    public function allSubs()
    {
        $db = new Database;
        $model = new CategoryModel;

        return $model->getSubs($db);
    }

    /**
     * Get Single sub-Category Details
     */
    public function singleSub($id)
    {
        $db = new Database;
        $model = new CategoryModel;
        $data['cat_id'] = $id;
        //    print_r($id);
        return $model->getSub($db, $data);
    }


    /**
     * Create a sub-Category
     */
    public function createSub()
    {
        $data['cat_name'] = $_POST['cat_name'];


        $db = new Database;
        $model = new CategoryModel;

        $add = $model->addSub($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to add New Category";
            }
       
    }

     /**
     * Update sub-Category Details
     */
    public function updateSub()
    {
        $data['cat_id'] = $_POST['cat_id'];
        $data['cat_name'] = $_POST['cat_name'];


        $db = new Database;
        $model = new CategoryModel;

        $edit = $model->updateSub($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to Update Category Details";
            }
       
    }
     /**
     * Delete sub-Category
     */
    public function deleteSub()
    {
        $data['cat_id'] = $_POST['cat_id'];


        $db = new Database;
        $model = new CategoryModel;

        $delete= $model->deleteSub($db,$data);

            if ($add) {
                return true;
            } else {
                return "Error: Unable to delete Category";
            }
       
    }
    
}