<?php

class Connect 
{

    private $con;

    function Connect($server,$username,$password,$dbname)
    {
        $this->con = mysqli_connect($server,$username,$password,$dbname);
    }

    function excutequery($query)
    {
        return mysqli_query($this->con,$query);
    }

    function getrowsnum($query)
    {
        $result = null;
        $result = $this->excutequery($query);
        if($result != null)    return mysqli_num_rows($result);
        return 0;
    }

    function tojson($query)
    {
        $result = null;
        $result = $this->excutequery($query);
        if($result != null)
        {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result))    $rows[] = $row;
            return json_encode($rows);
        }
        return null;
    }

    function closecon()
    {
        mysqli_close($this->con);
    }

}

?>