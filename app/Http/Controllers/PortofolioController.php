<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;


class PortofolioController extends Controller
{
    public function index_json($pages=null){
        $host= $_SERVER["HTTP_HOST"];
		$site = $host;
		$tmp = NULL;
		if($pages==null){
			$pages='index';
		}
		
		$site_info = DB::table('sites')
			->where('domain',$site)
            ->first();
		
		if(!$site_info->status)
			$pages='maintenance';
		
		$page_info = DB::table('pages')	
			->where('pages.site_id', $site_info->id)
            ->first();

		$portofolios = DB::table('portofolios')
			->distinct()
			->select(
            'portofolios.id as id',
            'portofolios.title as title',
            'portofolios.date as date', 
            'portofolios.html as html',
            'portofolios.short_describe as short_describe',
            'portofolios.file as file',
            'categories.name as categorie')
			->join('categories','categories.id','=','portofolios.categorie_id')
			->get();

        return response()->json($portofolios);
    }

	public function number_json($pages=null){
        $host= $_SERVER["HTTP_HOST"];
		$site = $host;
		$tmp = NULL;
		if($pages==null){
			$pages='index';
		}
		
		$site_info = DB::table('sites')
			->where('domain',$site)
            ->first();
		
		if(!$site_info->status)
			$pages='maintenance';
		
		$page_info = DB::table('pages')	
			->where('pages.site_id', $site_info->id)
            ->first();

		$portofolios = DB::table('portofolios')
			->distinct()
			->join('categories','categories.id','=','portofolios.categorie_id')
			->count();

        return response()->json($portofolios);
    }
	
}