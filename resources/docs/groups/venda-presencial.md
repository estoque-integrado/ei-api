# Venda Presencial


## Criar venda

<small class="badge badge-darkred">requires authentication</small>

Salva uma nova venda presencial

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/sales" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"doloremque","user_id":5,"nome":"error","vendedor_id":17,"forma_pagamento":"enim","entrada":14.44,"parcelas":13,"desconto_juros":"ipsam","desconto_percentual":false,"desconto_juros_valor":2.5507,"produtos":"et"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/sales"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "doloremque",
    "user_id": 5,
    "nome": "error",
    "vendedor_id": 17,
    "forma_pagamento": "enim",
    "entrada": 14.44,
    "parcelas": 13,
    "desconto_juros": "ipsam",
    "desconto_percentual": false,
    "desconto_juros_valor": 2.5507,
    "produtos": "et"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://api.estoqueintegrado.com.br/v1/sales',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'doloremque',
            'user_id' => 5,
            'nome' => 'error',
            'vendedor_id' => 17,
            'forma_pagamento' => 'enim',
            'entrada' => 14.44,
            'parcelas' => 13,
            'desconto_juros' => 'ipsam',
            'desconto_percentual' => false,
            'desconto_juros_valor' => 2.5507,
            'produtos' => 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "id":1,
     "user_id":22,
     "entrada":200.00,
     "forma_pagamento":"dinheiro",
     "vendedor": {
"nome":"Nome do vendedor",
"comissao":10,
     }
}
```
<div id="execution-results-POSTv1-sales" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-sales"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-sales"></code></pre>
</div>
<div id="execution-error-POSTv1-sales" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-sales"></code></pre>
</div>
<form id="form-POSTv1-sales" data-method="POST" data-path="v1/sales" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-sales', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-sales" onclick="tryItOut('POSTv1-sales');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-sales" onclick="cancelTryOut('POSTv1-sales');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-sales" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/sales</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-sales" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-sales" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_id" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
ID do cliente, caso ja esteja cadastrado</p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="nome" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
Nome ou email ou cpf do cliente para futuros descontos ou relatórios, caso não queira informar dados</p>
<p>
<b><code>vendedor_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vendedor_id" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
ID do vendedor, se houver</p>
<p>
<b><code>forma_pagamento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="forma_pagamento" data-endpoint="POSTv1-sales" data-component="body" required  hidden>
<br>
Forma pagamento aceitas: <br>
<i><small>dinheiro|cartao_credito|cartao_debito|crediario|cheque</small></i></p>
<p>
<b><code>entrada</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="entrada" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
Valor de entrada, se houver Ex: 1589.00</p>
<p>
<b><code>parcelas</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="parcelas" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
Quantidade de parcelas. Default: 1</p>
<p>
<b><code>desconto_juros</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="desconto_juros" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
Se foi aplicado desconto ou juros no valor.
<i><small>valores aceitos: desconto | juros</small></i></p>
<p>
<b><code>desconto_percentual</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-sales" hidden><input type="radio" name="desconto_percentual" value="true" data-endpoint="POSTv1-sales" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-sales" hidden><input type="radio" name="desconto_percentual" value="false" data-endpoint="POSTv1-sales" data-component="body" ><code>false</code></label>
<br>
Se o desconto aplicado foi em percentual(%) ou reais(R$).
<i><small>1 = desconto aplicado em percentual(%) | 0 = desconto aplicado em reais(R$)</small></i></p>
<p>
<b><code>desconto_juros_valor</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="desconto_juros_valor" data-endpoint="POSTv1-sales" data-component="body"  hidden>
<br>
Valor do desconto ou juros aplicado.</p>
<p>
<b><code>produtos</code></b>&nbsp;&nbsp;<small>array</small>  &nbsp;
<input type="text" name="produtos" data-endpoint="POSTv1-sales" data-component="body" required  hidden>
<br>
Array de produtos <br>
[<br>
{<br>
     "id":11,
     "quantidade":3,
     "cor_id": 43,
     "tamanho_id": 56
<br>},
<br>{
     "id":45,
     "quantidade":1,
     "cor_id": null,
     "tamanho_id": 157
<br>}
<br>]</p>

</form>


## Relatório das vendas

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados das vendas presenciais conforme os filtros passados

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/sales/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"quia","data_inicio":"in","data_fim":"quia","cliente":"ut","ordenar_por":"officiis","ordem":"repellendus"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/sales/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "quia",
    "data_inicio": "in",
    "data_fim": "quia",
    "cliente": "ut",
    "ordenar_por": "officiis",
    "ordem": "repellendus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://api.estoqueintegrado.com.br/v1/sales/report',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'quia',
            'data_inicio' => 'in',
            'data_fim' => 'quia',
            'cliente' => 'ut',
            'ordenar_por' => 'officiis',
            'ordem' => 'repellendus',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{}
```
<div id="execution-results-POSTv1-sales-report" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-sales-report"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-sales-report"></code></pre>
</div>
<div id="execution-error-POSTv1-sales-report" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-sales-report"></code></pre>
</div>
<form id="form-POSTv1-sales-report" data-method="POST" data-path="v1/sales/report" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-sales-report', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-sales-report" onclick="tryItOut('POSTv1-sales-report');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-sales-report" onclick="cancelTryOut('POSTv1-sales-report');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-sales-report" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/sales/report</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-sales-report" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-sales-report" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>data_inicio</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="data_inicio" data-endpoint="POSTv1-sales-report" data-component="body"  hidden>
<br>
Data de inicio do relatório</p>
<p>
<b><code>data_fim</code></b>&nbsp;&nbsp;<small>date</small>     <i>optional</i> &nbsp;
<input type="text" name="data_fim" data-endpoint="POSTv1-sales-report" data-component="body"  hidden>
<br>
Data fim do relatório</p>
<p>
<b><code>cliente</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cliente" data-endpoint="POSTv1-sales-report" data-component="body"  hidden>
<br>
Nome, email ou cpf do cliente</p>
<p>
<b><code>ordenar_por</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ordenar_por" data-endpoint="POSTv1-sales-report" data-component="body"  hidden>
<br>
valor, nome, data</p>
<p>
<b><code>ordem</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ordem" data-endpoint="POSTv1-sales-report" data-component="body"  hidden>
<br>
asc = ascendente | desc = descendente. Default: asc</p>

</form>



