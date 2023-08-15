<?php

class DB
{

	private $conn;

	function makeConnection($dbName){
		$server = "localhost";
		$user = "root";
		$pass = "";
		$this->conn = new mysqli($server, $user, $pass, $dbName);
		if ($this->conn->connect_error){
			error_log("Failed to connect to database!", 0);
		}
	}
	function query($sql){
		$result = $this->conn->query($sql);
		if ($result){
			return $result;
		}
		else{
			error_log($sql . "<br> " . $this->conn->error, 0);
		}
	}

	function close(){
		$this->conn->close();
	}

}


class Certificate
{

	public function addCertificate($name,$title,$content)
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "INSERT INTO certificates(Name,Title,Content) values('$name','$title','$content')";
    $result = $db->query($sql);
    $db->close();
    if ($result)
    	return true;
  }
  public function GeneratedCertificate($CertificateName)
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "INSERT INTO generatedcertificate(FileName)values('$CertificateName')";
    $result = $db->query($sql);
    $db->close();
    if ($result)
      return true;
  }
  public function uploadLogo($leftLogo,$rightLogo){
    $db = new DB;
    $db->makeConnection('Certificate');
  $sql = "INSERT INTO certificatelogo(leftLogo,rightLogo)values('$leftLogo','$rightLogo')";
    $result = $db->query($sql);
    $db->close();
    if ($result)
      return true;
  }
  public function getAllLogo()
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "SELECT * FROM certificatelogo";
    $result = $db->query($sql);
    $db->close();
    $certificates = array();
    $row = $result->fetch_assoc();
    while ($row) 
    {
      array_push($certificates, $row);
      $row = $result->fetch_assoc();
    }
    return $certificates;
  }
  public function getGeneratedCertificate()
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "SELECT * FROM generatedcertificate";
    $result = $db->query($sql);
    $db->close();
    $certificates = array();
    $row = $result->fetch_assoc();
    while ($row) 
    {
      array_push($certificates, $row);
      $row = $result->fetch_assoc();
    }
    return $certificates;
  }
	public function editCertificate($name,$title,$content)
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "UPDATE certificates SET Title ='$title', Content ='$content' WHERE Name ='$name'";
    $result = $db->query($sql);
    $db->close();
    if ($result)
      return true;
  }

  public function getCertificates()
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "SELECT * FROM certificates";
    $result = $db->query($sql);
    $db->close();
    $certificates = array();
    $row = $result->fetch_assoc();
    while ($row)
    {
      array_push($certificates, $row['Name']);
      $row = $result->fetch_assoc();
    }
    return $certificates;
  }

  public function getTitleAndContent($name)
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "SELECT * FROM certificates WHERE Name ='$name'";
    $result = $db->query($sql);
    $db->close();
    $row = $result->fetch_assoc();

    return array('title' => $row['Title'], 'content' => $row['Content']);
  }
public function deletegeneratedCertificate($id){
   $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "DELETE FROM generatedcertificate WHERE id = $id";
    $result = $db->query($sql);
    $db->close();
    if ($result){
      return true;
    }
  }

  public function deletecertificate($name)
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "DELETE FROM certificates WHERE Name = '$name'";
    $result = $db->query($sql);
    $db->close();
    if ($result){return true;}
  }
   public function updateLogo($leftLogo,$rightLogo){
    $db = new DB;
    $db->makeConnection('Certificate');
  $sql = "UPDATE currentlogo SET leftLogo ='$leftLogo', rightLogo ='$rightLogo' WHERE id =1 ";
    $result = $db->query($sql);
    $db->close();
    if ($result)
      return true;
  }
    public function getCurentLogo()
  {
    $db = new DB;
    $db->makeConnection('Certificate');
    $sql = "SELECT * FROM currentlogo WHERE id =1";
    $result = $db->query($sql);
    $db->close();
    $row = $result->fetch_assoc();

    return array('leftLogo' => $row['leftLogo'], 'rightLogo' => $row['rightLogo']);
  }

}

?>
