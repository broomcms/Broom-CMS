<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function field_creation($field_id, $errors, $page){

        $pageData = json_decode($page->pageData, true);
        $field = Item::where('id', '=', $field_id)->get()[0];
        $idName = 'name="pageData['.$field->champs.'_'.$field->nom.']" id="'.$field->champs.'_'.$field->nom.'"';
        $value = $pageData[$field->champs.'_'.$field->nom];

        // To-do: Trouver comment utiliser le système d'erreur dans un context externe au champs du controller
        // To-do : Trouver comment récupéré la valeur initial d'un édit avec old()

        $return = '
        <div class="form-group">
            <label class="required" for="nom">'.$field->nom.'</label>';

                if ($field->champs=='text'){$return .= '<input class="form-control" type="text" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '>';}
                if ($field->champs=='textarea'){$return .= '<textarea class="form-control" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '></textarea>';}
                if ($field->champs=='WYSIWYG'){$return .= '<textarea class="ckeditor form-control" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '></textarea>';}

                if ($field->champs=='image'){$return .= '<div class="input-group">'
                                                            .'<div class="custom-file">'
                                                                .'<input type="file" class="custom-file-input" '.$idName.' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                                .'<label class="custom-file-label" for="">Choose file</label>'
                                                            .'</div>'
                                                            .'<div class="input-group-append">'
                                                                .'<span class="input-group-text">Upload</span>'
                                                            .'</div>'
                                                        .'</div>';}

                if ($field->champs=='file'){$return .= '<div class="input-group">'
                                                            .'<div class="custom-file">'
                                                                .'<input type="file" class="custom-file-input" '.$idName.' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                                .'<label class="custom-file-label" for="">Choose file</label>'
                                                            .'</div>'
                                                            .'<div class="input-group-append">'
                                                                .'<span class="input-group-text">Upload</span>'
                                                            .'</div>'
                                                        .'</div>';}

                if ($field->champs=='video'){$return .= '<div class="input-group">'
                                                            .'<div class="custom-file">'
                                                                .'<input type="file" class="custom-file-input" '.$idName.' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                                .'<label class="custom-file-label" for="">Choose file</label>'
                                                            .'</div>'
                                                            .'<div class="input-group-append">'
                                                                .'<span class="input-group-text">Upload</span>'
                                                            .'</div>'
                                                        .'</div>';}

                if ($field->champs=='date'){$return .= '<div class="input-group date" id="reservationdate" data-target-input="nearest">'
                                                            .'<input type="text" class="form-control datetpicker-input" data-target="#reservationdate" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                            .'<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">'
                                                                .'<div class="input-group-text"><i class="fa fa-calendar"></i></div>'
                                                            .'</div>'
                                                        .'</div>';}

                if ($field->champs=='daterange'){$return .= '<div class="form-group">'
                                                                .'<div class="input-group">'
                                                                    .'<div class="input-group-prepend">'
                                                                    .'<span class="input-group-text">'
                                                                        .'<i class="far fa-calendar-alt"></i>'
                                                                    .'</span>'
                                                                    .'</div>'
                                                                    .'<input type="text" class="form-control datetrangepicker-input float-right" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                                .'</div>'
                                                            .'</div>';}

                if ($field->champs=='datetime'){$return .= '<div class="form-group">'
                                                                .'<div class="input-group date" id="datetimepicker" data-target-input="nearest">'
                                                                    .'<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" '.$idName.' value="'.old($field->champs.'_'.$field->nom, $value).'" '; if ($field->required==2){$return .= 'required';}$return .= '/>'
                                                                    .'<div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">'
                                                                       .' <div class="input-group-text"><i class="fa fa-calendar"></i></div>'
                                                                    .'</div>'
                                                                .'</div>'
                                                            .'</div>';}

                                                                // TO-DO : Il faut trouver comment cree le dropdown depuis la page de creation de champ
                if ($field->champs=='dropdown'){$return .= '<select class="form-group" '.$idName.' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                            . '<option value="'.old($field->champs.'_'.$field->nom, 'TODO: trouver comment loader l\'ancienne valeur').'">Option 1</option>'
                                                         . '</select>';}

                if ($field->champs=='radio'){$return .= '<div class="form-check">'
                                                            .'<input type="radio" class="form-check-input" '.$idName.' ';

                                                            if (isset($value)){
                                                                $return .= 'checked="checked"';
                                                            }

                                                            $return .= ' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                            .'<label class="form-check-label">Radio</label>'
                                                        .'</div>';}

                if ($field->champs=='checkbox'){$return .= '<div class="form-check">'
                                                                .'<input type="checkbox" class="form-check-input" '.$idName.' ';

                                                                if (isset($value)){
                                                                    $return .= 'checked="checked"';
                                                                }

                                                                $return .= ' '; if ($field->required==2){$return .= 'required';}$return .= '>'
                                                                .'<label class="form-check-label">Checkbox</label>'
                                                            .'</div>';}


                if($errors->has('nom')){
                    $return .= '<span class="text-danger">'.$errors->first($field->nom).'</span>';
                }

        $return .= '</div>';
        return $return;

    }
}
