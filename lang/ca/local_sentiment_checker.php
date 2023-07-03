<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here. Catalan.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = "Cercador de sentiment";
$string['pluginnameextra'] = '(Pro/ Beta)';

$string['Analysis'] = 'Anàlisi';
$string['Graphs'] = 'Gràfics';
$string['Posts'] = 'Missatges';

// Graph.
$string['Others'] = 'Altres';
$string['Sentiment'] = 'Sentiment';
$string['Languages'] = 'Idiomes';

// Forms.
$string['course'] = 'Curs: ';
$string['All_courses'] = 'Tots els cursos';
$string['Select_courses'] = 'Seleccioni el curs que desitja comprovar';
$string['show_bad'] = 'Mostrar només els missatges etiquetats com a negatius';
$string['change_neg_threshold'] = 'Canvia el llindar negatiu. Valors entre [-1,1]. Recomanat: -0,3';
$string['change_pos_threshold'] = 'Canvia el llindar positiu. Valors entre [-1,1]. Recomanat: -0,3';

$string['show_en'] = "Mostrar la traducció a l'anglès";
$string['show_en_help'] = 'Aquest algorisme tradueix els missatges. Si desitja comprovar la traducció, seleccioni aquesta casella de verificació';

$string['threshold'] = 'Modificar el llindar';
$string['threshold_help'] = 'La polaritat més negativa és -1 i la més positiva 1. Utilitzem el llindar per a establir un límit en la negativitat o positivitat. El llindar habitual és ±0,3.';

$string['error_neg_th'] = "El llindar negatiu ha d'estar en el rang [-1,thresholdPos)";
$string['error_pos_th'] = "El llindar positiu ha d'estar en el rang [-1,thresholdPos)";

$string['avg'] = 'Sentiment, mitjana';
$string['avg_des'] = 'Compari la mitjana de tots els cursos amb el curs seleccionat.';
$string['avg_course'] = '<b>La mitjana del curs seleccionat és: </b>';
$string['avg_all'] = '<b>La mitjana de tots els cursos és: </b>';

$string['taskUpdate'] = 'Actualització dels missatges';

$string['name'] = 'Nom';
$string['discussion'] = 'Debat';
$string["polarity"] = 'Polaritat';
$string["language"] = 'idioma';

$string['printAnalysis'] = 'Captura de pantalla - anàlisi';

$string['message'] = 'missatge';
$string['message_trans'] = 'traduir missatge';
$string['class_id'] = 'classe id';
$string['class_name'] = 'nom de classe';

$string['Analytics'] = 'Anàlisi';

$string['polarity_des'] = 'La polaritat és un número entre [-1,1] que descriu el sentiment, sent -1 el més negatiu i 1 el més positiu.';
$string['language_des'] = 'Idioma detectat';
$string['name_des'] = "Faci clic en el nom per a anar al perfil de l'usuari.";
$string['discussion_des'] = 'Fes clic en el nom del debat per a comprovar tot el context.';

$string['notFound'] = 'No trobat';

$string['pos'] = 'Positiu';
$string['neg'] = 'Negatiu';
$string['neu'] = 'Neutral';
$string['err'] = 'Error';

$string['feedback'] = "Qüestionaris d'opinió";

// Pics.
$string['pixsatable'] = 'Taula amb referència de resultats';
$string['pixsagraph'] = 'Gràfics amb resultats';
$string['premium'] = 'Premium';
$string['premiumpage'] = 'Premium';
$string['getpremium'] = 'Aconsegueix Premium';
$string['premiumicon'] = 'Aconsegueix Premium';

