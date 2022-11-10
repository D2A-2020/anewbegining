<?php

class Person extends Connection
{
    

    function __construct()
    {
    
    }

    function getPersons()
    {
        
        $this->con = self::connect();

        $query = "select * from Person;";
        $result = $this->ask($query);
        $tbody = "";

        foreach ($result as $row) {

            $tr = "<tr>";

            foreach ($row as $data) {
                $td = "<td>" . $data . "</td>";
                $tr = $tr . $td;
            }
            $tr = $tr . "</tr>";
            $tbody = $tbody . $tr;
        }


        return $tbody;
    }

    public function setPerson($ci, $name, $surname, $password, $email, $civil, $sex, $birth_date, $phone, $nationality, $health_card, $license)
    {
        $this->con = self::connect();

        $query =  "insert into Person(
        ci, `name`, surname, `password`, email, civilStatus, sex, birth, phone, nationality, healthCard, carLicense)
        values(?,?,?,?,?,?,?,?,?,?,?,?);";


        $data = [$ci, $name, $surname, $password, $email, $civil, $sex, $birth_date, $phone, $nationality, $health_card, $license];
        $result = $this->nonquery($query, $data);
        return $result;
    }

    public function editPerson($id, $ci, $name, $surname, $password, $email, $civil, $sex, $birth_date, $phone, $nationality, $health_card, $license)
    {
        $this->con = self::connect();

        $array = [
            ":id" => $id,
            ":ci" => $ci,
            ":name" => $name,
            ":surname" => $surname,
            ":password" => $password,
            ":email" => $email,
            ":civil" =>$civil,
            ":sex" => $sex,
            ":birth_date" => $birth_date,
            ":phone" => $phone,
            ":nationality" => $nationality,
            ":health_card" => $health_card,
            ":license" => $license
        ];

        $query = "UPDATE Person SET 
        ci = :ci , 
        `name` = :name , 
        surname = :surname , 
        `password` = :password , 
        email = :email ,  
        civilStatus = :civil,  
        sex = :sex ,  
        birth = :birth_date ,  
        phone = :phone ,  
        nationality = :nationality ,  
        healthCard = :health_card ,  
        carLicense = :license 
        WHERE id=:id;" ;

        echo $result = $this->nonquery($query, $array);
        return $result;

        //$result = $this->nonquery($query, $data);

        //        return $result;
    }


    //----------ESPECIFICS--------------------------------------------

    public function activePerson($id, $op){
        $this->con = self::connect();

        $array = [$id];
        
        if($op==true || $op==1){
            $query = "UPDATE Person SET active = true WHERE id=?;";
        }else{
            $query = "UPDATE Person SET active = false WHERE id=?;";
        }
        
        echo $result = $this->nonquery($query, $array);
        return $result;
    }

    //---------------------counts---------------------
    public function countCi($ci){
        $this->con = self::connect();
        $query = "SELECT COUNT(ci) FROM Person WHERE ci=?";
        $cols = $this->countQuery($query, [$ci]);
        return $cols;
    }
    public function countId($id){
        $this->con = self::connect();
        $query = "SELECT COUNT(id) FROM Person WHERE id=?";
        $cols = $this->countQuery($query, [$id]);
        return $cols;
    }
    public function countEmail($email){
        $this->con = self::connect();
        $query = "SELECT COUNT(email) FROM Person WHERE email=?";
        $cols = $this->countQuery($query, [$email]);
        return $cols;
    }
    public function countPassword($pw){
        $this->con = self::connect();
        $query = "SELECT COUNT(`password`) FROM Person WHERE `password`=?";
        $cols = $this->countQuery($query, [$pw]);
        return $cols;
    }

}
