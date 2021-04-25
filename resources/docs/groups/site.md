# Site


## Index da loja


<aside>Retorna a loja de acordo com o domínio ou subdominio. <br>
Retorna dados, produtos, carrinho (se houver usuario logado) <br>
Ex: minhaempresa.estoqueintegrado.com.br
</aside>

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"dominio":"est"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "dominio": "est"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://api.estoqueintegrado.com.br/',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'dominio' => 'est',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "id": 1,
     "nome":"Nome da empresa",
     "email":"email@estoqueintegrado.com",
     [...]
     "products": [
         {
             "id": 1,
             "nome":"Product 1",
             "sku":"CAMISAM_2021",
             [...]
         },
         {
             "id": 2,
             "nome":"Product 2",
             "sku":"BLUSAP321",
         }
     ],
     "cart": [
         {
             "id": 1,
             "produto_id":12,
             "empresa_id":99,
             "quantidade":2,
             [...]
         },
         [...]
     ]
}
```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="GET-" data-component="body" required  hidden>
<br>
Dominio da loja registrado no banco de dados. <br>
<i><small>Ex: minhaloja.estoqueintegrado.com.br | minhaloja.com.br | minhaloja</small></i></p>

</form>


## Detalhes do produto


Retorna um array com 1 único produto

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/product/repellat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"dominio":"quia"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/product/repellat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "dominio": "quia"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://api.estoqueintegrado.com.br/v1/product/repellat',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'dominio' => 'quia',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{[
     "id":1,
     "nome":"Nome do produto",
     "slug":"slug",
     [...]
]}
```
<div id="execution-results-GETv1-product--idOrSlug-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-product--idOrSlug-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-product--idOrSlug-"></code></pre>
</div>
<div id="execution-error-GETv1-product--idOrSlug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-product--idOrSlug-"></code></pre>
</div>
<form id="form-GETv1-product--idOrSlug-" data-method="GET" data-path="v1/product/{idOrSlug}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-product--idOrSlug-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-product--idOrSlug-" onclick="tryItOut('GETv1-product--idOrSlug-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-product--idOrSlug-" onclick="cancelTryOut('GETv1-product--idOrSlug-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-product--idOrSlug-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/product/{idOrSlug}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>idOrSlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="idOrSlug" data-endpoint="GETv1-product--idOrSlug-" data-component="url"  hidden>
<br>
integer|string required ID ou slug do produto</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="GETv1-product--idOrSlug-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>


## Cadastrar pedido

<small class="badge badge-darkred">requires authentication</small>

Salvar um novo pedido

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/checkout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"non","valor_frete":23266855.333,"tipo_entrega":"minima","prazo_entrega":"velit","endereco_entrega_id":1,"desconto_codigo":"placeat","desconto_valor":705755,"desconto_percentual":true}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/checkout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "non",
    "valor_frete": 23266855.333,
    "tipo_entrega": "minima",
    "prazo_entrega": "velit",
    "endereco_entrega_id": 1,
    "desconto_codigo": "placeat",
    "desconto_valor": 705755,
    "desconto_percentual": true
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
    'https://api.estoqueintegrado.com.br/v1/checkout',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'non',
            'valor_frete' => 23266855.333,
            'tipo_entrega' => 'minima',
            'prazo_entrega' => 'velit',
            'endereco_entrega_id' => 1,
            'desconto_codigo' => 'placeat',
            'desconto_valor' => 705755.0,
            'desconto_percentual' => true,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200, success):

```json

{
     "id":1,
     "user_id":1,
     "numero": 100256,
     "valor": 1849.90
     [...]
}
```
<div id="execution-results-POSTv1-checkout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-checkout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-checkout"></code></pre>
</div>
<div id="execution-error-POSTv1-checkout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-checkout"></code></pre>
</div>
<form id="form-POSTv1-checkout" data-method="POST" data-path="v1/checkout" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-checkout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-checkout" onclick="tryItOut('POSTv1-checkout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-checkout" onclick="cancelTryOut('POSTv1-checkout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-checkout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/checkout</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>valor_frete</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="valor_frete" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
Valor do frete</p>
<p>
<b><code>tipo_entrega</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="tipo_entrega" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
Tipo de entrega: retirada|entrega</p>
<p>
<b><code>prazo_entrega</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prazo_entrega" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
Prazo de entrega</p>
<p>
<b><code>endereco_entrega_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="endereco_entrega_id" data-endpoint="POSTv1-checkout" data-component="body" required  hidden>
<br>
ID do endereço de entrega. Required se for entregar</p>
<p>
<b><code>desconto_codigo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="desconto_codigo" data-endpoint="POSTv1-checkout" data-component="body"  hidden>
<br>
Codigo do cupom de desconto</p>
<p>
<b><code>desconto_valor</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="desconto_valor" data-endpoint="POSTv1-checkout" data-component="body"  hidden>
<br>
Valor do desconto</p>
<p>
<b><code>desconto_percentual</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-checkout" hidden><input type="radio" name="desconto_percentual" value="true" data-endpoint="POSTv1-checkout" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-checkout" hidden><input type="radio" name="desconto_percentual" value="false" data-endpoint="POSTv1-checkout" data-component="body" ><code>false</code></label>
<br>
Se o desconto aplicado é em percentual(%) ou valor(R$)
<br><i><small>1 = desconto aplicado em percentual (%) | 2 = desconto aplicado em valor (R$)</i></small></p>

</form>



