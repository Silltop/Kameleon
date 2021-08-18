<?php

class plugin_launcher
{
    public function run_plugin(string $plugin_name, array $parmeters, array $uploaded_files, string $selected)
    {
        $file = "./plugins/plugin-list.json";
        $file_data = json_decode(file_get_contents($file, true));
        foreach ($file_data as $plugin) {
            if ($plugin->name == $plugin_name) {
                if ($plugin->status == "enabled") {

                    if ($plugin->language == "python"){
                        $params_str = " ";

                        if (!(empty($plugin->parameters))){
                            $iterator = 0;
                            foreach ($plugin -> parameters as $params) {
                                $params_str .= "--";
                                $params_str .= $params;
                                $params_str .= " \"";
                                $params_str .= $parmeters[$iterator];
                                $params_str .= "\" ";
                                $iterator += 1;
                            }
                            
                        }
                        $params_str = str_replace("'","",$params_str);
                        $params_str = str_replace("|","*",$params_str);
                        $params_str = str_replace(">","*",$params_str);
                        $params_str = str_replace("<","*",$params_str);
                        $params_str = str_replace(">>","*",$params_str);
                        $params_str = str_replace("<<","*",$params_str);
                        echo $params_str;
                        if (!(empty($plugin->upload))){
                            $output = shell_exec('python3 .'.$plugin->path.$params_str.join(' ',$uploaded_files));
                        }
                        else
                        {
                            $output = shell_exec('python3 .'.$plugin->path.$params_str);
                        }
                        echo $output;
                    }
                    if ($plugin->language == "java"){
                        $params_str = " ";
                        foreach ($parmeters as $params){
                            $params_str .= $params;
                            $params_str .= " ";
                        }
                        $output = shell_exec('java -jar .'.$plugin->path.$params_str);
                        echo $output;
                    }
                    if ($plugin->language == "php"){
                        echo $plugin->path;
                        header('Location: '.$plugin->path);
                        exit();
                    }
                    if ($plugin->language == "maven"){
                        echo $plugin->path;
                        $_SESSION['files'] = $uploaded_files;
                        header('Location: '.$plugin->path);
                        exit();
                    }
                }
                else{
                    die();
                }
            }
        }
    }
}