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
 * Plugin strings are defined here. Spanish.
 *
 * @package     local_sentiment_checker
 * @author      2023 Aina Palacios, Laia Subirats, Magali Lescano, Alvaro Martin, JuanCarlo Castillo, Santi Fort
 * @copyright   2022 Eurecat.org <dev.academy@eurecat.org>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Buscador de sentimiento';
$string['pluginnameextra'] = '(Beta)';

$string['Analysis'] = 'Análisis';
$string['Graphs'] = 'Gráficos';
$string['Posts'] = 'Mensajes';

// Graph.
$string['Others'] = 'Otros';
$string['Sentiment'] = 'Sentimiento';
$string['Languages'] = 'Idiomas';

// Forms.
$string['course'] = 'Curso: ';
$string['All_courses'] = 'Todos los cursos';
$string['Select_courses'] = 'Seleccione el curso que desea comprobar';
$string['show_bad'] = 'Mostrar sólo los mensajes etiquetados como negativos';
$string['change_neg_threshold'] = 'Cambia el umbral negativo. Valores entre [-1,1]. Recomendado: -0,3';
$string['change_pos_threshold'] = 'Cambia el umbral positivo. Valores entre [-1,1]. Recomendado: -0,3';

$string['show_en'] = 'Mostrar la traducción al inglés';
$string['show_en_help'] = 'Este algoritmo traduce los mensajes. Si desea comprobar la traducción, seleccione esta casilla de verificación';

$string['threshold'] = 'Modificar el umbral';
$string['threshold_help'] = 'La polaridad más negativa es -1 y la más positiva 1. Utilizamos el umbral para establecer un límite en la negatividad o positividad. El umbral habitual es ±0,3.';

$string['error_neg_th'] = 'El umbral negativo debe estar en el rango [-1,thresholdPos)';
$string['error_pos_th'] = 'El umbral positivo debe estar en el rango(thresholdNeg, 1]';

$string['avg'] = 'Sentimiento, promedio';
$string['avg_des'] = 'Compare la media de todos los cursos con el curso seleccionado.';
$string['avg_course'] = '<b>La media del curso seleccionado es:</b>';
$string['avg_all'] = '<b>La media de todos los cursos es: </b>';

$string['taskUpdate'] = 'Actualización de los mensajes';

$string['name'] = 'Nombre';
$string['discussion'] = 'Debate';
$string["polarity"] = "Polaridad";
$string["language"] = "idioma";

$string['printAnalysis'] = 'Captura de pantalla - análisis';

$string['message'] = 'mensaje';
$string['message_trans'] = 'traducir mensaje';
$string['class_id'] = 'clase id';
$string['class_name'] = 'nombre de clase';

$string['Analytics'] = 'Análisis';

$string['polarity_des'] = 'La polaridad es un número entre [-1,1] que describe el sentimiento, siendo -1 el más negativo y 1 el más positivo.';
$string['language_des'] = 'Idioma detectado';
$string['name_des'] = 'Haga clic en el nombre para ir al perfil del usuario.';
$string['discussion_des'] = 'Haz clic en el nombre del debate para comprobar todo el contexto.';

$string['notFound'] = 'No Encontrado';

$string['pos'] = 'Positivo';
$string['neg'] = 'Negativo';
$string['neu'] = 'Neutral';
$string['err'] = 'Error';

$string['feedback'] = 'Cuestionarios de opinión';

// Pics.
$string['pixsatable'] = 'Tabla con referencia de resultados';
$string['pixsagraph'] = 'Gráficos con resultados';
$string['premium'] = 'Premium';
$string['premiumpage'] = 'Premium';
$string['getpremium'] = 'Consigue Premium';
$string['premiumicon'] = 'Consigue Premium';

