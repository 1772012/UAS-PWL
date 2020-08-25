
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

class userDaoImpl
{
    /**
     * @param User $user
     * @return User
     */
    //  Get one selected user data
    public function login(User $user)
    {
        //  Create MySQL Connection
        $link = PDOUtil::createConnection();

        //  Create query language
        $query = "SELECT * FROM user WHERE id = ? AND password = ?";

        //  MySQL query statements
        $statement = $link->prepare($query);

        $statement->bindValue(1, $user->getId());
        $statement->bindValue(2, $user->getPassword());

        $statement->setFetchMode(PDO::FETCH_OBJ);

        $statement->execute();

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $statement->fetchObject('user');

    }



    public function fetchUser(){


        $link = PDOUtil::createConnection();

        //  Create query language
        $query = "SELECT * FROM user";

        //  Fetch result
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $result->fetchAll();

    }

    public function fetchAdmin(){


        $link = PDOUtil::createConnection();

        //  Create query language
        $query = "SELECT * FROM user WHERE role =admin ";

        //  Fetch result
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $result->fetchAll();

    }

    public function fetchStudent(){


        $link = PDOUtil::createConnection();

        //  Create query language
        $query = "SELECT * FROM fq_user WHERE role =student ";

        //  Fetch result
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $result->fetchAll();

    }


    public function fetchPJSProdi(){


        $link = PDOUtil::createConnection();

        //  Create query language
        $query = "SELECT * FROM user WHERE role =pjs prodi";

        //  Fetch result
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'user');

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $result->fetchAll();

    }

}