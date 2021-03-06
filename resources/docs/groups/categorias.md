# Categorias


## Criar categoria

<small class="badge badge-darkred">requires authentication</small>

Cria uma categoria

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/categories" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "api_token=b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3" \
    -F "dominio=officia" \
    -F "nome=animi" \
    -F "slug=quo" \
    -F "descricao=eius" \
    -F "ativo=" \
    -F "slug_auto=" \
    -F "imagem=@/tmp/phpz9FtSN"     -F "miniatura=@/tmp/phpES2ztV" 
```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/categories"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('api_token', 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3');
body.append('dominio', 'officia');
body.append('nome', 'animi');
body.append('slug', 'quo');
body.append('descricao', 'eius');
body.append('ativo', '');
body.append('slug_auto', '');
body.append('imagem', document.querySelector('input[name="imagem"]').files[0]);
body.append('miniatura', document.querySelector('input[name="miniatura"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://api.estoqueintegrado.com.br/v1/categories',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'api_token',
                'contents' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3'
            ],
            [
                'name' => 'dominio',
                'contents' => 'officia'
            ],
            [
                'name' => 'nome',
                'contents' => 'animi'
            ],
            [
                'name' => 'slug',
                'contents' => 'quo'
            ],
            [
                'name' => 'descricao',
                'contents' => 'eius'
            ],
            [
                'name' => 'ativo',
                'contents' => ''
            ],
            [
                'name' => 'slug_auto',
                'contents' => ''
            ],
            [
                'name' => 'imagem',
                'contents' => fopen('/tmp/phpz9FtSN', 'r')
            ],
            [
                'name' => 'miniatura',
                'contents' => fopen('/tmp/phpES2ztV', 'r')
            ],
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
     "nome": "Nome da categoria",
     "slug": "produtos-banho",
     "imagem": "caminho/da/imagem"
     [...]
}
```
<div id="execution-results-POSTv1-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-categories"></code></pre>
</div>
<div id="execution-error-POSTv1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-categories"></code></pre>
</div>
<form id="form-POSTv1-categories" data-method="POST" data-path="v1/categories" data-authed="1" data-hasfiles="2" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-categories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-categories" onclick="tryItOut('POSTv1-categories');">Try it out ???</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-categories" onclick="cancelTryOut('POSTv1-categories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-categories" hidden>Send Request ????</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/categories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-categories" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="POSTv1-categories" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTv1-categories" data-component="body" required  hidden>
<br>
Nome da categoria</p>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slug" data-endpoint="POSTv1-categories" data-component="body" required  hidden>
<br>
Slug do produto.
<br>Caracteres permitidos: n??mero, texto, "-", "_" <br><i><small>Ex: casa-e-jardim | casa_e_jardim</small></i></p>
<p>
<b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao" data-endpoint="POSTv1-categories" data-component="body"  hidden>
<br>
Descri????o da categoria</p>
<p>
<b><code>imagem</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="imagem" data-endpoint="POSTv1-categories" data-component="body"  hidden>
<br>
Imagem da categoria</p>
<p>
<b><code>miniatura</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="miniatura" data-endpoint="POSTv1-categories" data-component="body"  hidden>
<br>
Miniatura da imagem da categoria</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-categories" hidden><input type="radio" name="ativo" value="true" data-endpoint="POSTv1-categories" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-categories" hidden><input type="radio" name="ativo" value="false" data-endpoint="POSTv1-categories" data-component="body" ><code>false</code></label>
<br>
Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</small></i></p>
<p>
<b><code>slug_auto</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-categories" hidden><input type="radio" name="slug_auto" value="true" data-endpoint="POSTv1-categories" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-categories" hidden><input type="radio" name="slug_auto" value="false" data-endpoint="POSTv1-categories" data-component="body" ><code>false</code></label>
<br>
Criar slug automaticamente; <br><i><small>Sim = 1, N??o = 0</small></i></p>

</form>


## Atualizar Categoria

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados da categoria

> Example request:

