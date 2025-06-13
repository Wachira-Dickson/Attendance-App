<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path. "/Attendance-App/database/database.php";
class faculty_details
{
    public function verifyUser($dbo, $un, $pw)
    {
        $rv = ["id" => -1, "status" => "ERROR"];

        if (!$dbo || !$dbo->conn) {
            return ["id" => -1, "status" => "DB CONNECTION FAILED"];
        }

        $sql = "SELECT id, password FROM faculty_details WHERE username = :un";
        $stmt = $dbo->conn->prepare($sql);
        
        try {
            $stmt->execute([":un" => $un]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                if ($pw === $result['password']) // ⚠️ insecure for production
 {
                    $rv = ["id" => $result['id'], "status" => "ALL OK"];
                } else {
                    $rv = ["id" => $result['id'], "status" => "Wrong password"];
                }
            } else {
                $rv = ["id" => -1, "status" => "USERNAME DOES NOT EXIST"];
            }

        } catch (PDOException $e) {
            $rv = ["id" => -1, "status" => "DB ERROR: " . $e->getMessage()];
        }

        return $rv;


    }
}
?>