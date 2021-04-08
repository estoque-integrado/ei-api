# Usuarios


## Login

<small class="badge badge-darkred">requires authentication</small>

Faz o login do usuario
Se email e senha coincidirem, gera um md5 da data concatenando com o ID do usuário
e salva no campo api_token com o tempo definido no arquivo .env TIME_TO_RESET_TOKEN

> Example request:

```bash
curl -X POST \
    "http://localhost/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","login":"dolorem","password":"nulla"}'

```

```javascript
const url = new URL(
    "http://localhost/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "login": "dolorem",
    "password": "nulla"
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
    'http://localhost/v1/login',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'login' => 'dolorem',
            'password' => 'nulla',
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



