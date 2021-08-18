<?php

class plugin_parser
{
    public function get_plugins()
    {
        $file = "./plugins/plugin-list.json";
        $file_data = json_decode(file_get_contents($file, true));
        if (is_null($file_data)) {
            echo "<br>";
            echo json_last_error();
            echo "<br>";
            die("Something dun gone blowed up!");
        }
        echo '<div class="container d-flex flex-row-reverse my-2">';        
            
          echo '<div class="row align-items-center mr-3 mt-3">';
          echo '</div>';
        echo '</div>';
        echo '<div class ="list-view" style="display:block;" id="list-type">';
        echo '<div class="row">';
        foreach ($file_data as $plugin){

            if ($plugin -> status == "enabled") {
                $str = '<div class="col-lg-2 d-flex my-1 ">';
                $str .= '<div class="card shadow-sm text-center"> <form action="/launcher.php" method="POST" enctype="multipart/form-data">';
                $str .= ' <input type="hidden" id="plugin" name="plugin" value="'.$plugin->name.'">';
                $str .= '<div class="card-header text-white font-weight-bolder" style="background:#454d55;">'.$plugin->fullname.'</div>';
                $str .= '<div class="logo-container">';
                $str .= '<img class="card-img-top plugin-logo" src=' ;
                $str .= $plugin->image;
                $str .= '>';
                $str .= '</div>';
                $str .= '<p class="card-text" style="margin-bottom:50px;">'.$plugin->description.'</p>';
                $str .= '<button type="button" class="btn btn-success" style ="position:absolute; bottom:0; left:0%; width:100%;" data-toggle="modal" data-target="#list-'.$plugin->name.'">Uruchom</button>';
                $str .= '<div class="modal fade" tabindex="-1" role="dialog" id="list-'.$plugin->name.'">';
                $str .= '<div class="modal-dialog modal-dialog-centered" role="document">';
                $str .= '<div class="modal-content"><div class="modal-header"><h5 class="modal-title">'.$plugin->name.'</h5>';
                $str .= '<button type="button" class="close mt-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                $str .= '<div class="modal-body">';
                if (!(empty($plugin->select))){
                        $str .= '<label for="selected">Wybierz Opcję</label><br>';
                        $str .= '<select class="form-control" name="selected" id="selected">';
                    foreach ($plugin -> select as $select) {
                        $str .= '<option value="'.$select.'">'.$select.'</option>';
                    }
                }
                if (!(empty($plugin->parameters))){
                    foreach ($plugin -> parameters as $params) {
                        $str .= '<label for="'.$params.'">Podaj atrybut - '.$params.'</label><br>';
                        $str .= '<input class="" type="text" id="'.$params.'" name="parameter[]" required><br>';
                    }
                }
                if (!(empty($plugin->upload))){

                    $str .= '<input class="file-button" name="upload[]" id="file" type="file" required multiple>';
                }
                $str .= '</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button><button class="btn btn-secondary" type="submit">Uruchom</button></div>';
                $str .= '</div></div></div>';
                $str .= '</form></div></div><br>';
                echo $str;
            }

        }


        echo '</div>';
        echo '</div>';


    }
}

