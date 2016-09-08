<?php

/**
 * Description of HtmlMacros
 *
 * @author nadinarturo
 * @modifier reysmervalle
 */

namespace App\Services;

use Collective\Html\HtmlBuilder;
use Html;

class HtmlBuilderCollective extends HtmlBuilder {

    function button($href, $icon, $title, $modal = false) {
        return '<a class="btn btn-primary btn-xs ' . ($modal ? 'abrir-modal' : '') . '" href="' . url($href) . '" title="' . $title . '" target="_blank">' . Html::icon($icon) . '</a>';
    }

    function buttonText($href, $icon, $title, $modal = false, $target = '_blank', $btnsize = 'md', $btnstyle = 'default', $active = '') {
        return '<a class="btn btn-' . $btnstyle . ' btn-' . $btnsize .' '. $active .  ' btn-responsive ' . ($modal ? 'abrir-modal' : '') . '" href="' . url($href) . '" title="' . $title . '" target="' . $target . '">' . Html::icon($icon) . ' ' . $title . '</a>';
    }

    function linkIcon($href, $title, $icon, $attributes = []) {
        if (!empty($attributes)) {
            $html = "";
            foreach ($attributes as $key => $attribute){
               $html .= $key ."=". $attribute ." ";  
            }
            return '<a ' . $html . ' href="' . url($href) . '" title="' . $title . '">' . Html::icon($icon) . ' '. $title . '</a>';
        } else {
            return '<a href="' . url($href) . '" title="' . $title . '">' . Html::icon($icon) . ' ' . $title . '</a>';
        }
    }

    function icon($icon) {
        return '<i class="fa fa-' . $icon . '"></i>';
    }

    function simpleTable($collection, $modelName, $botones = [], $urlDelete = "", $href = [], $datatable = false) {
        $model = new $modelName();
        $data['prettyFields'] = $model->getPublicFields();
        $data['collection'] = $collection;
        $data['botones'] = $botones;
        $data['urlDelete'] = $urlDelete;
        $data['href'] = $href;
        $data['datatable'] = $datatable;
        return view('templates.bootstrap.simpleTable', $data);
    }

    function tableModel($collection, $modelName, $hasDelete = true, $hasEdit = true, $hasAdd = true, $hasModal = false) {
        $model = new $modelName();
        $data['prettyFields'] = $model->getPublicFields();
        $data['collection'] = $collection;
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        $data['hasEdit'] = $hasEdit;
        $data['hasDelete'] = $hasDelete;
        $data['hasAdd'] = $hasAdd;
        $data['hasModal'] = $hasModal;
        if ($hasAdd) {
            $data['urlAdd'] = $data['url'] . '/modificar';
            $data['nombreAdd'] = $model->getPrettyName();
        }
        return view('templates.bootstrap.table', $data);
    }

    function imageLink($hrefLink, $toltip, $urlImage) {
        return "<a href='" . url($hrefLink) . "'>"
                . "<img src='" . url($urlImage) . "' title='$toltip'></a>";
    }

    function jqplugin($name, $jsincludes = array()) {
        $css = $js = "";
        if (file_exists(public_path('css/' . $name . '.min.css'))) {
            $css = Html::style('css/' . $name . '.min.css');
        }
        if (file_exists(public_path('js/jqplugins/' . $name . '.min.js'))) {
            $js = Html::script('js/jqplugins/' . $name . '.min.js');
        }
        foreach ($jsincludes as $jsinclude) {
            $js .= Html::script($jsinclude);
        }
        return $css . $js;
    }

    function bootstrap() {
        return Html::style('css/bootstrap.css') . Html::script('js/jquery.min.js') . Html::script('js/bootstrap.min.js');
    }

    function opcionMenu($link, $nombre, $icono, $header = false) {
        if ($header) {
            return "<a href='#'><i class='glyphicon glyphicon-$icono'></i><span> $nombre</span></a>";
        } else {
            return "<a class='ajax-link' href='" . url($link) . "'><i class='glyphicon glyphicon-$icono'></i><span> $nombre</span></a>";
        }
    }

    function btnAgregar($url, $nombre) {
        $data['url'] = $url;
        $data['nombre'] = $nombre;
        return view('templates.bootstrap.btnagregar', $data);
    }

}
