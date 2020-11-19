<?php
class Db
{

    private static $db = null;
    private static function connect()
    {
        if (self::$db === null) {
            // Paramètres de configuration DB
            /* ... */
            $dsn = "mysql:host=localhost;port=3308;dbname=step1";
            $user = "root";
            $pass = "";
            try {
                self::$db = new PDO(
                    $dsn,
                    $user,
                    $pass,
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_PERSISTENT => true
                    )
                );
            } catch (PDOException $e) {
                var_dump($e);
                exit();
            }
        }
        return self::$db;
    }

    private static $stmt = null;
    public static function query($sql, $params = null)
    {
        // $result = false;
        try {
            /* ... */
            $stmt=self::connect()->prepare($sql);
            $result=$stmt->execute($params);
            self::$stmt=$stmt;
        } catch (PDOException $e) {
            var_dump($e);
            exit();
        }
        return  $result;//$result;
    }
    
    public static function select($table, $id, $where, $orderby)
    {
        $params=[];
        if(isset($id)){
            $where .= " AND id=? ";//active=false  AND id= $id
            $params[] = $id;
        }
        // $orderby = "id";
        // if(isset($sorter)){
        //     $orderby = $sorter;
        // }

        $sql="SELECT * FROM $table WHERE $where ORDER BY $orderby";
        $resp = self::query($sql, $params);
        $resp = self::$stmt->fetchALL(PDO::FETCH_ASSOC);
        return json_encode($resp);
        // while($donnees = $resp->fetch()){
        // echo '<p>'.$donnees['title'].' '.$donnees['price'].'' . $donnees['description'] .'</p>';
        }  /* ... */

    }

    // public static function insert($table, $fields)
    // {
    //     /* ... */
    // }

    // public static function update($table, $id, $fields)
    // {
    //     /* ... */
    // }

    // public static function delete($table, $id)
    // {
    //     /* ... */
    // }
// }
