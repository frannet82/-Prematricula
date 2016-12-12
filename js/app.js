$(document).foundation()

$(document).ready(function() {
   

   var paginaServicios = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
   if (paginaServicios == "servicios.html")
   {
    validarHorario();
   }
   
   if (paginaServicios == "estadisticas.html")
   {
    datosEstadisticas();
    datosEstadisticas2();
   }
 
    if (paginaServicios == "historial.html")
   {
    datosHistorial();
   }
   
   
 });
 


var tableThead = "";
var tableTbody = "";
var bool = "0";
var codigoInforme = [];

function redireccionarHorario(){
  location.href="http://2016tecpremadise.co.nf/habilitarPre.html";
} 

function almacenarPrematricula(){
	var fecha1 = document.getElementById("tiempoInicial").value;
	var fecha2 = document.getElementById("tiempoFinal").value;
        var restaMilisegundosFechas = Date.parse(fecha2) - Date.parse(fecha1);
	if (restaMilisegundosFechas<1 || fecha1=='' || fecha2=='' ){
		document.getElementById("mensaje2").click();
                
        }
	else{
                $.ajax(
                {
                    url:'php/insertarHorario.php',
                    type: 'POST',
                    datatype: 'json',
                    data: { 'tiempoInicial' :fecha1, 'tiempoFinal' :fecha2 },   // post to location.php
                    success: function(data) {
                        var dato = data.slice(0,5);
                        if (dato=="Error")
                        {
                        document.getElementById("mensaje").click();
                        }
                        else
                        {
                         document.getElementById("mensaje4").click();
                         setTimeout ("redireccionarHorario()", 2000);
                        }
                                               
                        
        
                    },
        
                    error: function(data) {
                        document.getElementById("mensaje").click();
                    },
                        });
                
                
                
                
                
		
	}

}



function terminarPrematricula(){

$.ajax({
        url:'php/terminarHorario.php',
        type: 'POST',
        datatype: 'json',
        data: { 'tiempo' :"" },   // post to location.php
         success: function(data) { 
         var dato = data.slice(0,5);
         if (dato=="Error")
         {
           document.getElementById("mensaje3").click();
         }
         else
         {
           document.getElementById("mensaje4").click();
           setTimeout ("redireccionarHorario()", 2000);
         }
         
         },
         error: function(data) {document.getElementById("mensaje3").click(); },
      });

}




function validarHorario(){

$.ajax({
        url:'php/validarHorario.php',
        type: 'POST',
        datatype: 'json',
        data: { 'tiempo' :"" },   // post to location.php
         success: function(data) { 
         var dato = data.slice(0,8);
         if (dato=="Correcto")
         {
           document.getElementById("serviciosUsuarios").innerHTML += "<div class='column'><font size='5' color='#87CEFA'><p>&nbsp Inclusion</p> </font><a href='inclusion.html'><img class='thumbnail' src='image/inclusion.png'></div><div class='column'><font size='5' color='#87CEFA'><p>&nbsp Levantamiento de requisitos</p></font><a href='levantamiento.html'><img class='thumbnail' src='image/requisitos.png'></a></div><div class='column'><font size='5' color='#87CEFA'><p>&nbsp Prematrícula</p></font><a href='prematricula.html'><img class='thumbnail' src='image/prematricula.png'></a></div>";
           
         }
         else
         {
           document.getElementById("serviciosUsuarios").innerHTML += "<div class='row'><div class='large-12 columns'><font size='5' color='white'>&nbsp&nbspLos &nbspservicios &nbspno &nbspestán &nbspdisponibles &nbspen&nbspeste &nbspmomento</font></div></div>";
         }
         
         },
         error: function(data) {document.getElementById("serviciosUsuarios").remove(); },
      });

}


