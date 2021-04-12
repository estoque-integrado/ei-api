# Empresas


## Criar empresa.

<small class="badge badge-darkred">requires authentication</small>

Cria uma nova empresa.

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","user_id":6,"nome":"error","website":"laudantium","razao_social":"officia","cnpj":"eos","telefone":"est","celular":"aut","email":"possimus","logo":"aut","icone":"qui","matriz":true,"modo_catalogo":true}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "user_id": 6,
    "nome": "error",
    "website": "laudantium",
    "razao_social": "officia",
    "cnpj": "eos",
    "telefone": "est",
    "celular": "aut",
    "email": "possimus",
    "logo": "aut",
    "icone": "qui",
    "matriz": true,
    "modo_catalogo": true
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
    'https://api.estoqueintegrado.com.br/v1/companies',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'user_id' => 6,
            'nome' => 'error',
            'website' => 'laudantium',
            'razao_social' => 'officia',
            'cnpj' => 'eos',
            'telefone' => 'est',
            'celular' => 'aut',
            'email' => 'possimus',
            'logo' => 'aut',
            'icone' => 'qui',
            'matriz' => true,
            'modo_catalogo' => true,
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
     "nome":"Nome da empresa",
     "website":"Domínio da empresa",
     [...]
}
```
<div id="execution-results-POSTv1-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-companies"></code></pre>
</div>
<div id="execution-error-POSTv1-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-companies"></code></pre>
</div>
<form id="form-POSTv1-companies" data-method="POST" data-path="v1/companies" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-companies" onclick="tryItOut('POSTv1-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-companies" onclick="cancelTryOut('POSTv1-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/companies</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-companies" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user_id" data-endpoint="POSTv1-companies" data-component="body" required  hidden>
<br>
ID do usuario proprietario da empresa</p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTv1-companies" data-component="body" required  hidden>
<br>
Nome fantasia da empresa</p>
<p>
<b><code>website</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="website" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
URL customizada da empresa Ex: minhaloja.estoqueintegrado.com|minhaloja.com.br</p>
<p>
<b><code>razao_social</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="razao_social" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Razão social da empresa</p>
<p>
<b><code>cnpj</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cnpj" data-endpoint="POSTv1-companies" data-component="body" required  hidden>
<br>
CNPJ da empresa com ou sem formatação</p>
<p>
<b><code>telefone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="telefone" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Telefone da empresa</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="celular" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Celular da empresa</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Email da empresa</p>
<p>
<b><code>logo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="logo" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Path do caminho da logo salva</p>
<p>
<b><code>icone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="icone" data-endpoint="POSTv1-companies" data-component="body"  hidden>
<br>
Path do ícone da empresa</p>
<p>
<b><code>matriz</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-companies" hidden><input type="radio" name="matriz" value="true" data-endpoint="POSTv1-companies" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-companies" hidden><input type="radio" name="matriz" value="false" data-endpoint="POSTv1-companies" data-component="body" ><code>false</code></label>
<br>
Se essa empresa é matriz(1) ou filial (0)</p>
<p>
<b><code>modo_catalogo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-companies" hidden><input type="radio" name="modo_catalogo" value="true" data-endpoint="POSTv1-companies" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-companies" hidden><input type="radio" name="modo_catalogo" value="false" data-endpoint="POSTv1-companies" data-component="body" ><code>false</code></label>
<br>
Exibir banners na loja. 1 = sim, 0 = não. Default 0</p>

</form>


## Lista de empresas do usuario.

<small class="badge badge-darkred">requires authentication</small>

Retorna a lista de empresas que o usuário está associado.

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/my-companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","id":9}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/my-companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "id": 9
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
    'https://api.estoqueintegrado.com.br/v1/my-companies',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'id' => 9,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

[{
     "id":1,
     "nome":"Nome da empresa",
     "website":"Domínio da empresa",
     [...]
},
{
     "id":2,
     "nome":"Nome da empresa",
     "website":"Domínio da empresa",
     [...]
}]
```
<div id="execution-results-GETv1-my-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-my-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-my-companies"></code></pre>
</div>
<div id="execution-error-GETv1-my-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-my-companies"></code></pre>
</div>
<form id="form-GETv1-my-companies" data-method="GET" data-path="v1/my-companies" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-my-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-my-companies" onclick="tryItOut('GETv1-my-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-my-companies" onclick="cancelTryOut('GETv1-my-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-my-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/my-companies</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-my-companies" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-my-companies" data-component="body" required  hidden>
<br>
ID do usuario</p>

</form>


## Atualizar empresa.

<small class="badge badge-darkred">requires authentication</small>

Atualiza dados da empresa.
Usa softDeletes()

> Example request:

```bash
curl -X PUT \
    "https://api.estoqueintegrado.com.br/v1/companies/11" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/companies/11"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"
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
    'https://api.estoqueintegrado.com.br/v1/companies/11',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
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
     "nome":"Nome da empresa",
     "website":"Domínio da empresa",
     [...]
}
```
<div id="execution-results-PUTv1-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-companies--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-companies--id-"></code></pre>
</div>
<form id="form-PUTv1-companies--id-" data-method="PUT" data-path="v1/companies/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-companies--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-companies--id-" onclick="tryItOut('PUTv1-companies--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-companies--id-" onclick="cancelTryOut('PUTv1-companies--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-companies--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/companies/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTv1-companies--id-" data-component="url" required  hidden>
<br>
ID do usuario proprietario da empresa</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-companies--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>


## Detalhes empresa.

<small class="badge badge-darkred">requires authentication</small>

Retorna os detalhes da empresa.

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/companies/15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/companies/15"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"
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
    'https://api.estoqueintegrado.com.br/v1/companies/15',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
{
     "id":1,
     "nome":"Nome da empresa",
     "website":"Domínio da empresa",
     [...]
}
```
<div id="execution-results-GETv1-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-companies--id-"></code></pre>
</div>
<div id="execution-error-GETv1-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-companies--id-"></code></pre>
</div>
<form id="form-GETv1-companies--id-" data-method="GET" data-path="v1/companies/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-companies--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-companies--id-" onclick="tryItOut('GETv1-companies--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-companies--id-" onclick="cancelTryOut('GETv1-companies--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-companies--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/companies/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-companies--id-" data-component="url" required  hidden>
<br>
ID da empresa</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-companies--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>


## Deletar empresa.

<small class="badge badge-darkred">requires authentication</small>

Deleta a empresa.
Usa softDeletes()

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/companies/15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/companies/15"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"
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
    'https://api.estoqueintegrado.com.br/v1/companies/15',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "message": "Company deletada!"
}
```
<div id="execution-results-DELETEv1-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-companies--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-companies--id-"></code></pre>
</div>
<form id="form-DELETEv1-companies--id-" data-method="DELETE" data-path="v1/companies/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-companies--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-companies--id-" onclick="tryItOut('DELETEv1-companies--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-companies--id-" onclick="cancelTryOut('DELETEv1-companies--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-companies--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/companies/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-companies--id-" data-component="url" required  hidden>
<br>
ID da empresa</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-companies--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>