// Provider.
$string['privacy:metadata:message'] = 'Missatge recollit de la discussió';
$string['privacy:metadata:created'] = 'Hora de creació';
$string['privacy:metadata:modified'] = 'Hora de modificació';
$string['privacy:metadata:userid'] = 'Aneu usuari';
$string['privacy:metadata:parent'] = 'Pare';
$string['privacy:metadata:polarity'] = 'Valors de polaritat';
$string['privacy:metadata:textpolarity'] = 'Polaritat del missatge';
$string['privacy:metadata:translation'] = "En cas de traduir a l'espanyol";
$string['privacy:metadata:idpost'] = "Publicat per l'usuari";
$string['privacy:metadata:language'] = "Idioma de l'usuari detectat";
$string['privacy:metadata:localsentiment_checkerforumpost'] = "Informació guardada per a l'usuari";
$string['privacy:metadata:anonymus'] = 'Per a mostrar usuari anònim';
$string['privacy:metadata:courseid'] = "Curs d'usuari";
$string['privacy:metadata:value'] = 'Valor';
$string['privacy:metadata:label'] = 'Etiqueta';
$string['privacy:metadata:feedbackname'] = '';
$string['privacy:metadata:localsentiment_checkerfeedback'] = "Dades guardades de l'usuari";

// Settings.
$string['email'] = 'Correu electrònic';
$string['email_des'] = 'Ingressi el seu correu';
$string['productid'] = 'Identificador de producte';
$string['productid_des'] = 'El seu producte actual';
$string['manage'] = "Sentiment Checker";
$string['showinnavigation'] = 'Mostrar navegació';
$string['showinnavigation_desc'] = "Quan s'activi, la navegació del lloc mostrarà un enllaç al Sentiment Checker";
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Insereixi la clau APIKey';
$string['name'] = 'Cognom';
$string['name_des'] = 'Ingressi el seu nom';
$string['privacy'] = 'Accepto termes i condicions';
$string['privacy_des'] = 'Acceptar condicions';
$string['privacy_policy'] = 'Política de privacitat';
$string['email_cannot_be_empty'] = 'El camp Email no pot estar buit';
$string['activate'] = 'Activar';

// Description.
$string['Describ'] = "Sobre aquest plugin";
$string['Describtion'] = "El plugin utilitza el processament del llenguatge natural (PLN) per a extreure el suggeriment de les respostes obertes en els forum de qualitat. Això permet obtenir informació més precisa a partir de les respostes dels usuaris a les preguntes obertes que els valors mitjans habituals calculats únicament a partir de dades quantitatives.";
$string['more'] = "Com funciona";
$string['moreinfo'] = "Per a representar els Posts analitzats de manera senzilla i gràfica, hem creat un Plugin local que pot ser instal·lat en qualsevol plataforma Moodle. Llegeix automàticament la base de dades cada vegada que ho usem, i mostra els posts en ordre de modificació/creació. el mòdul llegeix els posts automàticament en un procés en segon pla que evitarà la necessitat de carregar el programa per a llegir els nous posts.";
$string['moreinfo1'] = "Aquest plugin consta de 3 parts: un formulari per a modificar paràmetres, una pestanya amb els posts i una altra amb anàlisis.";
$string['moreinfo2'] = "Missatges Els missatges es mostraran en 3 colors diferents, depenent de si la seva polaritat és negativa, neutra o positiva segons els nostres llindars. També es mostrarà l'idioma detectat, la polaritat i un enllaç a la discussió original del post, per a donar més context.";
$string['moreinfo3'] = "Menú de selecció Un dels objectius era conèixer el sentiment general d'un curs, per això, també hem creat un selector de cursos per a mostrar només els posts d'aquest. Com moltes vegades voldrem veure el que s'ha detectat com a negatiu, hem posat una casella de selecció per a mostrar només aquests posts en la pestanya. Com pot haver-hi problemes a l'hora de traduir, també podem fer que ens mostri est. Com hem dit, la polarització va de [-1, 1] i els llindars de negativitat i positivitat són -0,3 i 0,3 respectivament. Els colors mostrats tenen en compte aquests paràmetres, però hem volgut incorporar la possibilitat de modificar-los perquè siguin més o menys restrictius.";
$string['moreinfo4'] = "Anàlisi: També hem incorporat una pestanya d'anàlisi, també vinculada al menú del selector, que mostra el sentiment mig global de la plataforma, i en el cas de seleccionar un curs concret, el sentiment mitjà en el curs. També mostra un gràfic circular del nombre de gràfics en els diferents idiomes, així com el resultat de la polarització.";