```bash
curl -X PUT \
    "https://api.estoqueintegrado.com.br/v1/categories/18" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "api_token=b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3" \
    -F "dominio=voluptatem" \
    -F "nome=commodi" \
    -F "slug=eaque" \
    -F "descricao=et" \
    -F "ativo=1" \
    -F "imagem=@/tmp/phpvukZ42"     -F "miniatura=@/tmp/phpNjypGa" 
```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/categories/18"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('api_token', 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3');
body.append('dominio', 'voluptatem');
body.append('nome', 'commodi');
body.append('slug', 'eaque');
body.append('descricao', 'et');
body.append('ativo', '1');
body.append('imagem', document.querySelector('input[name="imagem"]').files[0]);
body.append('miniatura', document.querySelector('input[name="miniatura"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://api.estoqueintegrado.com.br/v1/categories/18',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'api_token',
                'contents' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3'
            ],
            [
                'name' => 'dominio',
                'contents' => 'voluptatem'
            ],
            [
                'name' => 'nome',
                'contents' => 'commodi'
            ],
            [
                'name' => 'slug',
                'contents' => 'eaque'
            ],
            [
                'name' => 'descricao',
                'contents' => 'et'
            ],
            [
                'name' => 'ativo',
                'contents' => '1'
            ],
            [
                'name' => 'imagem',
                'contents' => fopen('/tmp/phpvukZ42', 'r')
            ],
            [
                'name' => 'miniatura',
                'contents' => fopen('/tmp/phpNjypGa', 'r')
            ],
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
     "nome": "Nome da categoria",
     "slug": "produtos-beleza",
     "imagem": "caminho/da/imagem"
     [...]
}
```
<div id="execution-results-PUTv1-categories--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-categories--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-categories--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-categories--id-"></code></pre>
</div>
<form id="form-PUTv1-categories--id-" data-method="PUT" data-path="v1/categories/{id}" data-authed="1" data-hasfiles="2" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-categories--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-categories--id-" onclick="tryItOut('PUTv1-categories--id-');">Try it out ???</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-categories--id-" onclick="cancelTryOut('PUTv1-categories--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-categories--id-" hidden>Send Request ????</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/categories/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTv1-categories--id-" data-component="url" required  hidden>
<br>
ID da categoria</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-categories--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="PUTv1-categories--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="PUTv1-categories--id-" data-component="body" required  hidden>
<br>
Nome da categoria</p>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="slug" data-endpoint="PUTv1-categories--id-" data-component="body"  hidden>
<br>
Slug do produto <br><i><small>Ex: calca_preta_jean</i></small></p>
<p>
<b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao" data-endpoint="PUTv1-categories--id-" data-component="body"  hidden>
<br>
Descri????o da categoria</p>
<p>
<b><code>imagem</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="imagem" data-endpoint="PUTv1-categories--id-" data-component="body"  hidden>
<br>
Imagem da categoria</p>
<p>
<b><code>miniatura</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="miniatura" data-endpoint="PUTv1-categories--id-" data-component="body"  hidden>
<br>
Miniatura da imagem da categoria</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-categories--id-" hidden><input type="radio" name="ativo" value="true" data-endpoint="PUTv1-categories--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-categories--id-" hidden><input type="radio" name="ativo" value="false" data-endpoint="PUTv1-categories--id-" data-component="body" ><code>false</code></label>
<br>
Status da categoria <br><i><small>Ativo = 1, Desativado = 0. Default 1</i></small></p>

</form>


## Detalhes Categoria

<small class="badge badge-darkred">requires authentication</small>

Retorna os detalhes da categoria

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/categories/14" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"sint"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/categories/14"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "sint"
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
    'https://api.estoqueintegrado.com.br/v1/categories/14',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'sint',
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
     "nome": "Nome da categoria",
     "slug": "produtos-beleza",
     "imagem": "caminho/da/imagem"
     [...]
}
```
<div id="execution-results-GETv1-categories--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-categories--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-categories--id-"></code></pre>
</div>
<div id="execution-error-GETv1-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-categories--id-"></code></pre>
</div>
<form id="form-GETv1-categories--id-" data-method="GET" data-path="v1/categories/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-categories--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-categories--id-" onclick="tryItOut('GETv1-categories--id-');">Try it out ???</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-categories--id-" onclick="cancelTryOut('GETv1-categories--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-categories--id-" hidden>Send Request ????</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/categories/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-categories--id-" data-component="url" required  hidden>
<br>
ID da categoria</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-categories--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="GETv1-categories--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>


## Deletar Categoria

<small class="badge badge-darkred">requires authentication</small>

Deleta a categoria

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/categories/13" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","dominio":"magni"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/categories/13"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "dominio": "magni"
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
    'https://api.estoqueintegrado.com.br/v1/categories/13',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'dominio' => 'magni',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200, success):

```json

{
     "message": "Categoria deletada!",
}
```
<div id="execution-results-DELETEv1-categories--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-categories--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-categories--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-categories--id-"></code></pre>
</div>
<form id="form-DELETEv1-categories--id-" data-method="DELETE" data-path="v1/categories/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-categories--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-categories--id-" onclick="tryItOut('DELETEv1-categories--id-');">Try it out ???</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-categories--id-" onclick="cancelTryOut('DELETEv1-categories--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-categories--id-" hidden>Send Request ????</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/categories/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-categories--id-" data-component="url" required  hidden>
<br>
ID da categoria</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-categories--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>dominio</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dominio" data-endpoint="DELETEv1-categories--id-" data-component="body" required  hidden>
<br>
Dominio da empresa <br>
<i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small></p>

</form>



