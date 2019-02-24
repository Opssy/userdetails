<?php
class Agent extends Model
{
    public $tradeName;
    public $address;
    public $state;
    public $city;
    public $postalCode;
    public $telephone;
    public $website;
    public $bookingNumber;
    public $companyNumber;
    public $iataNumber;

    public function __construct(array $data) {
        $this->tradeName = (isset($data['trade_name']) ? $data['trade_name'] : "");
        $this->address = (isset($data['address']) ? $data['address'] : "");
        $this->state = (isset($data['state']) ? $data['state'] : "");
        $this->city = (isset($data['city']) ? $data['city'] : "");
        $this->postalCode = (isset($data['postal_code']) ? $data['postal_code'] : "");
        $this->telephone = (isset($data['telephone']) ? $data['telephone'] : "");
        $this->website = (isset($data['webiste']) ? $data['trade_name'] : "");
        $this->bookingNumber = (isset($data['booking_number']) ? $data['booking_number'] : "");
        $this->companyNumber = (isset($data['company_number']) ? $data['company_number'] : "");
        $this->iataNumber = (isset($data['iata_number']) ? $data['iata_number'] : "");
    }


    public function save() {
        $sql = "INSERT INTO agencies(trade_name, address,   state, city, postal_code, telephone,
            website, booking_number, company_number, iata_number) VALUES(?,?,?, ?,?,?,?,?,?,?)";
        $params = [$this->tradeName, $this->address, $this->state, $this->city, $this->postalCode, 
            $this->telephone, $this->website, $this->bookingNumber, $this->companyNumber, $this->iataNumber];
            
        $connection = $this->getDBConnection();
        $stmt = $connection->prepare($sql);
        if ($stmt->execute($params)) {
            return ['success' => true, 'row_id' => $connection->lastInsertId()];
        }
    }

    public static function findBy($column, $value) {
        $sql = "select * from agencies where $column = ?";
        $params = [$value];
        $connection = self::getConnectionInstance();
        $statement = $connection->prepare($sql);
        if ($statement->execute($params)) {
            return ['success' => true, 'results' => $statement->fetch(PDO::FETCH_ASSOC)];
        } else {
            return ['success' => false];
        }
    }

    public static function find($id) {
        return self::findBy('id', $id);
    }
}