// Regarding.
$string['regard'] = "Respecte a l'enfocament de la IA";
$string['regarding'] = "Aquesta eina utilitza models de IA per a detectar discurs d'odi, com a models de llenguatge com Moderació per OpenAI (";
$string['moderation'] = 'Moderació';
$string['guides'] = 'Guies - Visió general';
$string['regarding1'] = ") i obertes. Està dissenyat per a ser el més ètic i responsable possible. Les eines que utilitzen aquests models es desenvolupen amb un fort èmfasi en la privacitat i la protecció de dades, i estan dissenyades per a garantir que les dades dels usuaris es manegen amb la màxima cura i respecte.";
$string['regarding2'] = "L'equip de desenvolupament del complement es compromet a millorar contínuament els estàndards ètics del seu producte. Per a aconseguir-ho, estan treballant activament en l'aplicació de noves eines i directrius ètiques al seu procés de desenvolupament. Aquestes eines i directrius estan dissenyades per a ajudar l'equip a identificar i abordar les preocupacions i consideracions ètiques al llarg de tot el cicle de vida del producte, des de la seva concepció fins a la seva implementació.";
$string['regarding3'] = "Els models de IA seleccionats per al seu ús solen entrenar-se en grans conjunts de dades que han estat acuradament seleccionats per a garantir la seva representativitat i diversitat. Això significa que els models no estan esbiaixats cap a cap grup o ideologia en particular, i que són capaces d'identificar el discurs d'odi en totes les seves formes, independentment de qui parla o què diu. Més informació aquí:";
$string['regarding4'] = "És important tenir en compte que les eines amb funcions millorades proporcionades per models de IA mai són perfectes i han d'utilitzar-se juntament amb moderació i supervisió humanes. Això ajuda a garantir que qualsevol error o biaix potencial sigui detectat i corregit abans que tingui l'oportunitat de causar mal. El disseny general i la interfície d'usuari d'aquesta eina estan pensats per a ajudar als moderadors humans dels fòrums, deixant les decisions finals al criteri humà";

// Academy.
$string['academytitle'] = "Sobre Eurecat Academy";
$string['academy'] = "Eurecat és un centre de recerca i tecnologia amb seu a Barcelona, Espanya, que proporciona serveis de tecnologia avançada, innovació i formació a més de 1.500 empreses i organitzacions. Eurecat és considerat un dels principals centres europeus de recerca i tecnologia, sent la segona organització privada sense ànim de lucre del sud d'Europa. Eurecat Academy col·labora amb organitzacions públiques i privades en un espectre empresarial molt ampli i compta amb un grup d'innovació especialitzat que se centra en la millora dels processos de transferència i avaluació del coneixement a través d'analítiques d'aprenentatge, interfícies TIC innovadores, metodologies adaptatives i motivacionals, i entorns de formació personal. El grup d'innovació de Eurecat Academy també aporta entorns d'aprenentatge professional configurables, un laboratori de cognició i percepció, i un grup d'analítica de l'aprenentatge. L'equip de Eurecat Academy combina coneixements i experiència tecnològica i pedagògica per a crear eines i recursos formatius d'alt rendiment i desenvolupar plans educatius i itineraris formatius. Apareixerà com";
$string['userprivate'] = 'Política de privacitat:';
$string['userprivate1'] = 'FUNDACIÓ EURECAT considera que les seves dades personals són molt importants. Per això, la tractem de manera confidencial i segura. Ens comprometem a garantir la privacitat de les dades personals en tot moment i a no recopilar informació innecessària.';
$string['userprivate2'] = "No és necessari que es registri prèviament per a accedir al nostre lloc web. Si desitja més informació, pot posar-se en contacte amb nosaltres a través del formulari disponible en la nostra web, sempre que estigui d'acord amb la nostra política de privacitat, que haurà d'acceptar per a deixar constància del seu consentiment exprés al tractament de les dades per a les finalitats indicades.";
$string['userprivate3'] = "En compliment del Reglament (UE) 2016/679, de 27 d'abril de 2016, relatiu a la protecció de les persones físiques pel que fa al tractament de dades personals i a la lliure circulació d'aquestes dades i de la Llei 3/2018, de 5 de desembre, de protecció de dades personals i garantia dels drets digitals, t'informem sobre el tractament de les teves dades a través d'aquesta Política de Privacitat.";
$string['information'] = 'Más información';
$string['adminprivate'] = "Encara que aquest plugin és una versió gratuïta, la nostra empresa emmagatzemarà algunes dades per al correcte funcionament i manteniment del plugin. Aquestes dades seran nom d'usuari, email i url de la plataforma on es desplegarà el plugin.
La permanència del plugin té una durada temporal, i en acceptar la configuració de privacitat estaràs donant l'oportunitat que se t'enviï informació sobre la durada del plugin, així com d'altres productes de l'empresa. En cap cas la informació serà destinada a tercers o fins que no siguin informatius sobre aquest plugin o altres plugins de l'empresa.
Si té alguna pregunta, dubte o suggeriment no dubti a posar-se en contacte amb nosaltres.";

