
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

class portfolioDaoImpl
{
    public function fetchPortfolioData(){
        $link = PDOUtil::createConnection();

        $query="SELECT * FROM portfolio";

        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'portfolio');
        PDOUtil::closeConnection($link);
        return $result->fetchAll();
    }
    /**
     * @param portfolio $fe_portfolio
     * @return int
     */

    public function addPortfolio(fe_portofolio $fe_portfolio)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "INSERT INTO portfolio(name,fe_user_id,level,type,participation,description,certificate) values(?,?,?,?,?,?,?)";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $fe_portfolio->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $fe_portfolio->getFeUserId(), PDO::PARAM_STR);
        $statement->bindValue(3, $fe_portfolio->getLevel(), PDO::PARAM_STR);
        $statement->bindValue(4, $fe_portfolio->getType(), PDO::PARAM_STR);
        $statement->bindValue(5, $fe_portfolio->getParticipation(), PDO::PARAM_STR);
        $statement->bindValue(6, $fe_portfolio->getDescription(), PDO::PARAM_STR);
        $statement->bindValue(6, $fe_portfolio->getCertificate(), PDO::PARAM_STR);
        $link->beginTransaction();
        if ($statement->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        PDOUtil::closeConnection($link);

        return $result;
    }


    public function deletePortfolio(portfolio $fe_portfolio)
    {
        $result = 0;

        $link = PDOUtil::createConnection();

        $query = "DELETE FROM portfolio WHERE name = ?";

        $statement = $link->prepare($query);
        $statement->bindValue(1, $fe_portfolio->getName(), PDO::PARAM_STR);
        $link->beginTransaction();
        if ($statement->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        //  MySQL close connection
        PDOUtil::closeConnection($link);

        //  Return value
        return $result;
    }



}