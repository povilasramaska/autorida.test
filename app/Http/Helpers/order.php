<?php

//virtuali direktorija-kelias
namespace App\Http\Helpers;
use App\Order as OrderModel;

class Order {


            public static function numberToWords($sk) {

                if ($sk > 999999999999999) {
                    $zodis = "Per didelis skaičius";
                  };

                $zodis = "";
                $trilijonai = 0;
                $milijardai = 0;
                $milijonai = 0;
                $tukstanciai = 0;
                $ikiTukst = 0;

                // įvestas skaičius išskaidomas po tris skaitmenis (nnn,nnn,nnn)


                function iki20($s) {
                 switch ($s) {
                   case 1: return "vienas";
                     break;
                   case 2: return "du";
                     break;
                   case 3: return "trys";
                     break;
                   case 4: return "keturi";
                     break;
                   case 5: return "penki";
                     break;
                   case 6: return "šeši";
                     break;
                   case 7: return "septyni";
                     break;
                   case 8: return "aštuoni";
                     break;
                   case 9: return "devyni";
                     break;
                   case 10: return "dešimt";
                     break;
                   case 11: return "vienuolika";
                     break;
                   case 12: return "dvylika";
                     break;
                   case 13: return "trylika";
                     break;
                   case 14: return "keturiolika";
                     break;
                   case 15: return "penkiolika";
                     break;
                   case 16: return "šešiolika";
                     break;
                   case 17: return "septyniolika";
                     break;
                   case 18: return "aštuoniolika";
                     break;
                   case 19: return "devyniolika";
                     break;
                   default: return "";
                 };
                };

                function desimtys($s) {
                 switch ($s) {
                   case 2: return "dvidešimt";
                     break;
                   case 3: return "trisdešimt";
                     break;
                   case 4: return "keturiasdešimt";
                     break;
                   case 5: return "penkiasdešimt";
                     break;
                   case 6: return "šešiasdešimt";
                     break;
                   case 7: return "septyniasdešimt";
                     break;
                   case 8: return "aštuoniasdešimt";
                     break;
                   case 9: return "devyniasdešimt";
                   default: return "";
                 };
                };


                function iki999($s) {
                  $z = "";
                  if ($s < 20) {
                    $z = iki20($s);
                  } else if ($s >= 20 && $s <= 99) {
                    $z = desimtys(floor($s / 10))." ".iki20($s % 10);
                  } else if ($s >= 100 && $s <= 199) {
                    if ($s % 100 <= 19) {
                      $z = "šimtas ".iki20($s % 100);
                    } else {
                      $z = "šimtas ".desimtys(floor($s % 100 / 10))." ".iki20($s % 10);
                    };} else {
                      if ($s % 100 <= 19) {
                        $z = iki20(floor($s / 100))." šimtai ".iki20($s % 100);
                      } else {
                        $z = iki20(floor($s / 100))." šimtai ".desimtys(floor($s % 100 / 10))." ".iki20($s % 10);
                      };
                    };
                    return $z;
                };

                  // Funkcijų pabaiga

                if ($sk < 0) {
                  $zodis = "Minus ";
                }

                if ($sk == 0) {
                  $zodis = "Nulis";
                }

                $skaicius = abs(floor($sk));
                $poKablelio = $sk - $skaicius; //jeigu nesveikas skaičius, trupmeninė dalis bus pridėta skaičiais

                $trilijonai = floor($skaicius / 1000000000000);
                $milijardai = floor($skaicius % 1000000000000 / 1000000000);
                $milijonai = floor($skaicius % 1000000000 / 1000000);
                $tukstanciai = floor($skaicius % 1000000 / 1000);
                $ikiTukst = ($skaicius % 1000);


                if ($trilijonai > 0) {
                  if (($trilijonai % 100 >= 10) && ($trilijonai % 100 <= 19)) {
                    $zodis = $zodis.iki999($trilijonai)." trilijonų ";
                  } else if ($trilijonai % 10 == 1) {
                    $zodis = $zodis.iki999($trilijonai)." trilijonas ";
                  } else if ($trilijonai % 10 == 0) {
                    $zodis = $zodis.iki999($trilijonai)." trilijonų ";
                  } else {
                    $zodis = $zodis.iki999($trilijonai)." trilijonai ";
                  };
                };


                if ($milijardai > 0) {
                  if (($milijardai % 100 >= 10) && ($milijardai % 100 <= 19)) {
                    $zodis = $zodis.iki999($milijardai)." milijardų ";
                  } else if ($milijardai % 10 == 1) {
                    $zodis = $zodis.iki999($milijardai)." milijardas ";
                  } else if ($milijardai % 10 == 0) {
                    $zodis = $zodis.iki999($milijardai)." milijardų ";
                  } else {
                    $zodis = $zodis.iki999($milijardai)." milijardai ";
                  }
                }

                if ($milijonai > 0) {
                  if (($milijonai % 100 >= 10) && ($milijonai % 100 <= 19)) {
                    $zodis = $zodis.iki999($milijonai)." milijonų ";
                  } else if ($milijonai % 10 == 1) {
                    $zodis = $zodis.iki999($milijonai)." milijonas ";
                  } else if ($milijonai % 10 == 0) {
                    $zodis = $zodis.iki999($milijonai)." milijonų ";
                  } else {
                    $zodis = $zodis.iki999($milijonai)." milijonai ";
                  }
                }


                if ($tukstanciai > 0) {
                  if (($tukstanciai % 100 >= 10) && ($tukstanciai % 100 <= 19)) {
                    $zodis = $zodis.iki999($tukstanciai)." tūkstančių ";
                  } else if ($tukstanciai % 10 == 1) {
                    $zodis = $zodis.iki999($tukstanciai)." tūkstantis ";
                  } else if ($tukstanciai % 10 == 0) {
                    $zodis = $zodis.iki999($tukstanciai)." tūkstančių ";
                  } else {
                    $zodis = $zodis.iki999($tukstanciai)." tūkstančiai ";
                  }
                }

                $zodis = $zodis.iki999($ikiTukst);
                $zodis = str_replace(" ", "  ", $zodis); //kai kur galėjo likti dvigubi tarpai, padaryti viengubus
                $zodis = ucfirst($zodis);  //Pirma raidė didžioji


                if (($sk % 10 == 0) || (($sk % 100 > 10) && ($sk % 100 < 20))) {
                    $eur = "eurų";
                } else if (($sk % 10 == 1) && ($sk != 11)) {
                    $eur = "euras";
                } else {
                    $eur = "eurai";
                }

                $zodis = $zodis." ".$eur;

                if ($poKablelio > 0) {     //dar pridedam trupmeninės dalies du skaičius po kablelio
                  $du = round($poKablelio * 100);
                  $duSk = $du."";
                  if ($du >= 10 && $du <= 19 || $du % 10 == 0) {
                    $zodis = $zodis." ".$duSk." ct";
                  } else if ($du % 10 == 1) {
                    $zodis = $zodis." ".$duSk." ct";
                  } else {
                    $zodis = $zodis." ".$duSk."  ct";
                  };
                };

                return $zodis;

                }




}




 ?>
