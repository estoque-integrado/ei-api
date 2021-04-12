# Usuarios


## Criar usuário

<small class="badge badge-darkred">requires authentication</small>

Cria um usuário.

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","name":"libero","cpf":"repellat","email":"voluptates","password":"aut","celular":"quod"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "name": "libero",
    "cpf": "repellat",
    "email": "voluptates",
    "password": "aut",
    "celular": "quod"
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
    'https://api.estoqueintegrado.com.br/v1/users',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'name' => 'libero',
            'cpf' => 'repellat',
            'email' => 'voluptates',
            'password' => 'aut',
            'celular' => 'quod',
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
     "name": "Nome usuario",
     "email": "teste@estoqueintegrado.com"
     [...]
}
```
<div id="execution-results-POSTv1-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-users"></code></pre>
</div>
<div id="execution-error-POSTv1-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-users"></code></pre>
</div>
<form id="form-POSTv1-users" data-method="POST" data-path="v1/users" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-users" onclick="tryItOut('POSTv1-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-users" onclick="cancelTryOut('POSTv1-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-users" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTv1-users" data-component="body" required  hidden>
<br>
Nome do usuário</p>
<p>
<b><code>cpf</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cpf" data-endpoint="POSTv1-users" data-component="body" required  hidden>
<br>
Cpf com ou sem formatação Ex: 111.111.111-11</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTv1-users" data-component="body" required  hidden>
<br>
Email do usuário Ex: teste@estoqueintegrado.com</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="password" data-endpoint="POSTv1-users" data-component="body"  hidden>
<br>
Senha do usuário</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="celular" data-endpoint="POSTv1-users" data-component="body"  hidden>
<br>
Celular do usuário</p>

</form>


## Atualizar usuario

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados de um usuário

> Example request:

```bash
curl -X PUT \
    "https://api.estoqueintegrado.com.br/v1/users/12" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/users/12"
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
    'https://api.estoqueintegrado.com.br/v1/users/12',
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


> Example response (200, success):

```json

{
     "id": 1,
     "name": "Ronierison Sena"
     "email": "teste@teste.com"
     [...]
}
```
> Example response (404, user not found):

```json
{
    "message": "usuário não encontrado."
}
```
<div id="execution-results-PUTv1-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-users--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-users--id-"></code></pre>
</div>
<form id="form-PUTv1-users--id-" data-method="PUT" data-path="v1/users/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-users--id-" onclick="tryItOut('PUTv1-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-users--id-" onclick="cancelTryOut('PUTv1-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/users/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTv1-users--id-" data-component="url" required  hidden>
<br>
ID do usuário</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-users--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>


## Detalhes usuario.

<small class="badge badge-darkred">requires authentication</small>

Retorna os detalhes do Usuario.

> Example request:

```bash
curl -X GET \
    -G "https://api.estoqueintegrado.com.br/v1/users/8" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/users/8"
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
    'https://api.estoqueintegrado.com.br/v1/users/8',
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
     "nome":"Nome do usuario",
     "email":"usuario@estoqueintegrado.com",
     [...]
```
> Example response (404, user not found):

```json
{
    "message": "usuário não encontrado."
}
```
<div id="execution-results-GETv1-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-users--id-"></code></pre>
</div>
<div id="execution-error-GETv1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-users--id-"></code></pre>
</div>
<form id="form-GETv1-users--id-" data-method="GET" data-path="v1/users/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-users--id-" onclick="tryItOut('GETv1-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-users--id-" onclick="cancelTryOut('GETv1-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/users/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-users--id-" data-component="url" required  hidden>
<br>
ID da Usuario</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="GETv1-users--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>


## Deletar usuario

<small class="badge badge-darkred">requires authentication</small>

Deletar um usuário

> Example request:

```bash
curl -X DELETE \
    "https://api.estoqueintegrado.com.br/v1/users/perspiciatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","id":3}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/users/perspiciatis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "id": 3
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
    'https://api.estoqueintegrado.com.br/v1/users/perspiciatis',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'id' => 3,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200, success):

```json

{
     "id": 1,
     "name": "Ronierison Sena"
     "email": "teste@teste.com"
     [...]
}
```
> Example response (404, user not found):

```json
{
    "message": "usuário não encontrado."
}
```
<div id="execution-results-DELETEv1-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-users--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-users--id-"></code></pre>
</div>
<form id="form-DELETEv1-users--id-" data-method="DELETE" data-path="v1/users/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-users--id-" onclick="tryItOut('DELETEv1-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-users--id-" onclick="cancelTryOut('DELETEv1-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/users/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEv1-users--id-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-users--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-users--id-" data-component="body" required  hidden>
<br>
ID do usuário</p>

</form>


## Login

<small class="badge badge-darkred">requires authentication</small>

Faz o login do usuario
Se email e senha coincidirem, gera um md5 da data concatenando com o ID do usuário
e salva no campo api_token com o tempo definido no arquivo .env TIME_TO_RESET_TOKEN

> Example request:

```bash
curl -X POST \
    "https://api.estoqueintegrado.com.br/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","login":"ipsum","password":"ullam"}'

```

```javascript
const url = new URL(
    "https://api.estoqueintegrado.com.br/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "login": "ipsum",
    "password": "ullam"
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
    'https://api.estoqueintegrado.com.br/v1/login',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'login' => 'ipsum',
            'password' => 'ullam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

string
```
<div id="execution-results-POSTv1-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-login"></code></pre>
</div>
<div id="execution-error-POSTv1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-login"></code></pre>
</div>
<form id="form-POSTv1-login" data-method="POST" data-path="v1/login" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-login" onclick="tryItOut('POSTv1-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-login" onclick="cancelTryOut('POSTv1-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-login" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>login</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="login" data-endpoint="POSTv1-login" data-component="body" required  hidden>
<br>
Email do usuário</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTv1-login" data-component="body" required  hidden>
<br>
Senha do usuário</p>

</form>



