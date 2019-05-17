<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Service\DBService;
use App\Http\Repository\CatalogRepository;
use Auth;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->catalogRepository = new CatalogRepository();
    }

    public function index()
    {
        $catalogs = $this->catalogRepository->getAllCatalogs();
        $total = $this->catalogRepository->getTotalPurchased();

        return view('dashboard')->with(compact(['catalogs', 'total']));
    }

    public function buy($slug)
    {
        $slug = strtolower($slug);
        if(preg_match("/(\*|update)/mi", $slug))
        {
            return "Eh bambank, hekel dilarang beli";
        }

        $slug = str_replace("'", '\\\'', $slug);

        $catalog = $this->catalogRepository->getCatalogBySlug($slug);

        if(empty($catalog))
        {
            return "Katalog dengan slug " . $slug . " tidak ditemukan :(";
        }

        if(Auth::user()->balance < abs($catalog->price))
        {
            return "UANGNYA KURANG WOI BAMBANK !!!";
        }

        $this->catalogRepository->buyCatalog($catalog);

        return "Terima kasih telah berbelanja :)";
    }

    public function getFlag()
    {
        if(Auth::user()->balance >= 1000000)
        {
            return "JOINTS19{ngedump_sampe_mabok_es_ki_el_demi_membeli_sebuah_flag_yang_tak_ada_faedahnya_sama_sekali}";
        }
        return "Mau flag? uangnya kurang eh bambank !1!";
    }
}
