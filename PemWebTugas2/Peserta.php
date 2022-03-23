<?php
require_once 'Konektor.php';
class Peserta {
    private $email, $nama;

    //fungsi add (rawan SQL INJECTION)
    // public function add(){
	// 	$pdo = Konektor::getKonektor();
	// 	$sql = "INSERT into peserta VALUES ('$this->email','$this->nama')";
	// 	$pdo->exec($sql);
	// }
	public function add(){
		$pdo = Konektor::getKonektor();
		$sql = "INSERT into peserta VALUES (?,?)";
		$pdo->prepare($sql)->execute([$this->email,$this->nama]);
	  }
	  
	  public static function get($email){
		$pdo = Konektor::getKonektor();
		$sql = "SELECT * FROM peserta WHERE email = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$email]);
	
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$peserta = new Peserta($row['email'],$row['nama']);
			return $peserta;
		} else {
			return null;
		}
	}
	
    public function save($new_email, $new_nama){
		$pdo = Konektor::getKonektor();
		$sql = "UPDATE peserta SET email = ?, nama = ? WHERE email = ? ";
		$pdo->prepare($sql)->execute([$new_email,$new_nama,$this->email]);
	  }
	  
	  public static function delete($email){
		$pdo = Konektor::getKonektor();
		$sql = "DELETE FROM peserta WHERE email = ?";
		$pdo->prepare($sql)->execute([$email]);
	}
	
    public static function getAll(){
		$daftarPeserta = [];
		$pdo = Konektor::getKonektor();
		$sql = "SELECT * FROM peserta";
		$stmt = $pdo->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row){
			$daftarPeserta[] = new Peserta($row['email'],$row['nama']);
		}
		return $daftarPeserta;
	}
	

	public function __construct($email, $nama) {
		$this->email = $email;
		$this->nama = $nama;
	}
	
    public function getEmail(){
        return $this->email;
    }
    public function getNama(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setNama($nama){
        $this->nama = $nama;
    }
}
