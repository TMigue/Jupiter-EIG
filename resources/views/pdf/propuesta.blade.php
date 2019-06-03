<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{public_path('css/pdf.css') }}" rel="stylesheet" type="text/css" />
    <title>Primer Test de PDF</title>
  </head>
  <body>

    <main>
        <h4><center>PROPUESTA DE GASTO, CONTRATOS MENORES</center></h4>

        <p>A los efectos previstos en el articulo 28 y 118 de la ley 2/2017, de 8 de noviembre, de Contratos del Sector Público -LSCP 2017-, esta Alcaldía, en calidad de órgano de contratación, entiende necesario que se tramite un contrato menor con las siguientes caracteristicas:</p>
        <p>Rafa explotador</p>
        <p><span class="item-title">-TIPO DE CONTRATO:</span> {{ $propuesta->prettyType() }}</p>
        <p><span class="item-title">-OBJETO:</span> {{ $propuesta->objeto }}</p>
        <p><span class="item-title">-IMPORTE:</span> {{ $propuesta->spentamount }}€</p>
        <p><span class="item-title">-DURACIÓN:</span> Hay que hacer la conversion a numeros bonitos</p>
        <p><span class="item-title">-PROVEEDOR:</span> {{ $propuesta->cif }}</p>
        <p><span class="item-title">-FACTURACIÓN:</span> {{ $propuesta->facturacion == 1 ? "Singular" : "Multiple" }}</p>
        <p><span class="item-title">-APLICACIÓN PRESUPUESTARIA:</span> </p>
        <p>De conformidad con lo dispuesto en el citado articulo 28 de la citada norma
          queda acreditada la insuficiencia de medios humanos propios para hacer frente a las
          necesidades, por cuanto las prestaciones que se pretenden contratar no pueden ser
          ejecutadas por empleados municipales, debido a su naturaleza y carácter especifico
          Se justifica que no se está alterando el objeto del contrato para evitar la aplicación de
          las reglas generales de contratación, ya que se trata de una necesidad puntuale
          independiente que se encuentra dentro de los limites temporales y cuantitativos del
          contrato menor
        </p>
        <p>
          De acuerdo con el art. 118 de la LCSP, se motiva la necesidad de contratar la
          presente prestación de acuerdo a su objeto y a lo establecido en el párrafo anterior
          @if ($propuesta->description != NULL)
              Adicionalmente, se motiva la necesidad del contrato con la siguiente justificacion: {{ $propuesta->description }}
          @endif
        </p>

        <p>
          De los datos que constan en las dependencias municipales, se justifica que el
          contratista no ha suscrito más contratos menores que individual o conjuntamente
          superen la cifra que consta en el articulo 118.1 de la LCSP
        </p>

        <p>Por todo ello, en el uso de mis atribuciones se SOLICITA:</p>

        <p>
          <span class="item-title">PRIMERO:</span> Que se tramite la Propuesta de Gasto anteriormente citada,
          dándose comunicación a la intevención municipal para el registro de la operación contable adecuada a
          la fase de gasto que corresponda
        </p>

        <p>
          <span class="item-title">SEGUNDO:</span> Que, en el supuesto de que el gasto englobe la presentacion
          de varios justificantes de gasto, se proceda a la aprobación del gasto.
        </p>

        <p>
          <span class="item-title">TERCERO:</span> Que, en el supuesto de que el gasto coincida con la presentacion
          de una sola factura adjunta a la presente propuesta de gasto, se proceda a la aporbación simultanea del
          gasto en el momento del reconocimiento de la factura (Acumulacion de fases de autorizacion disposición
          y reconocimiento de la obligación)
        </p>

    </main>

  </body>
</html>