function enviarInforme(){

var i = 0;
var stringCursosCodigo = "";
var nombreEs = document.getElementById("nombreCompleto").value; 
var correoEs = document.getElementById("correoElectronico").value;
var carnetEs = document.getElementById("carne").value; 
var telEs = document.getElementById("telefono").value;


while  (i<codigoInforme.length)
{

stringCursosCodigo += "/" + codigoInforme[i] ;

i=i+1;
}


$.ajax({
        url:'php/insertarPrematricula.php',
        type: 'POST',
        datatype: 'json',
        data: { 'nombreCompleto' :nombreEs, 'correoElectronico' :correoEs, 'carne' :carnetEs, 'telefono' :telEs,'datos' :stringCursosCodigo }, 
         success: function(data) { 
         var dato = data.slice(0,8);
         if (dato=="Correcto")
         {
         
          location.assign("servicios.html");
         }
         else
         {
         
          location.assign("servicios.html");
         
         }},
         error: function(data) {location.assign("servicios.html"); },
      });


}



function validarAdmin(){
var nombre2 = document.getElementById("usuarioAdmin").value; 
var contrasena2 = document.getElementById("passwordAdmin").value;

$.ajax({
        url:'php/validarUsuario.php',
        type: 'POST',
        datatype: 'json',
        data: { 'usuario1' :nombre2, 'contra1' :contrasena2 }, 
         success: function(data) { 
         var dato = data.slice(0,8);
         if (dato=="Correcto")
         {
           location.assign("serviciosAdmin.html");
         }
         else
         {
           document.getElementById("bottonFantasmaIncorrecto").click();
         }
         
         },
         error: function(data) {document.getElementById("bottonFantasmaIncorrecto").click(); },
      });

}




function datosHistorial(){
  $("#DatosHistorial").load("php/verDatosHistorial.php");
}

function datosUsuarios(){
  $("#Datos").load("php/verDatosUsuarios.php");
}

function datosInclusion(){
  $("#Datos").load("php/verInclusion.php");
}

function datosLevantamiento(){
  $("#Datos").load("php/verLevantamiento.php");
}

function datosPrematricula(){
  $("#Datos").load("php/verPrematricula.php");
}

function datosEstadisticas(){
  $("#DatosEstadisticas").load("php/verEstadisticas.php");
}

function datosEstadisticas2(){
  $("#DatosEstadisticas2").load("php/verEstadisticas2.php");
}

function SaveValue1() {
    tableThead = "thead1";
    tableTbody = "tbody1";

}

function SaveValue2() {
    tableThead = "thead2";
    tableTbody = "tbody2";

}

function SaveValue3() {
    tableThead = "thead3";
    tableTbody = "tbody3";

}

function SaveValue4() {
    tableThead = "thead4";
    tableTbody = "tbody4";

}
function SaveValue5() {
    tableThead = "thead5";
    tableTbody = "tbody5";

}
function SaveValue6() {
    tableThead = "thead6";
    tableTbody = "tbody6";

}

function SaveValue7() {
    tableThead = "thead7";
    tableTbody = "tbody7";

}


function SaveValue8() {
    tableThead = "thead8";
    tableTbody = "tbody8";

}
function SaveValue9() {
    tableThead = "thead9";
    tableTbody = "tbody9";

}
function SaveValue10() {
    tableThead = "thead10";
    tableTbody = "tbody10";

}
function SaveValue11() {
    tableThead = "thead11";
    tableTbody = "tbody11";

}
function SaveValue12() {
    tableThead = "thead12";
    tableTbody = "tbody12";

}
function SaveValue13() {
    tableThead = "thead13";
    tableTbody = "tbody13";

}
function SaveValue14() {
    tableThead = "thead14";
    tableTbody = "tbody14";

}
function SaveValue15() {
    tableThead = "thead15";
    tableTbody = "tbody15";

}
function SaveValue16() {
    tableThead = "thead16";
    tableTbody = "tbody16";

}
function SaveValue17() {
    tableThead = "thead17";
    tableTbody = "tbody17";

}
function SaveValue18() {
    tableThead = "thead18";
    tableTbody = "tbody18";

}
function SaveValue19() {
    tableThead = "thead19";
    tableTbody = "tbody19";

}function SaveValue20() {
    tableThead = "thead20";
    tableTbody = "tbody20";

}
function SaveValue21() {
    tableThead = "thead21";
    tableTbody = "tbody21";

}
function SaveValue22() {
    tableThead = "thead22";
    tableTbody = "tbody22";

}
function SaveValue23() {
    tableThead = "thead23";
    tableTbody = "tbody23";

}
function SaveValue24() {
    tableThead = "thead24";
    tableTbody = "tbody24";

}

