<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use DB;
use App\Quotation;
use App\Page;


class BuscadorController extends Controller
{	
	public function page($pages = null){
		
		if(isset($_GET['q'])){
			$busqueda = $_GET['q'];
		}else{
			$busqueda = '';
		}
		
		//~ echo "Búsqueda: ".$busqueda;
		$host= $_SERVER["HTTP_HOST"];
		$site = $host;
		$tmp = NULL;
		if($pages==null){
			$pages='find_portofolios';
		}
		
		$site_info = DB::table('sites')
			->where('domain',$site)
            ->first();

		$languages = DB::table('languages')	
			->where('languages.site_id', $site_info->id)
			->where('languages.status', '1')
            ->get();
		
		if(!$site_info->status)
			$pages='maintenance';
		
		$page_info = DB::table('pages')
			->where('pages.name', $pages)	
			->where('pages.site_id', $site_info->id)
            ->first();
            
        //~ var_dump($page_info);
		
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
			->get();
		
		$main_submenu = DB::table('links')
			->distinct()
			->select('links.menu_id','links.label', 'links.route')
			->join('sections','links.section_id','=','sections.id')
			->where('sections.template_id',$page_info->template_id)
			->whereNotNull('menu_id')
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
            
        $matches = null;
		
		foreach($contents as $item){
            //echo var_dump($item);
            $tmp = null;
            $returnValue = preg_match_all('{{%.*?.*?%}}', $item->content, $tmp);
			//preg_match_all("{{%.*?.*?%}}", $item->content, $tmp);
           //echo var_dump($matches);
            $mod = array();
            $i = 0;
            if($tmp != NULL){
                foreach($tmp as $conver){
                    foreach($conver as $c){
                        //$t = explode($c,'{% ');
                        $rest = substr($c, 2, -2);
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
		}
		
		// Verificar si existe trans
		//~ if (function_exists('trans')) {
			//~ echo "La función trans está disponible.<br />\n";
		//~ } else {
			//~ echo "La función trans no está disponible.<br />\n";
		//~ }		
		//~ echo var_dump($tmp);
		
		$portofolios = DB::table('portofolios')
			->distinct()
			->select('portofolios.id as id','portofolios.title as title','portofolios.date as date', 'portofolios.html as html','portofolios.short_describe as short_describe','portofolios.file as file','categories.name as categorie')
			->join('categories','categories.id','=','portofolios.categorie_id')
			->where('portofolios.title','LIKE','%'.$busqueda.'%')
			->orWhere('portofolios.short_describe','LIKE','%'.$busqueda.'%')
			->get();
		
		//~ print_r($portofolios);
            
		$categories = DB::table('categories')
            ->get();
		
		$array = array(
			'main_menu'=>$main_menu,
			'page'=>$pages,
			'dir'=>$dir,
			'title'=>$title,
			'content'=>$contents,
			'image_sites'=>$images,
			'metas'=>$metas,
			'submenu'=>$submenu,
			'categories'=>$categories,
			'portofolios'=>$portofolios,
			'languages'=>$languages);
		return view($template_info->route)
			->with($array);
	}
}
