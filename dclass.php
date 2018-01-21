<?php
    class share{
        public $medoo;
        public function __construct(){
            $this->medoo=new  medoo([
                // required
                'database_type' => 'mysql',
                'database_name' => 'share',
                'server' => 'localhost',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
                'port' => 3306,
                'prefix' => 'share_'
            ]);
        }
        public function add_share($file,$password=''){//md5
            if(is_file($file) || is_dir($file)){
                $short=$this->short($file);
                $insert['short']=$short;
                $insert['time']=time();
                $insert['file']=$file;
                $insert['password']=$this->hash($password);
                return $this->medoo->insert('share',$insert);
            }else{
                return false;
            }
         
        }
        public function hash($password){
            if($password){
                return hash('sha256',$password);
            }else{
                return '';
            }
        }
        public function verify_share($short,$password){
            $info=$this->is_short($short);
            if($info){
                if($this->hash($password)==$info['password']){
                    $this->addcount_share($short);
                    $this->view_count($short);
                    return $info['file'];
                }
            }
        }
        public function view_count($short){
            $insert['ip']=$_SERVER['REMOTE_ADDR'];
            $insert['time']=time();
            $insert['short']=$short;
            $insert['server']=json_encode($_SERVER);
            $insert['cookie']=json_encode($_COOKIE);
            $this->medoo->insert('count',$insert);
        }
        public function count_share($short){
            if($info=$this->is_count($short)){
                return $info['count'];
            }else{
                return 0;
            }
        }
        public function del_share($short){
            $where['short']=$short;
            $update['del']=time();
            return $this->medoo->update('share',$update,$where);            
        }
        public function addcount_share($short){
            $where['short']=$short;
            if($info=$this->is_short($short)){
                $info['count']++;
                $this->medoo->update('share',$info,$where);
            }
        }
        public function nopassword($short){
            if($this->show_share($short)=='file'){
                $this->addcount_share($short);
                $this->view_count($short);
                $info=$this->is_short($short);
                return $info['file'];
            }else{
                return false;
            }
        }
        public function show_share($short){
            if($info=$this->is_short($short)){
                if($info['password']){
                    //存在密码
                    return 'password';
                }else{
                    //不存在密码
                    return 'file';
                }
            }else{
                return false;//无文件
            }

        }
        public function is_short($short){
            $where['AND']['short']=$short;
            $where['AND']['del']=0;
            $info=$this->medoo->select('share',["short","password","file","count"],$where);
            if($info){
                return $info[0];
            }else{
                return false;
            }
        }
        public function short($file){
            $key=hash('sha256',$file);//返回KEY
            $key=hash('sha256',$key.mt_rand(1000,9999));
            if($this->is_short($key)){
               return $this->short($file);
            }else{
                return $key;
            }
        }
        public function file($file,$get){
            //传入session的file $_SESSION['file'];
            $where['file']=$file;
            $info=$this->medoo->select('share','*',$where);
            if($info){
                if($info[0]['file']==$get){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
    }