// Provider.
$string['privacy:metadata:message'] = 'Mensaje recogido de la discusión';
$string['privacy:metadata:created'] = 'Hora de creación';
$string['privacy:metadata:modified'] = 'Hora de modificación';
$string['privacy:metadata:userid'] = 'Id usuario';
$string['privacy:metadata:parent'] = 'Padre';
$string['privacy:metadata:polarity'] = 'Valores de polaridad';
$string['privacy:metadata:textpolarity'] = 'Polaridad del mensaje';
$string['privacy:metadata:translation'] = 'En caso de traducir al español';
$string['privacy:metadata:idpost'] = 'Publicado por el usuario';
$string['privacy:metadata:language'] = 'Idioma del usuario detectado';
$string['privacy:metadata:localsentiment_checkerforumpost'] = 'Información guardada para el usuario';
$string['privacy:metadata:anonymus'] = 'Para mostrar usuario anónimo';
$string['privacy:metadata:courseid'] = 'Curso de usuario';
$string['privacy:metadata:value'] = 'Valor';
$string['privacy:metadata:label'] = 'Etiqueta';
$string['privacy:metadata:feedbackname'] = '';
$string['privacy:metadata:localsentiment_checkerfeedback'] = 'Datos guardados del usuario';

// Settings.
$string['email'] = 'Correo electrónico';
$string['email_des'] = 'Ingrese su correo';
$string['productid'] = 'Identificador de producto';
$string['productid_des'] = 'Su producto actual';
$string['manage'] = 'Sentiment Checker';
$string['showinnavigation'] = 'Mostrar navegación';
$string['showinnavigation_desc'] = 'Cuando se active, la navegación del sitio mostrará un enlace al Sentiment Checker';
$string['apikey'] = 'APIKey';
$string['apikey_des'] = 'Inserte la clave APIKey';
$string['name'] = 'Apellido';
$string['name_des'] = 'Ingrese su nombre';
$string['privacy'] = 'Acepto términos y condiciones';
$string['privacy_des'] = 'Aceptar condiciones';
$string['privacy_policy'] = 'Política de privacidad';
$string['email_cannot_be_empty'] = 'El campo Email no puede estar vacío';
$string['activate'] = 'Activar';

// Description.
$string['Describ'] = "Sobre aquest plugin";
$string['Describtion'] = "El plugin utiliza el procesamiento del lenguaje natural (PLN) para extraer la sugerencia de las respuestas abiertas en los forum de calidad. Esto permite obtener información más precisa a partir de las respuestas de los usuarios a las preguntas abiertas que los valores medios habituales calculados únicamente a partir de datos cuantitativos.";

$string['more'] = "Com funciona";
$string['moreinfo'] = "Para representar los Posts analizados de forma sencilla y gráfica, hemos creado un Plugin local que puede ser instalado en cualquier plataforma Moodle. Lee automáticamente la base de datos cada vez que lo usamos, y muestra los posts en orden de modificación/creación. el módulo lee los posts automáticamente en un proceso en segundo plano que evitará la necesidad de cargar el programa para leer los nuevos posts.";

$string['moreinfo1'] = "Este plugin consta de 3 partes: un formulario para modificar parámetros, una pestaña con los posts y otra con análisis.";

$string['moreinfo2'] = "Mensajes Los mensajes se mostrarán en 3 colores diferentes, dependiendo de si su polaridad es negativa, neutra o positiva según nuestros umbrales. También se mostrará el idioma detectado, la polaridad y un enlace a la discusión original del post, para dar más contexto.";

$string['moreinfo3'] = "Menú de selección Uno de los objetivos era conocer el sentimiento general de un curso, por ello, también hemos creado un selector de cursos para mostrar sólo los posts de éste. Como muchas veces querremos ver lo que se ha detectado como negativo, hemos puesto un checkbox para mostrar sólo estos posts en la pestaña. Como puede haber problemas a la hora de traducir, también podemos hacer que nos muestre este. Como hemos dicho, la polarización va de [-1, 1] y los umbrales de negatividad y positividad son -0,3 y 0,3 respectivamente. Los colores mostrados tienen en cuenta estos parámetros, pero hemos querido incorporar la posibilidad de modificarlos para que sean más o menos restrictivos.";
$string['moreinfo4'] = 'Análisis: También hemos incorporado una pestaña de análisis, también vinculada al menú del selector, que muestra el sentimiento medio global de la plataforma, y en el caso de seleccionar un curso concreto, el sentimiento medio en el curso. También muestra un gráfico circular del número de gráficos en los distintos idiomas, así como el resultado de la polarización.';

