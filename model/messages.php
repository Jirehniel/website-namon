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
$stmt = $this->db->prepare("INSERT INTO `contactinfo` (contact_name, contact_email, contact_subject, contact_message) VALUES (?, ?, ?, ?)");
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