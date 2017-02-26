<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;


class MainController extends Controller
{
	
	public function view($pages = null,$id = null){
		$host= $_SERVER["HTTP_HOST"];
		$site = $host;
		$tmp = NULL;
		if($pages==null){
			$pages='index';
		}
		
		$portofolio_id = $id;
		
		$site_info = DB::table('sites')
			->where('domain',$site)
            ->first();
		
		$template_info_route = 'main.portofolio_view';

		if(!$site_info->status)
			return redirect('/index');
		
		$page_info = DB::table('pages')
			->where('pages.name', $pages)	
			->where('pages.site_id', $site_info->id)
            ->first();
		
		$image_sites = DB::table('imagesites')	
			->where('imagesites.site_id', $site_info->id)
            ->get();
		
		$images =[];
		foreach($image_sites as $image){
			$images[$image->title]= $image->file;
		}
		
		$config_site = DB::table('metas')	
			->where('metas.site_id', $site_info->id)
            ->get();
		
		$metas =[];
		foreach($config_site as $meta){
			$metas[$meta->name]= $meta->value;
		}
		
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
			->distinct()
			->select('links.label','links.id', 'links.route', 'links.order')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->where('menu_id',NULL)
			->orderBy('links.order', 'asc')
			->get();
		
		$main_submenu = DB::table('links')
			->distinct()
			->select('links.menu_id','links.label', 'links.route')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->whereNotNull('menu_id')
			->orderBy('links.order', 'asc')
			->get();
		
		$submenu =[];
		$id_control = 0;
		$ii = 0;
		foreach($main_submenu as $submen){
			if($id_control==0){
				$id_control = $submen->menu_id;
			}
			if((int)$submen->menu_id <> (int)$id_control){
				$ii = 0;
				$id_control = $submen->menu_id;
			}
			$submenu[$submen->menu_id][$ii]['label']= $submen->label;
			$submenu[$submen->menu_id][$ii]['route']= $submen->route;
			$ii++;
			
		}
		
		
		$portofolios = DB::table('portofolios')
			->distinct()
			->select('portofolios.*','categories.*')
			->join('categories','categories.id','=','portofolios.categorie_id')
			->where('portofolios.id',$portofolio_id)
			->first();

		$next = DB::table('portofolios')
			->where('id','<',$portofolio_id)
			->limit(1)
			->orderBy('id', 'desc')
			->first();

		$prev = DB::table('portofolios')
			->where('id','>',$portofolio_id)
			->limit(1)
			->orderBy('id', 'asc')
			->first();
		
		$image_portofolio = DB::table('imagesportofolios')
			->distinct()
			->where('imagesportofolios.portofolio_id',$portofolio_id)
			->get();

		$meta_portofolio = DB::table('metaportofolios')
			->distinct()
			->where('metaportofolios.portofolio_id',$portofolio_id)
			->get();
		
		
		return view($template_info_route)
			->with(array('main_menu'=>$main_menu,
			'page'=>$pages,
			'dir'=>$dir,
			'title'=>$title,
			'image_sites'=>$images,
			'metas'=>$metas,
			'submenu'=>$submenu,
			'portofolios'=>$portofolios,
			'image_portofolio'=>$image_portofolio,
			'meta_portofolio'=>$meta_portofolio,
			'next' => $next,
			'prev' => $prev));
	}
	
	
	public function page($pages = null){
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
			->where('pages.name', $pages)	
			->where('pages.site_id', $site_info->id)
            ->first();
		
		$image_sites = DB::table('imagesites')	
			->where('imagesites.site_id', $site_info->id)
            ->get();
		
		$images =[];
		foreach($image_sites as $image){
			$images[$image->title]= $image->file;
		}
		
		$config_site = DB::table('metas')	
			->where('metas.site_id', $site_info->id)
            ->get();
		
		$metas =[];
		foreach($config_site as $meta){
			$metas[$meta->name]= $meta->value;
		}
		
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
			->distinct()
			->select('links.label','links.id', 'links.route', 'links.order')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->where('menu_id',NULL)
			->orderBy('links.order', 'asc')
			->get();
		
		$main_submenu = DB::table('links')
			->distinct()
			->select('links.menu_id','links.label', 'links.route')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->whereNotNull('menu_id')
			->orderBy('links.order', 'asc')
			->get();
		
		$submenu =[];
		$id_control = 0;
		$ii = 0;
		foreach($main_submenu as $submen){
			if($id_control==0){
				$id_control = $submen->menu_id;
			}
			if((int)$submen->menu_id <> (int)$id_control){
				$ii = 0;
				$id_control = $submen->menu_id;
			}
			$submenu[$submen->menu_id][$ii]['label']= $submen->label;
			$submenu[$submen->menu_id][$ii]['route']= $submen->route;
			$ii++;
			
		}
		
		$contents = DB::table('contents')
			->where('page_id', $page_info->id)
            ->get();
		
		foreach($contents as $item){
			preg_match_all('{{%.*?.*?%}}', $item->content, $tmp);
		}
		$mod = array();
		$i = 0;
		if($tmp != NULL){
			foreach($tmp as $conver){
				foreach($conver as $c){
					//$t = explode($c,'{% ');
					$rest = substr($c, 3, -3);
					$mod[$i]['origin'] = $c;
					$mod[$i]['base'] = $rest;
					$mod[$i]['trans'] = trans($rest);
					$i++;
				}
			}

			$i=0;
			foreach($contents as $item){
				foreach($mod as $trans){
					$contents[$i]->content = str_replace($trans['origin'],$trans['trans'], $contents[$i]->content);
				}
				$i++;
			}
		}
		
		$portofolios = DB::table('portofolios')
			->distinct()
			->select('portofolios.id as id','portofolios.title as title','portofolios.date as date', 'portofolios.html as html','portofolios.short_describe as short_describe','portofolios.file as file','categories.name as categorie')
			->join('categories','categories.id','=','portofolios.categorie_id')
			->where('portofolios.page_id',$page_info->id)
			->get();
		
		
		$categories = DB::table('categories')
            ->get();
		
		
		return view($template_info->route)
			->with(array('main_menu'=>$main_menu,'page'=>$pages,'dir'=>$dir,'title'=>$title,'content'=>$contents,'image_sites'=>$images,'metas'=>$metas,'submenu'=>$submenu,'categories'=>$categories,'portofolios'=>$portofolios ));
	}
	
	public function lista_porto(){
		$portofolios = DB::table('portofolios')->get();
		
		return json_encode($portofolios);
	}
	
}
