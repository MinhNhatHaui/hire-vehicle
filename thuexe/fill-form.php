<?php
/**
 * Created by PhpStorm.
 * User: minhnhat
 * Date: 08/06/2018
 * Time: 09:19
 */
    class Database
    {
        public $link;

        public function __construct()
        {
            $this->link = mysqli_connect("localhost","root","root","test");
            mysqli_set_charset($this->link,"utf-8");
        }

        public function insert( array $data)
        {
            $id = "ALTER TABLE members AUTO INCREMENT = 1";
            mysqli_query($this->link,$id);
            $sql_insert = "INSERT INTO members ";
            $column = implode(',',array_keys('data'));
            $values = "";
            $sql_insert .= '('.$column.')';
            foreach ($data as $field => $value ){
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->link,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->link,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql_insert .= " VALUES (" . $values. ") ";
//            var_dump($sql_insert);
            mysqli_query($this->link, $sql_insert) or die("Loi insert, kiem tra lai" .mysqli_error($this->link));
            return mysqli_insert_id($this->link);
        }

        public function getMembers(){
            $sqlGet = "Select * from members";
            $result = mysqli_query($this->link, $sqlGet) or die("Loi getMembers, kiem tra lai". mysqli_error($this->link));
            $data = [];
            if($result){
                while($num = mysqli_fetch_assoc($result)){
                    $data[] = $num;
                }
                return $data;
            }
        }

        public function getPerson($surname, $email){
            $sqlGet = "SELECT * from members where surname = {$surname} or email = $email";
            $sqlGet .= " LIMIT 1";
            $result = mysqli_query($this->link, $sqlGet) or die("Loi getPerson, kiem tra lai". mysqli_error($this->link));
            return mysqli_fetch_assoc($result);
        }

    }

?>