# Endereço


## Criar Endereço

<small class="badge badge-darkred">requires authentication</small>

Cria uma Endereço

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/address" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"quis","empresa_id":7,"user_id":18,"rua":"autem","numero":20,"bairro":"iste","complemento":"est","cidade":"non","uf":"maxime","pais":"harum","cep":"est","padrao":false,"ativo":false}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/address"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "quis",
    "empresa_id": 7,
    "user_id": 18,
    "rua": "autem",
    "numero": 20,
    "bairro": "iste",
    "complemento": "est",
    "cidade": "non",
    "uf": "maxime",
    "pais": "harum",
    "cep": "est",
    "padrao": false,
    "ativo": false
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
    'https://api.estoqueintegrado.com.br/v1/address',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'quis',
            'empresa_id' => 7,
            'user_id' => 18,
            'rua' => 'autem',
            'numero' => 20,
            'bairro' => 'iste',
            'complemento' => 'est',
            'cidade' => 'non',
            'uf' => 'maxime',
            'pais' => 'harum',
            'cep' => 'est',
            'padrao' => false,
            'ativo' => false,
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
     "rua": "Nome da rua",
     "numero": 322,
     "bairro": "bairro"
     [...]
}
```
<div id="execution-results-POSTv1-address" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-address"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-address"></code></pre>
</div>
<div id="execution-error-POSTv1-address" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-address"></code></pre>
</div>
<form id="form-POSTv1-address" data-method="POST" data-path="v1/address" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-address', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-address" onclick="tryItOut('POSTv1-address');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-address" onclick="cancelTryOut('POSTv1-address');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-address" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/address</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>empresa_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="empresa_id" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
ID da empresa</p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user_id" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
ID do usuário</p>
<p>
<b><code>rua</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="rua" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
Nome da rua</p>
<p>
<b><code>numero</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="numero" data-endpoint="POSTv1-address" data-component="body" required  hidden>
<br>
Numero do endereço</p>
<p>
<b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bairro" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
Nome do bairro</p>
<p>
<b><code>complemento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="complemento" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
Complemento</p>
<p>
<b><code>cidade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cidade" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
Nome da cidade</p>
<p>
<b><code>uf</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="uf" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
Sigla do estado <small>Ex: MG</small></p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pais" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
País</p>
<p>
<b><code>cep</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cep" data-endpoint="POSTv1-address" data-component="body"  hidden>
<br>
Cep da rua</p>
<p>
<b><code>padrao</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-address" hidden><input type="radio" name="padrao" value="true" data-endpoint="POSTv1-address" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-address" hidden><input type="radio" name="padrao" value="false" data-endpoint="POSTv1-address" data-component="body" ><code>false</code></label>
<br>
Se o endereço é o padrão</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-address" hidden><input type="radio" name="ativo" value="true" data-endpoint="POSTv1-address" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-address" hidden><input type="radio" name="ativo" value="false" data-endpoint="POSTv1-address" data-component="body" ><code>false</code></label>
<br>
Se o endereço está ativo ou não. <small>Default: 1</small></p>

</form>


## Atualizar Endereço

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados do endereço

> Example request:

```bash
curl -X PUT \
    "https://api.estoqueintegrado.com.br/v1/address/8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"est","rua":"occaecati","numero":14,"bairro":"magni","complemento":"et","cidade":"earum","uf":"ut","pais":"velit","cep":"vero","padrao":true,"ativo":true}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/address/8"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "est",
    "rua": "occaecati",
    "numero": 14,
    "bairro": "magni",
    "complemento": "et",
    "cidade": "earum",
    "uf": "ut",
    "pais": "velit",
    "cep": "vero",
    "padrao": true,
    "ativo": true
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
    'https://api.estoqueintegrado.com.br/v1/address/8',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'est',
            'rua' => 'occaecati',
            'numero' => 14,
            'bairro' => 'magni',
            'complemento' => 'et',
            'cidade' => 'earum',
            'uf' => 'ut',
            'pais' => 'velit',
            'cep' => 'vero',
            'padrao' => true,
            'ativo' => true,
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
     "rua": "Nome da rua",
     "numero": 322,
     "bairro": "bairro"
     [...]
}
```
<div id="execution-results-PUTv1-address--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-address--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-address--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-address--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-address--id-"></code></pre>
</div>
<form id="form-PUTv1-address--id-" data-method="PUT" data-path="v1/address/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-address--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-address--id-" onclick="tryItOut('PUTv1-address--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-address--id-" onclick="cancelTryOut('PUTv1-address--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-address--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/address/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTv1-address--id-" data-component="url" required  hidden>
<br>
ID da endereço</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-address--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="PUTv1-address--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>rua</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="rua" data-endpoint="PUTv1-address--id-" data-component="body" required  hidden>
<br>
Nome da rua</p>
<p>
<b><code>numero</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="numero" data-endpoint="PUTv1-address--id-" data-component="body" required  hidden>
<br>
Numero do endereço</p>
<p>
<b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bairro" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
Nome do bairro</p>
<p>
<b><code>complemento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="complemento" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
Complemento</p>
<p>
<b><code>cidade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cidade" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
Nome da cidade</p>
<p>
<b><code>uf</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="uf" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
Sigla do estado <small>Ex: MG</small></p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pais" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
País</p>
<p>
<b><code>cep</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cep" data-endpoint="PUTv1-address--id-" data-component="body"  hidden>
<br>
Cep da rua</p>
<p>
<b><code>padrao</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-address--id-" hidden><input type="radio" name="padrao" value="true" data-endpoint="PUTv1-address--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-address--id-" hidden><input type="radio" name="padrao" value="false" data-endpoint="PUTv1-address--id-" data-component="body" ><code>false</code></label>
<br>
Se o endereço é o padrão</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-address--id-" hidden><input type="radio" name="ativo" value="true" data-endpoint="PUTv1-address--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-address--id-" hidden><input type="radio" name="ativo" value="false" data-endpoint="PUTv1-address--id-" data-component="body" ><code>false</code></label>
<br>
Se o endereço está ativo ou não. <small>Default: 1</small> * @param Request $request</p>

</form>


## Detalhes Endereço

<small class="badge badge-darkred">requires authentication</small>

Retorna os detalhes do endereço

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/address/18" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"doloremque"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/address/18"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "doloremque"
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
    'https://api.estoqueintegrado.com.br/v1/address/18',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'doloremque',
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
     "rua": "Nome da rua",
     "numero": 322,
     "bairro": "bairro"
     [...]
}
```
<div id="execution-results-GETv1-address--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-address--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-address--id-"></code></pre>
</div>
<div id="execution-error-GETv1-address--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-address--id-"></code></pre>
</div>
<form id="form-GETv1-address--id-" data-method="GET" data-path="v1/address/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-address--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-address--id-" onclick="tryItOut('GETv1-address--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-address--id-" onclick="cancelTryOut('GETv1-address--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-address--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/address/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-address--id-" data-component="url" required  hidden>
<br>
ID do endereço</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-address--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="GETv1-address--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>


## Deletar Endereço

<small class="badge badge-darkred">requires authentication</small>

Deleta o endereço

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/address/2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"voluptatem"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/address/2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "voluptatem"
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
    'https://api.estoqueintegrado.com.br/v1/address/2',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'voluptatem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200, success):

```json

{
     "message": "Endereço deletado!",
}
```
<div id="execution-results-DELETEv1-address--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-address--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-address--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-address--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-address--id-"></code></pre>
</div>
<form id="form-DELETEv1-address--id-" data-method="DELETE" data-path="v1/address/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-address--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-address--id-" onclick="tryItOut('DELETEv1-address--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-address--id-" onclick="cancelTryOut('DELETEv1-address--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-address--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/address/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-address--id-" data-component="url" required  hidden>
<br>
ID do endereço</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-address--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="DELETEv1-address--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>



