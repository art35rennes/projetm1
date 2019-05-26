<?php
/**
 * Created by PhpStorm.
 * User: zeucny
 * Date: 2019-04-25
 * Time: 13:56
 */

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HtmlController
{
    private function getUser(){
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();
        return $user;
    }
    //Generate table row for Ajax response
    public function generateRow(Request $request){


        $id = json_decode($request->input('id'));
        $user = DB::table("users")
            ->Join("accreditation", 'users.accreditation', '=', 'accreditation.id')
            ->where("users.id", "=", Auth::id() )
            ->select("*")->get();

        $html = view('souche.pills.identification', ['souche' => SoucheController::getData($id), 'user' => $user[0]]);
        return json_encode(var_export($html));

        //TODO Revoir file path ( CRTL+F sur Storage::url )

        /*
         *
         * $data = json_decode($request->input('data'));
        $n = json_decode($request->input('n'));
        $html = "<tr>#</tr>";

        $row="";

        switch ($data->onglet){
            case 'description':
                break;
            case 'identification':
                $sequence = $data->sequence!=""?
                    '<a class="tabFile font-italic mr-2" id="identification-'.$n.'-sequence" href="'.Storage::url('file.jpg').'">'.$data->sequence.'</a>' :
                    '<span class="tabNull" id="identification-'.$n.'-sequence"></span>';
                $arbre = $data->arbre!=""?
                    '<a class="tabFile font-italic mr-2" id="identification-'.$n.'-arbre" href="'.Storage::url('file.jpg').'">'.$data->arbre.'</a>' :
                    '<span class="tabNull" id="identification-'.$n.'-arbre"></span>';
                $edit = $user[0]->identification == 3?
                '<td class="editZone">
                    <i class="editZone fas fa-times" onclick="deleteTabEntry(\'identification\', \''.$data->type.'\')"></i>
                </td>':"";

                $row = '
            <tr>
               <td>
                    <span class="tabText" id="identification-'.$n.'-type">'.$data->type.'</span>
                    <input type="hidden" value="isKey">
                </td>
                <td>
                '.$sequence.'
                </td>
                <td>
                '.$arbre.'
                </td>
                '.$edit.'
            </tr>';
                str_replace("#",$row,$html);
                break;
            case 'pasteur':
                break;
            case 'publication':
                break;
            case 'exclusivite':
                break;
            case 'projet':
                break;
            case 'cryotube':
                break;
            case 'objectivation':
                break;
            case 'industriel':
                break;
            case 'criblage':
                break;
            case 'oses':
                break;
            case 'caracterisation':
                break;
            case 'projetLiee':
                break;
            default:
                break;
        }*/
        //return json_encode($data);
        //return json_encode($row);


    }
}