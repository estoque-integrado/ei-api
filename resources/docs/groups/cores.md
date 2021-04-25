# Cores


## Criar Cor

<small class="badge badge-darkred">requires authentication</small>

Cria uma cor

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/colors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"nisi","nome":"iste","hex":"aut"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/colors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "nisi",
    "nome": "iste",
    "hex": "aut"
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
    'https://api.estoqueintegrado.com.br/v1/colors',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'nisi',
            'nome' => 'iste',
            'hex' => 'aut',
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
     "nome": "Preto",
     "hex": #000000,
}
```
<div id="execution-results-POSTv1-colors" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-colors"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-colors"></code></pre>
</div>
<div id="execution-error-POSTv1-colors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-colors"></code></pre>
</div>
<form id="form-POSTv1-colors" data-method="POST" data-path="v1/colors" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-colors', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-colors" onclick="tryItOut('POSTv1-colors');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-colors" onclick="cancelTryOut('POSTv1-colors');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-colors" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/colors</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-colors" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-colors" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTv1-colors" data-component="body" required  hidden>
<br>
Nome do tamanho <small>Ex: 50ml|P|300g</small></p>
<p>
<b><code>hex</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hex" data-endpoint="POSTv1-colors" data-component="body" required  hidden>
<br>
Hexadecimal da cor Ex: #000000</p>

</form>


## Atualizar Cor

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados da cor

> Example request:

```bash
curl -X PUT \
    "https://api.estoqueintegrado.com.br/v1/colors/in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"enim","nome":"ut","hex":"alias"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/colors/in"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "enim",
    "nome": "ut",
    "hex": "alias"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://api.estoqueintegrado.com.br/v1/colors/in',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'enim',
            'nome' => 'ut',
            'hex' => 'alias',
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
     "nome": "Preto",
     "hex": #000000,
}
```
<div id="execution-results-PUTv1-colors--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-colors--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-colors--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-colors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-colors--id-"></code></pre>
</div>
<form id="form-PUTv1-colors--id-" data-method="PUT" data-path="v1/colors/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-colors--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-colors--id-" onclick="tryItOut('PUTv1-colors--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-colors--id-" onclick="cancelTryOut('PUTv1-colors--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-colors--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/colors/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTv1-colors--id-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-colors--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="PUTv1-colors--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="PUTv1-colors--id-" data-component="body" required  hidden>
<br>
Nome do tamanho <small>Ex: 50ml|P|300g</small></p>
<p>
<b><code>hex</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hex" data-endpoint="PUTv1-colors--id-" data-component="body" required  hidden>
<br>
Hexadecimal da cor Ex: #000000</p>

</form>


## Detalhes Cor

<small class="badge badge-darkred">requires authentication</small>

Retorna os detalhes da Cor

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/colors/16" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"nobis"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/colors/16"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "nobis"
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
    'https://api.estoqueintegrado.com.br/v1/colors/16',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'nobis',
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
     "nome": "Preto",
     "empresa_id": 322,
}
```
<div id="execution-results-GETv1-colors--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-colors--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-colors--id-"></code></pre>
</div>
<div id="execution-error-GETv1-colors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-colors--id-"></code></pre>
</div>
<form id="form-GETv1-colors--id-" data-method="GET" data-path="v1/colors/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-colors--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-colors--id-" onclick="tryItOut('GETv1-colors--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-colors--id-" onclick="cancelTryOut('GETv1-colors--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-colors--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/colors/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-colors--id-" data-component="url" required  hidden>
<br>
ID da cor</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-colors--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="GETv1-colors--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>


## Deletar Cor

<small class="badge badge-darkred">requires authentication</small>

Deleta uma cor

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/colors/6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"et"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/colors/6"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "et"
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
    'https://api.estoqueintegrado.com.br/v1/colors/6',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
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
     "message": "Cor deletada!",
}
```
<div id="execution-results-DELETEv1-colors--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-colors--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-colors--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-colors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-colors--id-"></code></pre>
</div>
<form id="form-DELETEv1-colors--id-" data-method="DELETE" data-path="v1/colors/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-colors--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-colors--id-" onclick="tryItOut('DELETEv1-colors--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-colors--id-" onclick="cancelTryOut('DELETEv1-colors--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-colors--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/colors/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-colors--id-" data-component="url" required  hidden>
<br>
ID da Cor</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-colors--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="DELETEv1-colors--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>



