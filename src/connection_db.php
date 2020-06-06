<?php

class Database
{
    /* Database Credentials */
    private $host = "ec2-174-129-227-128.compute-1.amazonaws.com";
    private $username = "qkegzynyaaqrdp";
    private $password = "1c379ba54fe9360b84cf53f3b192371aece306845bd811baac805c71bc4443d9";
    private $db = "darunuvqnkoa5f";
    private $port = 5432;
    public $connectionString;

    /* Connect Function */
    public function Connect()
    {
        /* Make Connection String */
        $this->connectionString = new PDO('pgsql:host=ec2-174-129-227-128.compute-1.amazonaws.com;dbname=darunuvqnkoa5f', 'qkegzynyaaqrdp', '1c379ba54fe9360b84cf53f3b192371aece306845bd811baac805c71bc4443d9');

        /* Check if the connection has an error, if yes then output the error, else output Connected. */
        if (!$this->connectionString) echo "nemaaa";

        $this->connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    /* Create Function */
    public function Create($name, $age, $catInfo, $catWins, $catLoss, $image)
    {
        $query="INSERT INTO cats_base_data(name, age, catInfo, wins, loss, img) VALUES('$name', '$age', '$catInfo', '$catWins', '$catLoss', '$image')";
        if ($this->connectionString->query($query) == TRUE) {
            echo "Data Inserted." . "<br>";
        } else {
            echo "Error: " . $query . "<br>" . $this->connectionString->error;
        }
    }

    public function createTable() {
        $sqlList = ['CREATE TABLE IF NOT EXISTS cats_base_data (
                        id serial PRIMARY KEY,
                        img text,
                        name varchar(50),
                        age integer,
                        catInfo varchar(120),
                        wins integer,
                        loss integer
                     );'];

        // execute each sql statement to create new tables
        foreach ($sqlList as $sql) {
            $this->connectionString->exec($sql);
        }
        
        return $this;
    }
    /* Read Function */
    public function Read()
    {
        $query='SELECT * FROM cats_base_data';
        $arr=[];
        /* Execute $query */
        $result = $this->connectionString->query($query);

        while ($row = $result->fetch()) {
            array_push($arr, $row);
            echo $row['name'] ;
        }

        return $arr;
    }

    public function ReadSingle($id)
    {
        $query="SELECT * FROM cats_base_data WHERE id='$id'";
        $arr=[];
        /* Execute $query */
        $result = $this->connectionString->query($query);

        while ($row = $result->fetch()) {
            array_push($arr, $row);
            echo $row['name'] ;
        }

        return $arr;
    }

    /* Update Function */
    public function Update($id, $name, $age, $catInfo, $catWins, $catLoss, $image)
    {
        echo "update";
        $query="UPDATE cats_base_data SET name=$name, age=$age, catInfo=$catInfo, wins=$catWins, loss=$catLoss, img=$image WHERE id = '$id'";
        if ($this->connectionString->query($query) == TRUE) {
            echo "updated." . "<br>";
        } else {
            echo "Error: " . $query . "<br>" . $this->connectionString->error;
        }
    }
    /* Delete Function */
    public function Delete($id)
    {
        /* Delete Query */
        $query = "DELETE FROM cats_base_data WHERE id=" . $id;
        /* Execute query, if it's completed, output that record is deleted else the error. */
        if ($this->connectionString->query($query) == TRUE) {
            echo "Record Deleted" . "<br>";
        } else {
            echo "Error Deleting" . $this->connectionString->error;
        }
    }
    /* Close Function */
    public function CloseConnection()
    {
        /* Close the mysqli connection */
        mysqli_close($this->connectionString);
    }
}
