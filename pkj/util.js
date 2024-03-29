function Tabela(id) {

 this.dados = new Array();
 this.id = id;
 this.sis1 = new Number(0);
 this.sis2 = new Boolean(false);
 this.base = new String(null);

 this.remove = function() {
  this.dados.splice((this.dados.length - 1), 1);
  this.sis1 -= 1;
 };
 this.remove2 = function(indice) {
  this.dados.splice(indice, 1);
  this.sis1 -= 1;
 };
 this.adiciona = function(linha) {
  this.dados[this.sis1] = linha;
  this.sis1 += 1;
 };
 this.recria = function() {
  this.cria("");
 }
 this.cria = function(pai) {
  $('#' + this.id).remove();
  if (pai != "") {
   this.base = pai.toString();
  } else {
   pai = this.base.toString();
  }
  $(pai).append('<table style="width:100%;" id="' + this.id + '"></table>');
  for (i = 0; i < this.dados.length; i++) {
   var linha = "<tr>";
   for (j = 0; j < this.dados[i].length; j++) {
    linha += '<td>' + this.dados[i][j] + '</td>';
   }
   linha += '</tr>';
   $('#' + this.id).append(linha);
  }
  this.sis2 = true;
 };
 /**
  * Adiciona os dados no formato json
  * @param {String} json Dados
  */
 this.adicionaJSON1 = function(json) {
  var d = new Array();
  var campos = eval('(' + json + ')');
  campos = campos[0].length;
  json = eval('(' + json + ')');
  $.each(json, function(indice, e) {
   var l = new Array();
   for (i = 0; i < campos; i++) {
    l[i] = json[indice][i];
   }
   d[indice] = l;
  });
  for (i = 0; i < d.length; i++) {
   this.adiciona(d[i]);
  }
  this.recria();
 };


 this.getDados = function() {
  return this.dados;
 };

 this.getLinha = function(indice) {
  return this.dados[indice];
 };
 /**
  * Atribui um novo valor a tabela inteira
  * @param Array dados todos os dados da tabela
  */
 this.setDados = function(dados) {
  this.dados = dados;
 };
 /**
  * Atribui o valor a uma determinada linha
  * @param Number indice indice da tabela
  * @param Array linha novo valor da linha
  */
 this.setLinha = function(indice, linha) {
  this.dados[indice] = linha;
 };
 /**
  * Transforma a tabela em instruÃ§Ãµes sql
  * @param String tabela nome da tabela
  * @param Array campos lista com os campos da tabela
  * @return Array lista com as instruÃ§áº½s sql
  */
 this.toSQL = function(tabela, campos) {
  var sqls = new Array();
  for (i = 0; i < this.dados.length; i++) {
   var sql = "insert into " + tabela + "(";
   for (j = 0; j < campos.length; j++) {
    if (j == (campos.length - 1)) {
     sql += campos[j] + ") ";
    } else {
     sql += campos[j] + ",";
    }
   }
   sql += "values(";
   for (j = 0; j < campos.length; j++) {
    if (j == (campos.length - 1)) {
     sql += "'" + this.dados[i][j] + "') ";
    } else {
     sql += "'" + this.dados[i][j] + "',";
    }
   }
   sqls[i] = sql;
  }
  return sqls;
 };
 /**
  * retorna o Tamanho do array
  * @return Number tamanho do Array
  */
 this.tamanho = function() {
  return this.dados.length;
 };
//Atribuição reflexiva

 function remove() {
 }
 function remove2(indice) {
 }
 function adiciona(linha) {
 }
 function atualiza(eu) {
 }
 function cria(pai) {
 }
 function adicionaJSON1(json) {
 }
 function adicionaJSON2(url) {
 }

}
;
/**
 * Alinhanha um elemento ao lado do outro
 * @param {String} referencia Elemento que ele irá se referenciar
 * @param {String} elemento O elemento a ser posicionado
 * @param {String} lado O lado podendo ser left center right
 * @param {String} alinhamento O tipo do alinhamento podendo ser top center bottom
 * @param {String} margem margem em formato css 12px 22% ...
 */
function lado(referencia, elemento, lado, alinhamento, margem) {
 setTimeout(function() {
  $(elemento).position({
   'of': $(referencia),
   'my': lado + " center",
   'at': ((lado == "right") ? "left" : (lado == "left") ? "right" : lado) + " " + alinhamento, //((alinhamento == "bottom")?"top":(alinhamento=="top")?"bottom":alinhamento),
   offset: margem,
   collision: 'flipfit'
  });
 }, 100);
}
/**
 * Centraliza um elemento conforme o elemento pai.
 */
