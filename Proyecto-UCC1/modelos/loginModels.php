<?php
    
        if($petiAjax){
            require_once "../core/mainModel.php";

        }else{

            require_once "./core/mainModel.php";
        }   

        class loginModels extends mainModel{

            protected function init_session_model($datoss){
                $sql=mainModel::connection()->prepare("SELECT * FROM cuenta WHERE Acc_account=:User AND Acc_pass=:pass AND Acc_estado='1'");
                $sql->bindParam(':User',$datoss['User']);
                $sql->bindParam(':pass',$datoss['pass']);
                $sql->execute();
                return $sql;
            }

        }
