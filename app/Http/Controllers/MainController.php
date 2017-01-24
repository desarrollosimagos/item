<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;


class MainController extends Controller
{
	public function page($pages = null){
		$site = "http://itemao.com";
		if($pages==null){
			$pages='index';
		}
		
		$site_info = DB::table('sites')
			->where('domain',$site)
            ->first();
		
		$page_info = DB::table('pages')
			->where('pages.name', $pages)	
			->where('pages.site_id', $site_info->id)
            ->first();
		
		if($pages=='index'){
			$dir = "";
			$title = "";
		}else{
			$dir = $page_info->name;
			$title = $page_info->title;
		}
		
		
		$template_info = DB::table('templates')
			->where('id', $page_info->template_id)
            ->first();
		
		$main_menu = DB::table('links')
			->select('links.label', 'links.route', 'links.order')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->get();
		
		$contents = DB::table('contents')
			->where('page_id', $page_info->id)
            ->get();
		
		return view($template_info->route)
			->with(array('main_menu'=>$main_menu,'dir'=>$dir,'title'=>$title,'content'=>$contents));
	}
}