function centraliza(elemento) {
 var tamanho = $(elemento).width();
 var margem = '-' + (tamanho / 2) + 'px';
 $(elemento).css({'position': 'absolute', 'width': tamanho + 'px', 'left': '50%', 'marginLeft': margem});
}

/**
 * O valor pode ser somente numerico, alfabetico e alfanumerico
 * @param {String} elemento seletor do jquery
 * @param {String} valor tipo de validação numerico, alfabetico e alfanumerico
 */
function valida(elemento, valor) {
 $(elemento).keydown(function(e) {
  var digitado = e.which;
  $('#saida').html(digitado);
  if (digitado == 8 || digitado == 9 || digitado == 32 || digitado == 16 || digitado == 20 || digitado >= 37 && digitado <= 40) {
  } else {
   if (valor == "numerico") {
    if (digitado >= 48 && digitado <= 57 ||digitado >= 97 && digitado <= 105 ) {
    } else {
     return false;
    }
   } else if (valor == "alfabetico") {
    if (digitado >= 65 && digitado <= 90 || digitado >= 97 && digitado <= 122) {
    } else {
     return false;
    }
   } else if (valor == "alfanumerico") {
    if (digitado >= 48 && digitado <= 57 || digitado >= 65 && digitado <= 90 || digitado >= 97 && digitado <= 122 ||digitado >= 97 && digitado <= 105) {
    } else {
     return false;
    }
   }
  }
 });
}


/**
 * Pega os dados do form e retorna em formato json
 */
function formData(formulario) {
 var qtdInputs = new Number();
 var nomesInputs = new Array();
 var valoresInputs = new Array();
 qtdInputs = $(formulario + ' > input').size();
 for (i = 0; i < qtdInputs; i++) {
  nomesInputs[i] = $($(formulario + ' > input')[i]).attr('name');
 }
 for (i = 0; i < qtdInputs; i++) {
  valoresInputs[i] = $($(formulario + ' > input')[i]).val();
 }
 var json = "{";
 for (i = 0; i < qtdInputs; i++) {
  if (i < (qtdInputs - 1)) {
   json += "'" + nomesInputs[i] + "':'" + valoresInputs[i] + "',";
  } else {
   json += "'" + nomesInputs[i] + "':'" + valoresInputs[i] + "'";
  }
 }
 json += "}";
 return eval("(" + json + ")");
}


function Sql() {
 this.base = null;
 this.dados = null;
 this.ultimoComando = "";
 this.abrir = function(nome, tamanho, versao) {
  this.base = openDatabase(nome, versao, 'pkj', tamanho * 1024 * 1014);
 };

 this.executa = function(sql) {
  var ret = null;
  this.base.transaction(function(tx) {
   var tipoComando = sql.toString().toUpperCase();
   tipoComando = tipoComando.split(" ");
   tipoComando = tipoComando[0];
   this.ultimoComando = sql;
   tx.executeSql(sql);
  });
  return ret;
 };

 this.consulta = function(sql, aoCarregar) {
  this.base.transaction(function(tx) {
   var tipoComando = sql.toString().toUpperCase();
   tipoComando = tipoComando.split(" ");
   tipoComando = tipoComando[0];
   tx.executeSql(sql, [], function(tx, resultados) {
    this.ultimoComando = sql;
    aoCarregar(resultados);
   });
  });
 }
}

function header() {
 document.write("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>");
 document.write("<meta name='viewport' content='user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi' />");
 document.write("<script type=\"text/javascript\" src=\"lib/cordova-2.5.0.js\" ><\/script>");
 document.write("<script type='text/javascript' src='lib/jquery-1.8.2.js' ><\/script>");
 document.write("<script type='text/javascript' src='lib/jquery.mobile-1.2.0.min.js' ><\/script>");
 document.write("<script type='text/javascript' src='lib/mask.js' ><\/script>");
 document.write("<script type='text/javascript' src='lib/maskMoney.js' ><\/script>");
 document.write("<script type='text/javascript' src='lib/util.js' ><\/script>");
 document.write("<link href='lib/jquery.mobile.structure-1.2.0.min.css' rel='stylesheet' >");
 document.write("<link href='lib/jquery.mobile.theme-1.2.0.min.css' rel='stylesheet' >");
 document.write("");
}
/**
 * Created by: http://gustavopaes.net
 * Created on: Nov/2009
 * 
 * Retorna os valores de parâmetros passados via url.
 *
 * @param String Nome da parâmetro.
 * @param String name nome do parametro a ser buscado 
 */
function _GET(name)
{
  var url   = window.location.search.replace("?", "");
  var itens = url.split("&");

  for(n in itens)
  {
    if( itens[n].match(name) )
    {
      return decodeURIComponent(itens[n].replace(name+"=", ""));
    }
  }
  return null;
}