// About us.
$string['about'] = 'Sobre nosaltres';
$string['aboutus'] = "En Eurecat Academy, reunim un equip multidisciplinari d'experts apassionats per millorar les competències de les persones. L'experiència del nostre equip abasta des del disseny instruccional fins al desenvolupament tècnic per a oferir solucions que optimitzin les activitats formatives dels nostres socis. Eurecat Academy és el departament de formació de Eurecat Technology Centre";
$string['aboutus1'] = "Eurecat és un centre de recerca i tecnologia amb seu a Barcelona, Espanya, que proporciona serveis de tecnologia avançada, innovació i formació a més de 1.500 empreses i organitzacions. Eurecat és considerat com un dels principals centres europeus de recerca i tecnologia, sent la segona organització privada sense ànim de lucre més gran del sud d'Europa.";
$string['aboutus2'] = "Eurecat Academy col·labora amb organitzacions laborals i de formació públiques i privades en un espectre empresarial molt ampli com a proveïdor integral de serveis de formació, creació de continguts i consultoria educativa. Eurecat Academy compta amb un grup d'innovació especialitzat que se centra en la millora dels processos de transferència i avaluació del coneixement a través d'interfícies TIC innovadores, metodologies adaptatives i motivacionals, analítica de l'aprenentatge i entorns personals de formació. Combinem coneixements tecnològics i pedagògics i experiència professional per a crear activitats, eines i recursos formatius d'alt rendiment, i per a desenvolupar plans educatius i itineraris formatius.";
$string['aboutus3'] = "El nostre propòsit general és oferir solucions amb capacitat per a generar un impacte positiu en persones i entitats, proporcionant-los eines eficaces per a optimitzar les seves activitats formatives. Aspirem al fet que cada persona alliberi el seu màxim potencial i contribueixi al seu progrés personal i professional, per al seu propi benestar i la seva contribució al desenvolupament social.";

// No active.
$string['noactive'] = 'Gràcies per haver-nos triats i usar els nostres productes. Vostè ha superat el temps de la versió gratuïta, si desitja aconseguir el producte en la seva versió premium poseu-vos en contacte amb nosaltres.';

// Eurecat.
$string['developed'] = "Desenvolupat per:";
$string['eurecat'] = "Eurecat Academy";
$string['eurecatorg'] = "Eurecat.org";

// Premium.
$string['premium'] = "* Actualitzar a la versió Premium - Sentiment Checker";
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Afegeix la posibilitat per canviar el llindar negatiu';
$string['removequarentine'] = "* Afegeix la posibilitat per canviar el llindar positiu";
$string['nopubli'] = '* Sense publicitat';
$string['desblockanalytic'] = '* Desbloquejar la pestanya "Analytics"';
$string['exportdata'] = '* Exportar resultats';