function SaveValue25() {
    tableThead = "thead25";
    tableTbody = "tbody25";

}

function crearInforme() {

var i=0;
var cursoInforme = [];



if ( document.getElementById("thead1").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1101"); 
    cursoInforme.push("Analisis de producto I");    
} 

if ( document.getElementById("thead2").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1102"); 
    cursoInforme.push("Teoría del diseño I");    
} 

if ( document.getElementById("thead3").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1201"); 
    cursoInforme.push("Representacion I");    
} 

if ( document.getElementById("thead4").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1101"); 
    cursoInforme.push("Analisis de producto II");    
} 

if ( document.getElementById("thead5").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1102"); 
    cursoInforme.push("Teoría del diseño II");    
} 

if ( document.getElementById("thead6").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1202"); 
    cursoInforme.push("Representacion II");    
} 

if ( document.getElementById("thead7").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2401"); 
    cursoInforme.push("Ergonomia");    
} 

if ( document.getElementById("thead8").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-1102"); 
    cursoInforme.push("Teoría del diseño III");    
} 

if ( document.getElementById("thead9").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2203"); 
    cursoInforme.push("Representacion III");    
} 

if ( document.getElementById("thead10").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2301"); 
    cursoInforme.push("Principios estructurales");    
} 

if ( document.getElementById("thead11").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2107"); 
    cursoInforme.push("Diseño I");    
} 

if ( document.getElementById("thead12").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2108"); 
    cursoInforme.push("Diseño II");    
} 

if ( document.getElementById("thead13").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2204"); 
    cursoInforme.push("Herramientas digitales para diseño");    
} 


if ( document.getElementById("thead14").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-2302"); 
    cursoInforme.push("Procesos de manufactura I");    
} 

if ( document.getElementById("thead15").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3109"); 
    cursoInforme.push("Diseño III");    
} 

if ( document.getElementById("thead16").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3110"); 
    cursoInforme.push("Diseño IV");    
} 

if ( document.getElementById("thead17").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3205"); 
    cursoInforme.push("Cultura material");    
} 

if ( document.getElementById("thead18").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3303"); 
    cursoInforme.push("Procesos de manufactura II");    
} 

if ( document.getElementById("thead19").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3111"); 
    cursoInforme.push("Diseño V");    
} 

if ( document.getElementById("thead20").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3112"); 
    cursoInforme.push("Diseño VI");    
} 

if ( document.getElementById("thead21").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3113"); 
    cursoInforme.push("Bionica y eco-diseño");    
} 

if ( document.getElementById("thead22").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-3304"); 
    cursoInforme.push("Procesos de manufactura III");    
} 

if ( document.getElementById("thead23").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-4501"); 
    cursoInforme.push("Diseño de productos VII");    
} 

if ( document.getElementById("thead24").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-4601"); 
    cursoInforme.push("Diseño de comunicacion visual VII");    
} 

if ( document.getElementById("thead25").style.backgroundColor != "rgb(0, 0, 205)") {
    codigoInforme.push("ID-4503");    
    cursoInforme.push("Diseño VIII(proyecto de graduación)");    
} 

var tabla2 = "<table>"

tabla2 +="<thead "+" style="+"background:"+"#0000CD "+">"
tabla2 +="<tr>"
tabla2 +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Nombre"+"</font></th>"
tabla2 +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Carné"+"</font></th>"
tabla2 +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Teléfono"+"</font></th>"
tabla2 +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Correo"+"</font></th>"
tabla2+="</tr>"
tabla2 +="</thead>"

tabla2 +="<tbody "+" style="+"background:"+"#FFFFFF "+">"

tabla2 +="<tr>"
tabla2 +="<td>"+"<font size="+"3"+" color="+"#000000 "+">"+document.getElementById("nombreCompleto").value+"</font></td>"
tabla2 +="<td>"+"<font size="+"3"+" color="+"#000000  "+">"+document.getElementById("carne").value+"</font></td>"
tabla2 +="<td>"+"<font size="+"3"+" color="+"#000000  "+">"+document.getElementById("telefono").value+"</font></td>"
tabla2 +="<td>"+"<font size="+"3"+" color="+"#000000  "+">"+document.getElementById("correoElectronico").value+"</font></td>"
tabla2+="</tr>"

tabla2 +="</tbody>"             
tabla2 += "</table>"


var tabla = "<table>"
tabla +="<thead "+" style="+"background:"+"#0000CD "+">"
tabla +="<tr>"
tabla +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Código"+"</font></th>"
tabla +="<th>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+"Materia"+"</font></th>"
tabla+="</tr>"
tabla +="</thead>"

tabla +="<tbody "+" style="+"background:"+"#6495ED "+">"


while  (i<cursoInforme.length)
{

tabla +="<tr>"
if (i%2==0)
{
tabla +="<td>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+codigoInforme[i]+"</font></td>"
tabla +="<td>"+"<font size="+"3"+" color="+"#FFFFFF "+">"+cursoInforme[i]+"</font></td>"
}
else
{
tabla +="<td>"+"<font size="+"3"+" color="+"#000000 "+">"+codigoInforme[i]+"</font></td>"
tabla +="<td>"+"<font size="+"3"+" color="+"#000000 "+">"+cursoInforme[i]+"</font></td>"
}

tabla+="</tr>"
i=i+1;
}

if (cursoInforme.length==0)
{

tabla +="<td>"+"<font size="+"3"+" color="+"#000000 "+">"+"vacio"+"</font></td>"
tabla +="<td>"+"<font size="+"3"+" color="+"#000000 "+">"+"vacio"+"</font></td>"
tabla+="</tr>"
}


tabla +="</tbody>"             
tabla += "</table>"

document.getElementById("tablaInforme2").innerHTML = tabla2;
document.getElementById("tablaInforme").innerHTML = tabla;

if (cursoInforme.length>2 && bool == "0")
{
    document.getElementById("bottonFantasma2").click();
}

else{
    document.getElementById("bottonFantasma").click();

}


}


function retroceder() {
location.reload();
    
}

function continuar() {
    bool = "1"
    
}



function sendMail() {
    var link = "mailto:frannet82@gmail.com"
             + "?cc=frannet82@gmail.com"
             + "&subject=" + escape("This is my subject")
             + "&body=" + escape(document.getElementById("nombreCompleto").value)
    ;

    window.location.href = link;
}

function crear()
{
    var doc = new jsPDF();
    doc.text(20, 20, 'Hello world!');
    doc.text(20, 30, 'This is client-side Javascript, pumping out a PDF.');
    doc.addPage();
    doc.text(20, 20, 'Do you like that?');

    // Output as Data URI
    var string = doc.output('datauri');
}


function changeCourse1_1() {
    document.getElementById(tableThead).style = ("background:  #022100");
    document.getElementById(tableTbody).style = ("background:  #228B22");
}

function changeCourse1_2() {
    document.getElementById(tableThead).style = ("background:  #0000CD");
    document.getElementById(tableTbody).style = ("background:  #6495ED");
}
