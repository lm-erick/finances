<?php

class Utils
{

    public function load_model($model_name = false)
    {

        if (!$model_name) return;

        $model_name =  strtolower($model_name);

        $model_path = DIR . '/models/' . $model_name . '.php';

        if (file_exists($model_path)) {

            require_once $model_path;

            $model_name = explode('/', $model_name);

            $model_name = end($model_name);

            $model_name = preg_replace('/[^a-zA-Z0-9]/is', '', $model_name);

            if (class_exists($model_name)) {

                return new $model_name();
            }

            return;
        }
    }

    public function conectdb() {

        return new PDO('mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

    }

}
