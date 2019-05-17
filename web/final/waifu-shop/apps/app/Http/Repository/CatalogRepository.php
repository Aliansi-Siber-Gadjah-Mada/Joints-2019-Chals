<?php
    namespace App\Http\Repository;

    use App\Http\Service\DBService;
    use Auth;

    class CatalogRepository
    {
        private $db;

        public function __construct()
        {
            $this->db = DBService::getInstance();
        }

        public function getAllCatalogs()
        {
            $stmt = $this->db->prepare("select * from waifus");
            $stmt->execute();

            return json_decode(json_encode($stmt->fetchAll()));
        }

        public function getTotalPurchased()
        {
            $stmt = $this->db->prepare(
                "select count(1) as total from transactions " .
                "where user_id = " . Auth::user()->id
            );
            $stmt->execute();

            return $stmt->fetchAll()[0]['total'];
        }

        public function getCatalogBySlug(string $slug)
        {
            $stmt = $this->db->prepare("select * from waifus where slug = '$slug'");
            $stmt->execute();

            return json_decode(json_encode($stmt->fetchAll()[0]));
        }

        public function buyCatalog($catalog)
        {
            $stmt = $this->db->prepare(
                "update users set balance = ? " .
                "where id = " . Auth::user()->id
            );
            $balance = Auth::user()->balance - abs($catalog->price);
            $stmt->bindParam(1, $balance);
            $stmt->execute();
            
            $stmt2 = $this->db->prepare(
                "insert into transactions (user_id, waifu_id) values (?, ?)"
            );
            $userId = Auth::user()->id;
            $stmt2->bindParam(1, $userId);
            $stmt2->bindParam(2, $catalog->id);
            $stmt2->execute();
        }
    }