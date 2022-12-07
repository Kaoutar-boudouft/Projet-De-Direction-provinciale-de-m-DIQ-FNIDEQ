<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jury;
use App\Models\Offer;
use App\Models\avis;
use App\Models\cps;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
class cp extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
 function afficher(){
    $data_cps = cps::all();
    $offre_table = array();
    $offre_facu = array();
for($i = 0; $i < count($data_cps); $i++){
    $aa = offer::find($data_cps[$i]['id']);
    $offre_facu['id']=$aa['id'];
    $offre_facu['num']=$aa['Num'];
    $offre_facu['objet']=$aa['objet'];
    $offre_facu['avis']=$data_cps[$i]['num_avis'];
    array_push($offre_table, $offre_facu);
}

return view('liste_cps',['offer'=>$offre_table]);


 }

 function imprimerr($id){

 $offre = DB::table('offers')->where('id', $id)->first();
 $cps = DB::table('cps')->where('id', $id)->first();
 $aviii = DB::table('avis')->where('num_avis', $cps->num_avis)->first();
 $idgagant = DB::table('pv_trois')->where('num_offer', $id)->first();
 $gagant = DB::table('concurrents')->where('id', $idgagant->id_gagnant)->first();

     $nom_gagant=$gagant->Nom;
     $name_gerant=$idgagant->Nom_gerant;
     $adresse=$idgagant->adresse;
     $cnss=$idgagant->Num_cnss;
     $rib=$idgagant->RIB;
     $banque=$idgagant->banque;
     $registre=$idgagant->registre;

 $templateProcessor = new TemplateProcessor( documentTemplate: 'Word-files/cps.docx');
 $templateProcessor->setValue( 'num_offre', $offre->Num);
 $templateProcessor->setValue( 'objet', $offre->objet);
 $templateProcessor->setValue( 'caution', $offre->caution);
 $templateProcessor->setValue( 'date_avis', $aviii->date_ouverture);

 if ($gagant){
     $templateProcessor->setValue( 'nom_gagnant', $nom_gagant);
     $templateProcessor->setValue( 'gerant', $name_gerant);
     $templateProcessor->setValue( 'adresse', $adresse);
     $templateProcessor->setValue( 'cnss', $cnss);
     $templateProcessor->setValue( 'rib', $rib);
     $templateProcessor->setValue( 'banque', $banque);
     $templateProcessor->setValue( 'registre', $registre);
 }

 $templateProcessor->saveAs( fileName: 'cps.docx');
 return response()->download(file : 'cps.docx')->deleteFileAfterSend(shouldDelete:true);

 }

}
