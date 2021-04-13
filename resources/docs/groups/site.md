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
    -d '{"dominio":"et"}'

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
    "dominio": "et"
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
            'dominio' => 'et',
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
<i><small>Ex: minhaloja.estoqueintegrado.com.br | minhaloja.com.br | minhaloja</small></p>

</form>


## Detalhes do produto


Retorna um array com 1 único produto

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/product/voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"dominio":"vel"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/product/voluptas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "dominio": "vel"
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
    'https://api.estoqueintegrado.com.br/v1/product/voluptas',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'dominio' => 'vel',
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



