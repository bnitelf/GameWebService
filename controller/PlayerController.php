<?php 
require_once("database/DbConnection.php");
require_once("model/PlayerModel.php");

class PlayerController 
{
    private $dbConn;

    function __construct() {
        $this->dbConn = new DbConnection();
     }

    public function create($player_name)
    {
        $affectedRow = 0;

        if(!$this->dbConn->connect()){
            exit($this->dbConn->getErrorMsg());
        }

        // Init default value.
        $player = new PlayerModel();
        $player->name = $player_name;
        $player->gold = 100;
        $player->level = 1;

        $conn = $this->dbConn->getConnection();

        // Using prepare can prevent from sql injection.
        $stmt = $conn->prepare("INSERT INTO player (name, gold, level) VALUES (?, ?, ?)");
        $stmt->bind_param('sii', $player->name, $player->gold, $player->level);
        
        $stmt->execute();
        
        $affectedRow = $stmt->affected_rows;

        $this->dbConn->disconnect();
        $message = array("affected_row"=> $affectedRow);
        echo json_encode($message);
    }

    public function delete($player_id)
    {
        $affectedRow = 0;
        
        if(!$this->dbConn->connect()){
            exit($this->dbConn->getErrorMsg());
        }

        $conn = $this->dbConn->getConnection();
        $stmt = $conn->prepare("UPDATE player SET `delete` = ? WHERE id = ?");

        $deleteValue = 1;
        $stmt->bind_param('ii', $deleteValue, $player_id);
        
        $stmt->execute();
        
        $affectedRow = $stmt->affected_rows;

        $this->dbConn->disconnect();
        $message = array("affected_row"=> $affectedRow);
        echo json_encode($message);
    }

    public function get($player_id)
    {
        if(!$this->dbConn->connect()){
            exit($this->dbConn->getErrorMsg());
        }

        $conn = $this->dbConn->getConnection();
        $stmt = $conn->prepare("SELECT * FROM player WHERE id = ?");
        $stmt->bind_param('s', $player_id);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $player = new PlayerModel();
        $player->id = $row['id'];
        $player->name = $row['name'];
        $player->gold = $row['gold'];
        $player->level = $row['level'];

        $this->dbConn->disconnect();
        $json_str = json_encode($player);
        echo $json_str;
    }

    public function update($player_id, $player_name, $gold, $level)
    {
        $affectedRow = 0;
        
        if(!$this->dbConn->connect()){
            exit($this->dbConn->getErrorMsg());
        }

        $conn = $this->dbConn->getConnection();
        $stmt = $conn->prepare("UPDATE player SET name = ?, gold = ?, level = ? WHERE id = ?");
        $stmt->bind_param('siii', $player_name, $gold, $level, $player_id);
        
        $stmt->execute();
        
        $affectedRow = $stmt->affected_rows;

        $this->dbConn->disconnect();
        $message = array("affected_row"=> $affectedRow);
        echo json_encode($message);
    }
}

?>