<?php

/**
 * Description of FormMacros
 *
 * @author nadinarturo
 * @modifier reysmervalle
 */

namespace App\Services;

use Collective\Html\FormBuilder;

class FormBuilderCollective extends FormBuilder {

    protected $buscando = false;

//    public function open(array $options = array()) {
//        $this->buscando = false;
//        return parent::open($options);
//    }
//    public function busqueda($params) {
//        $this->buscando = true;
//        return parent::open($params);
//    }

    public function multiselect($obj, $relation, $numCols = 12) {
        $related = $obj->{$relation}()->getRelated();
        $data['options'] = call_user_func(array(get_class($related), 'getCombo'));
        unset($data['options']['']);
        $data['params']['multiple'] = 'multiple';
        $data['params']['class'] = 'advanced-select';
        $data['params']['id'] = $relation;
        $data['params']['style'] = 'width: 100%;';
        $data['attrName'] = $relation . '[]';
        $data['values'] = $obj->{$relation}->lists('id');
        $data['numCols'] = $numCols;
        $data['params']['data-placeholder'] = $obj->getDescription($relation);
        return view('templates.bootstrap.multiselect', $data)->render();
    }

    public function display($obj, $attrName, $numCols = 12, $inline = false) {
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        $data['params']['id'] = str_replace('[]', '', $attrName);
        $data['attrValue'] = $obj->getValueAt($data['params']['id'], true);
        $data['params']['placeholder'] = $obj->getDescription($attrName);
        $data['inline'] = $inline;
        return view('templates.bootstrap.display', $data);
    }

    public function concurrencia($obj) {
        return $this->hidden('version', \Input::old('version', $obj->version));
    }

    public function btSelect($attrName, $values, $value, $numCols = 12, $required = true) {
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        $data['params']['class'] = 'form-control';
        $data['attrValue'] = $value;
        $data['params']['id'] = $attrName;
        $data['options'] = $values;
        if ($required) {
            $data['params']['required'] = 'true';
        }
        $data['inputType'] = "select";
        return view('templates.bootstrap.input', $data);
    }

    function btInput($obj, $attrName, $numCols = 12, $type = 'text'
    , $html = [], $options = []) {
        $data['params'] = $html;
        if (!isset($data['params']['class'])) {
            $data['params']['class'] = '';
        }
        if ($obj->isDecimalField($attrName)) {
            $data['params']['class'] = 'decimal-format ';
        } else if ($obj->isRelatedField($attrName) && $type == 'text') {
            $type = 'select';
            $options = $obj->getRelatedOptions($attrName);
            if (count($options) > 30) {
                $data['params']['class'] = ' advanced-select ';
                $data['params']['style'] = 'width: 100%;';
            }
        } else if ($obj->isDateField($attrName) && $type == "text") {
            $data['params']['class'] = 'jqueryDatePicker ';
            $data['attrValue'] = $obj->getValueAt($attrName);
            if (method_exists($data['attrValue'], 'format')) {
                $data['attrValue'] = $data['attrValue']->format('d/m/Y');
            }
        } else if ($obj->isBooleanField($attrName) && $type == "text") {
            $type = 'boolean';
        }
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        if (!isset($data['attrValue'])) {
            $data['attrValue'] = $obj->getValueAt(str_replace('[]', '', $attrName), false);
        }
        $data['params']['id'] = str_replace('->', '_', str_replace('[]', '', $attrName));
        $data['params']['class'] .= 'form-control';
        $data['params']['placeholder'] = $obj->getDescription($attrName);
        if ($obj->isRequired($attrName) && $type != 'password') {
            $data['params']['required'] = 'true';
        }
        $data['inputType'] = $type;
        $data['options'] = $options;
        if ($type == "textarea") {
            $data['params']['rows'] = 4;
        }
        if ($this->buscando) {
            unset($data['params']['required']);
            if ($type == 'select' && !isset($html['data-child'])) {
                $data['params']['multiple'] = 'multiple';
                $data['params']['style'] = 'width: 100%;';
                $data['inputType'] = 'multiselect';
                $data['params']['class'] .= ' advanced-select ';
                $data['attrName'] = $obj->getTable() . '.' . $data['attrName'] . '[]';
                unset($data['options']['']);
            } else {
                $data['attrName'] = $obj->getTable() . '.' . $data['attrName'];
            }
        }
        $data['params']['data-placeholder'] = $data['params']['placeholder'];
        return view('templates.bootstrap.input', $data);
    }

    function btImage($obj, $objName, $attrName, $type, $numCols = 12, $alt = '', $url_image = '',
            $html = [], $options = []) {

        $data['params'] = $html;
        if (!isset($data['params']['data-tipoarchivo'])) {
            $data['params']['data-tipoarchivo'] = 'image/*';
        }
        if (!isset($data['params']['data-urlsubir'])) {
            $data['params']['data-urlsubir'] = url($objName . "/" . 'subir' . $attrName . "/" . $obj->id);
        }
        if (!isset($data['params']['class'])) {
            $data['params']['class'] = 'img-responsive disparadorArchivo';
        }
        $data['url_image'] = (empty($url_image) || $url_image == '') ? $base_path . $obj->id . DIRECTORY_SEPARATOR . $obj->$attrName : $url_image;
        $data['alt'] = (empty($alt) || $alt == '') ? 'No hay '. $attrName .' aun' : $alt;
        $data['params']['class'] .= ($type != 'image') ? ' form-control' : '';       
        list($data['numCols'], $data['attrName'], $data['params']['id'],
                $data['params']['placeholder'], $data['inputType'], $data['options']) = array($numCols, $attrName,
            str_replace('->', '_', str_replace('[]', '', $attrName)), $obj->getDescription($attrName),
            $type, $options);
        return view('templates.bootstrap.file', $data)->render();
    }

    function submitBt($btn_type = "btn-volver") {
        return view('templates.bootstrap.submit', ['btn_type' => $btn_type]);
    }

}