// Regarding.
$string['regard'] = "Con respecto al enfoque de la IA";
$string['regarding'] = "Esta herramienta utiliza modelos de IA para detectar discurso de odio, como modelos de lenguaje como Moderación por OpenAI (";
$string['moderation'] = 'Moderación';
$string['guides'] = 'Guías - Visión general';
$string['regarding1'] = ") y abiertas. Está diseñado para ser lo más ético y responsable posible. Las herramientas que utilizan estos modelos se desarrollan con un fuerte énfasis en la privacidad y la protección de datos, y están diseñadas para garantizar que los datos de los usuarios se manejan con el máximo cuidado y respeto.";
$string['regarding2'] = "El equipo de desarrollo del complemento se compromete a mejorar continuamente los estándares éticos de su producto. Para lograrlo, están trabajando activamente en la aplicación de nuevas herramientas y directrices éticas a su proceso de desarrollo. Estas herramientas y directrices están diseñadas para ayudar al equipo a identificar y abordar las preocupaciones y consideraciones éticas a lo largo de todo el ciclo de vida del producto, desde su concepción hasta su implementación.";
$string['regarding3'] = "Los modelos de IA seleccionados para su uso suelen entrenarse en grandes conjuntos de datos que han sido cuidadosamente seleccionados para garantizar su representatividad y diversidad. Esto significa que los modelos no están sesgados hacia ningún grupo o ideología en particular, y que son capaces de identificar el discurso de odio en todas sus formas, independientemente de quién habla o qué dice. Más información aquí: ";
$string['regarding4'] = "Es importante tener en cuenta que las herramientas con funciones mejoradas proporcionadas por modelos de IA nunca son perfectas y deben utilizarse junto con moderación y supervisión humanas. Esto ayuda a garantizar que cualquier error o sesgo potencial sea detectado y corregido antes de que tenga la oportunidad de causar daño. El diseño general y la interfaz de usuario de esta herramienta están pensados para ayudar a los moderadores humanos de los foros, dejando las decisiones finales al criterio humano";

// Academy.
$string['academytitle'] = "Sobre Eurecat Academy";
$string['academy'] = "Eurecat es un centro de investigación y tecnología con sede en Barcelona, España, que proporciona servicios de tecnología avanzada, innovación y formación a más de 1.500 empresas y organizaciones. Eurecat está considerado como uno de los principales centros europeos de investigación y tecnología, siendo la segunda mayor organización privada sin ánimo de lucro del sur de Europa. Eurecat Academy colabora con organizaciones públicas y privadas en un espectro empresarial muy amplio y cuenta con un grupo de innovación especializado que se centra en la mejora de los procesos de transferencia y evaluación del conocimiento a través de analíticas de aprendizaje, interfaces TIC innovadoras, metodologías adaptativas y motivacionales, y entornos de formación personal. El grupo de innovación de Eurecat Academy también aporta entornos de aprendizaje profesional configurables, un laboratorio de cognición y percepción, y un grupo de analítica del aprendizaje. El equipo de Eurecat Academy combina conocimientos y experiencia tecnológica y pedagógica para crear herramientas y recursos formativos de alto rendimiento y desarrollar planes educativos e itinerarios formativos.Aparecerá como";
$string['userprivate'] = 'Política de privacidad:';
$string['userprivate1'] = 'FUNDACIÓ EURECAT considera que sus datos personales son muy importantes. Por ello, la tratamos de forma confidencial y segura. Nos comprometemos a garantizar la privacidad de los datos personales en todo momento y a no recabar información innecesaria.';
$string['userprivate2'] = "No es necesario que se registre previamente para acceder a nuestro sitio web. Si desea más información, puede ponerse en contacto con nosotros a través del formulario disponible en nuestra web, siempre que esté de acuerdo con nuestra política de privacidad, que deberá aceptar para dejar constancia de su consentimiento expreso al tratamiento de los datos para las finalidades indicadas.";
$string['userprivate3'] = 'En cumplimiento del Reglamento (UE) 2016/679, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos y de la Ley 3/2018, de 5 de diciembre, de protección de datos personales y garantía de los derechos digitales, le informamos sobre el tratamiento de sus datos a través de esta Política de Privacidad.';
$string['information'] = 'Más información';
$string['adminprivate'] = "Aunque este plugin es una versión gratuita, nuestra empresa almacenará algunos datos para el correcto funcionamiento y mantenimiento del plugin. Estos datos serán nombre de usuario, email y url de la plataforma donde se desplegará el plugin.
La permanencia del plugin tiene una duración temporal, y al aceptar la configuración de privacidad estarás dando la oportunidad de que se te envíe información sobre la duración del plugin, así como de otros productos de la empresa.  En ningún caso la información será destinada a terceros o fines que no sean informativos sobre este plugin u otros plugins de la empresa.
Si tiene alguna pregunta, duda o sugerencia no dude en ponerse en contacto con nosotros";

