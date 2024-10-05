<?php
class MessageModel
{
    public $db = null;

    function __construct()
    {
        try {
            $this->db = new mysqli('localhost', 'root', '', 'topbeaches');
        } catch (mysqli_sql_exception $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addMessage($name, $email, $subject, $message) {
$stmt = $this->db->prepare("INSERT INTO `message` (name, email, subject, messages) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->db->error));
        }
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
      if (!$stmt->execute()) {
    die('Execute failed: ' . htmlspecialchars($stmt->error) . " | SQL: " . $stmt->error);
}

        $stmt->close();
    }
}

?>