# Carrinho


## Criar item no carrinho

<small class="badge badge-darkred">requires authentication</small>

Cria um item no carrinho

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/cart" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"sit","produto_id":2,"cor_id":2,"tamanho_id":20,"quantidade":15}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/cart"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "sit",
    "produto_id": 2,
    "cor_id": 2,
    "tamanho_id": 20,
    "quantidade": 15
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
    'https://api.estoqueintegrado.com.br/v1/cart',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'sit',
            'produto_id' => 2,
            'cor_id' => 2,
            'tamanho_id' => 20,
            'quantidade' => 15,
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
    "user_id": 3,
    "empresa_id": 2,
    "produto_id": 2313,
    "cor_id": null,
    "tamanho_id": 645,
    "quantidade": 1,
    "valor_produto": 199.88,
    "subtotal": 199.88
}
```
<div id="execution-results-POSTv1-cart" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-cart"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-cart"></code></pre>
</div>
<div id="execution-error-POSTv1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-cart"></code></pre>
</div>
<form id="form-POSTv1-cart" data-method="POST" data-path="v1/cart" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-cart', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-cart" onclick="tryItOut('POSTv1-cart');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-cart" onclick="cancelTryOut('POSTv1-cart');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-cart" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/cart</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-cart" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-cart" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>produto_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="produto_id" data-endpoint="POSTv1-cart" data-component="body" required  hidden>
<br>
ID do produto</p>
<p>
<b><code>cor_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="cor_id" data-endpoint="POSTv1-cart" data-component="body"  hidden>
<br>
ID da cor</p>
<p>
<b><code>tamanho_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="tamanho_id" data-endpoint="POSTv1-cart" data-component="body"  hidden>
<br>
ID da tamanho</p>
<p>
<b><code>quantidade</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quantidade" data-endpoint="POSTv1-cart" data-component="body" required  hidden>
<br>
Quantidade de produtos</p>

</form>


## Aumentar quantidade item carrinho

<small class="badge badge-darkred">requires authentication</small>

Soma 1 ao valor da quantidade do item do carrinho

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/cart/sum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"tempore","product_id":18,"cor_id":5,"tamanho_id":13}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/cart/sum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "tempore",
    "product_id": 18,
    "cor_id": 5,
    "tamanho_id": 13
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
    'https://api.estoqueintegrado.com.br/v1/cart/sum',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'tempore',
            'product_id' => 18,
            'cor_id' => 5,
            'tamanho_id' => 13,
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
    "user_id": 3,
    "empresa_id": 2,
    "produto_id": 2313,
    "cor_id": null,
    "tamanho_id": 645,
    "quantidade": 1,
    "valor_produto": 199.88,
    "subtotal": 199.88
}
```
<div id="execution-results-POSTv1-cart-sum" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-cart-sum"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-cart-sum"></code></pre>
</div>
<div id="execution-error-POSTv1-cart-sum" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-cart-sum"></code></pre>
</div>
<form id="form-POSTv1-cart-sum" data-method="POST" data-path="v1/cart/sum" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-cart-sum', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-cart-sum" onclick="tryItOut('POSTv1-cart-sum');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-cart-sum" onclick="cancelTryOut('POSTv1-cart-sum');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-cart-sum" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/cart/sum</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-cart-sum" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-cart-sum" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product_id" data-endpoint="POSTv1-cart-sum" data-component="body" required  hidden>
<br>
ID do produto</p>
<p>
<b><code>cor_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="cor_id" data-endpoint="POSTv1-cart-sum" data-component="body"  hidden>
<br>
ID da cor</p>
<p>
<b><code>tamanho_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="tamanho_id" data-endpoint="POSTv1-cart-sum" data-component="body"  hidden>
<br>
ID da tamanho</p>

</form>


## Diminuir quantidade item carrinho

<small class="badge badge-darkred">requires authentication</small>

reduz 1 do valor da quantidade do item do carrinho

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/cart/reduce" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"cum","product_id":3,"cor_id":18,"tamanho_id":3}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/cart/reduce"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "cum",
    "product_id": 3,
    "cor_id": 18,
    "tamanho_id": 3
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
    'https://api.estoqueintegrado.com.br/v1/cart/reduce',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'cum',
            'product_id' => 3,
            'cor_id' => 18,
            'tamanho_id' => 3,
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
    "user_id": 3,
    "empresa_id": 2,
    "produto_id": 2313,
    "cor_id": null,
    "tamanho_id": 645,
    "quantidade": 1,
    "valor_produto": 199.88,
    "subtotal": 199.88
}
```
<div id="execution-results-POSTv1-cart-reduce" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-cart-reduce"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-cart-reduce"></code></pre>
</div>
<div id="execution-error-POSTv1-cart-reduce" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-cart-reduce"></code></pre>
</div>
<form id="form-POSTv1-cart-reduce" data-method="POST" data-path="v1/cart/reduce" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-cart-reduce', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-cart-reduce" onclick="tryItOut('POSTv1-cart-reduce');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-cart-reduce" onclick="cancelTryOut('POSTv1-cart-reduce');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-cart-reduce" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/cart/reduce</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-cart-reduce" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-cart-reduce" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product_id" data-endpoint="POSTv1-cart-reduce" data-component="body" required  hidden>
<br>
ID do produto</p>
<p>
<b><code>cor_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="cor_id" data-endpoint="POSTv1-cart-reduce" data-component="body"  hidden>
<br>
ID da cor</p>
<p>
<b><code>tamanho_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="tamanho_id" data-endpoint="POSTv1-cart-reduce" data-component="body"  hidden>
<br>
ID da tamanho</p>

</form>


## Deletar item do carrinho

<small class="badge badge-darkred">requires authentication</small>

Deleta um item do carrinho

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/cart/14" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"exercitationem"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/cart/14"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "exercitationem"
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://api.estoqueintegrado.com.br/v1/cart/14',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'exercitationem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "message":"Produto deletado do carrinho!",
}
```
<div id="execution-results-DELETEv1-cart--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-cart--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-cart--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-cart--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-cart--id-"></code></pre>
</div>
<form id="form-DELETEv1-cart--id-" data-method="DELETE" data-path="v1/cart/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-cart--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-cart--id-" onclick="tryItOut('DELETEv1-cart--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-cart--id-" onclick="cancelTryOut('DELETEv1-cart--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-cart--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/cart/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-cart--id-" data-component="url" required  hidden>
<br>
ID do carrinho</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-cart--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="DELETEv1-cart--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>