// About us.
$string['about'] = 'Sobre nosotros';
$string['aboutus'] = "En Eurecat Academy, reunimos a un equipo multidisciplinar de expertos apasionados por mejorar las competencias de las personas. La experiencia de nuestro equipo abarca desde el diseño instruccional hasta el desarrollo técnico para ofrecer soluciones que optimicen las actividades formativas de nuestros socios. Eurecat Academy es el departamento de formación de Eurecat Technology Centre";
$string['aboutus1'] = "Eurecat es un centro de investigación y tecnología con sede en Barcelona, España, que proporciona servicios de tecnología avanzada, innovación y formación a más de 1.500 empresas y organizaciones. Eurecat está considerado como uno de los principales centros europeos de investigación y tecnología, siendo la segunda organización privada sin ánimo de lucro más grande del sur de Europa.";
$string['aboutus2'] = "Eurecat Academy colabora con organizaciones laborales y de formación públicas y privadas en un espectro empresarial muy amplio como proveedor integral de servicios de formación, creación de contenidos y consultoría educativa. Eurecat Academy cuenta con un grupo de innovación especializado que se centra en la mejora de los procesos de transferencia y evaluación del conocimiento a través de interfaces TIC innovadoras, metodologías adaptativas y motivacionales, analítica del aprendizaje y entornos personales de formación. Combinamos conocimientos tecnológicos y pedagógicos y experiencia profesional para crear actividades, herramientas y recursos formativos de alto rendimiento, y para desarrollar planes educativos e itinerarios formativos.";
$string['aboutus3'] = "Nuestro propósito general es ofrecer soluciones con capacidad para generar un impacto positivo en personas y entidades, proporcionándoles herramientas eficaces para optimizar sus actividades formativas. Aspiramos a que cada persona libere su máximo potencial y contribuya a su progreso personal y profesional, para su propio bienestar y su contribución al desarrollo social.";

// No active.
$string['noactive'] = 'Gracias por habernos elegido y usar nuestros productos. Usted ha superado el tiempo de la versión gratuita, si desea conseguir el producto en su versión premium póngase en contacto con nosotros.';

// Eurecat.
$string['developed'] = "Desarrollado por:";
$string['eurecat'] = "Eurecat Academy";
$string['eurecatorg'] = "Eurecat.org";

// Premium.
$string['premium'] = '* Actualizar a la versión Premium -  Sentiment Checker';
$string['premiumpage'] = 'Eurecat.Lab';
$string['keepquarentine'] = '* Añadir la posibilidad de cambiar el umbral negativo';
$string['removequarentine'] = '* Añadir la posibilidad de cambiar el umbral positivo';
$string['nopubli'] = '* Sin publicidad';
$string['desblockanalytic'] = '* Desbloquear la pestaña "Analytics"';
$string['exportdata'] = '* Exportar resultados';

