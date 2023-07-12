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
    public function display_info()
    {
        $query = "SELECT * FROM student_info";
        if (mysqli_query($this->conn, $query)) {
            $return_data = mysqli_query($this->conn, $query);
            return $return_data;
        }
    }
    public function display_info_by_id($id)
    {
        $query = "SELECT * FROM student_info WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            $return_data = mysqli_query($this->conn, $query);
            $student_data = mysqli_fetch_assoc($return_data);
            return $student_data;
        }
    }
    public function updateData($data)
    {
        $id = $data['u_id'];
        $name = $data['u_name'];
        $roll = $data['u_roll'];
        $reg = $data['u_reg'];
        $img = $_FILES['u_img']['name'];
        $temp_name = $_FILES['u_img']['tmp_name'];

        $query = "UPDATE student_info SET name='$name', roll='$roll', reg='$reg', img='$img' WHERE id=$id";

        if (mysqli_query($this->conn, $query)) {
            move_uploaded_file($temp_name, 'upload/' . $img);
            return "information Update Successfully";
        }
    }

    public function delete_info($id)
    {
        $query = "DELETE FROM student_info WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            return "Info Deleted Successfully";
        }
    }
}
