<?php

class crud
{
    private $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student";

        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->conn) {
            die("Connection Failed");
        }
    }
    public function add_info($data)
    {
        $name = $data['name'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $img = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];

        $query = "INSERT INTO student_info (name,roll,reg,img) VALUE ('$name','$roll','$reg','$img')";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_name, "upload/" . $img);
            $return_msg = "Information Added Seccessfully";

            return $return_msg;
        }
    }
}
