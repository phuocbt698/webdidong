<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/database/config.php";

    function execute($sql)
    {
        $conn = mysqli_connect(HOST_NAME, USER_NAME, USER_PASS, DB_NAME);
        $conn->set_charset('utf8');
        if (!$conn)
        {
            die('Connection failed: '. mysqli_connect_error());
        }

        mysqli_query($conn, $sql);

        mysqli_close($conn);

    }

    //isSingle check xem lấy ra 1 danh sách hay chỉ một bản ghi mặc đinh là 1 danh sách
    function executeResult($sql, $isSingle = false)
    {
        $conn = mysqli_connect(HOST_NAME, USER_NAME, USER_PASS, DB_NAME);
        $conn->set_charset('utf8');
        if (!$conn)
        {
            die('Connection failed: '. mysqli_connect_error());
        }

        $result = mysqli_query($conn, $sql);

        $data = null;

        if ($isSingle)
        {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        else
        {
            $data = [];
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != null)
            {
                $data[] = $row;
            }
        }

        mysqli_close($conn);

        return $data;


    }

?>