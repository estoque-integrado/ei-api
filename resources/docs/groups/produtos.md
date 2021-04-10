# Produtos


## Criar produto

<small class="badge badge-darkred">requires authentication</small>

Cria um produto

> Example request:

```bash
curl -X POST \
    "http://localhost/v1/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","empresa_id":3,"categoria_id":15,"nome":"iure","imagens":"dolores","slug":"dicta","sku":"quaerat","descricao_curta":"sint","descricao_completa":"delectus","preco_custo":0.2588,"preco_venda":0.235871,"preco_promocional":77.3106,"peso":6,"altura":15,"largura":17,"diametro":13,"comprimento":5,"titulo_seo":"qui","tags_seo":"earum","descricao_seo":"sed","ativo":false,"destaque":true,"variacao_preco_cor":false,"variacao_preco_tamanho":false}'

```

```javascript
const url = new URL(
    "http://localhost/v1/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "empresa_id": 3,
    "categoria_id": 15,
    "nome": "iure",
    "imagens": "dolores",
    "slug": "dicta",
    "sku": "quaerat",
    "descricao_curta": "sint",
    "descricao_completa": "delectus",
    "preco_custo": 0.2588,
    "preco_venda": 0.235871,
    "preco_promocional": 77.3106,
    "peso": 6,
    "altura": 15,
    "largura": 17,
    "diametro": 13,
    "comprimento": 5,
    "titulo_seo": "qui",
    "tags_seo": "earum",
    "descricao_seo": "sed",
    "ativo": false,
    "destaque": true,
    "variacao_preco_cor": false,
    "variacao_preco_tamanho": false
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
    'http://localhost/v1/products',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'empresa_id' => 3,
            'categoria_id' => 15,
            'nome' => 'iure',
            'imagens' => 'dolores',
            'slug' => 'dicta',
            'sku' => 'quaerat',
            'descricao_curta' => 'sint',
            'descricao_completa' => 'delectus',
            'preco_custo' => 0.2588,
            'preco_venda' => 0.235871,
            'preco_promocional' => 77.3106,
            'peso' => 6,
            'altura' => 15,
            'largura' => 17,
            'diametro' => 13,
            'comprimento' => 5,
            'titulo_seo' => 'qui',
            'tags_seo' => 'earum',
            'descricao_seo' => 'sed',
            'ativo' => false,
            'destaque' => true,
            'variacao_preco_cor' => false,
            'variacao_preco_tamanho' => false,
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
     "nome": "Nome produto",
     "preco_venda": "",
     "preco_promocional": ""
     [...]
}
```
<div id="execution-results-POSTv1-products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTv1-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTv1-products"></code></pre>
</div>
<div id="execution-error-POSTv1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTv1-products"></code></pre>
</div>
<form id="form-POSTv1-products" data-method="POST" data-path="v1/products" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTv1-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTv1-products" onclick="tryItOut('POSTv1-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTv1-products" onclick="cancelTryOut('POSTv1-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTv1-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>v1/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>empresa_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="empresa_id" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
ID da empresa proprietária do produto</p>
<p>
<b><code>categoria_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="categoria_id" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
ID da categoria cadastrada e ativa do produto</p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
Nome do produto</p>
<p>
<b><code>imagens</code></b>&nbsp;&nbsp;<small>array</small>     <i>optional</i> &nbsp;
<input type="text" name="imagens" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Array de fotos do produto. <i><small>Maximo: 5 fotos</i></small></p>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slug" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
Slug do produto <br><i><small>Ex: calca_preta_jeans</i></small></p>
<p>
<b><code>sku</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sku" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
Sku do produto <br><i><small>Ex: CAMPM20211013</i></small></p>
<p>
<b><code>descricao_curta</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_curta" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Descrição simples do produto</p>
<p>
<b><code>descricao_completa</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_completa" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Descrição detalhada do produto</p>
<p>
<b><code>preco_custo</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="preco_custo" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Preço de custo do produto <br><i><small>Ex: 80.00</i></small></p>
<p>
<b><code>preco_venda</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="preco_venda" data-endpoint="POSTv1-products" data-component="body" required  hidden>
<br>
Preço de venda do produto <br><i><small>Ex: 120.00</i></small></p>
<p>
<b><code>preco_promocional</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="preco_promocional" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Preço promocional do produto <br><i><small>Ex: 99.90</i></small></p>
<p>
<b><code>peso</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="peso" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Peso do produto em Gramas <br><i><small>Ex: 100</i></small></p>
<p>
<b><code>altura</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="altura" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Altura do produto em Cm <br><i><small>Ex: 80</i></small></p>
<p>
<b><code>largura</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="largura" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Largura do produto em Cm <br><i><small>Ex: 50</i></small></p>
<p>
<b><code>diametro</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="diametro" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Diametro do produto</p>
<p>
<b><code>comprimento</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="comprimento" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Comprimento do produto</p>
<p>
<b><code>titulo_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="titulo_seo" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Titiulo SEO do produto</p>
<p>
<b><code>tags_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags_seo" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Tags SEO do produto</p>
<p>
<b><code>descricao_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_seo" data-endpoint="POSTv1-products" data-component="body"  hidden>
<br>
Descrição SEO do produto</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="ativo" value="true" data-endpoint="POSTv1-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="ativo" value="false" data-endpoint="POSTv1-products" data-component="body" ><code>false</code></label>
<br>
Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</i></small></p>
<p>
<b><code>destaque</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="destaque" value="true" data-endpoint="POSTv1-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="destaque" value="false" data-endpoint="POSTv1-products" data-component="body" ><code>false</code></label>
<br>
Se o produto é destaque. <i><small>Default 0</i></small></p>
<p>
<b><code>variacao_preco_cor</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="variacao_preco_cor" value="true" data-endpoint="POSTv1-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="variacao_preco_cor" value="false" data-endpoint="POSTv1-products" data-component="body" ><code>false</code></label>
<br>
Se o valor do produto varia de acordo com a cor. Default 0</p>
<p>
<b><code>variacao_preco_tamanho</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="variacao_preco_tamanho" value="true" data-endpoint="POSTv1-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTv1-products" hidden><input type="radio" name="variacao_preco_tamanho" value="false" data-endpoint="POSTv1-products" data-component="body" ><code>false</code></label>
<br>
Se o valor do produto varia de acordo com o tamanho. Default 0</p>

</form>


## Atualizar produto

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados de um produto

> Example request:

```bash
curl -X PUT \
    "http://localhost/v1/products/doloribus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3","categoria_id":11,"nome":"voluptas","imagens":"sit","slug":"eius","sku":"consequatur","descricao_curta":"voluptate","descricao_completa":"quo","preco_custo":58.092834,"preco_venda":796.307,"preco_promocional":160.92,"peso":3,"altura":1,"largura":13,"diametro":14,"comprimento":9,"titulo_seo":"adipisci","tags_seo":"quas","descricao_seo":"eum","ativo":true,"destaque":true,"variacao_preco_cor":false,"variacao_preco_tamanho":true}'

```

```javascript
const url = new URL(
    "http://localhost/v1/products/doloribus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "api_token": "b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3",
    "categoria_id": 11,
    "nome": "voluptas",
    "imagens": "sit",
    "slug": "eius",
    "sku": "consequatur",
    "descricao_curta": "voluptate",
    "descricao_completa": "quo",
    "preco_custo": 58.092834,
    "preco_venda": 796.307,
    "preco_promocional": 160.92,
    "peso": 3,
    "altura": 1,
    "largura": 13,
    "diametro": 14,
    "comprimento": 9,
    "titulo_seo": "adipisci",
    "tags_seo": "quas",
    "descricao_seo": "eum",
    "ativo": true,
    "destaque": true,
    "variacao_preco_cor": false,
    "variacao_preco_tamanho": true
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
    'http://localhost/v1/products/doloribus',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'api_token' => 'b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3',
            'categoria_id' => 11,
            'nome' => 'voluptas',
            'imagens' => 'sit',
            'slug' => 'eius',
            'sku' => 'consequatur',
            'descricao_curta' => 'voluptate',
            'descricao_completa' => 'quo',
            'preco_custo' => 58.092834,
            'preco_venda' => 796.307,
            'preco_promocional' => 160.92,
            'peso' => 3,
            'altura' => 1,
            'largura' => 13,
            'diametro' => 14,
            'comprimento' => 9,
            'titulo_seo' => 'adipisci',
            'tags_seo' => 'quas',
            'descricao_seo' => 'eum',
            'ativo' => true,
            'destaque' => true,
            'variacao_preco_cor' => false,
            'variacao_preco_tamanho' => true,
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
     "nome": "Nome produto",
     "preco_venda": "",
     "preco_promocional": ""
     [...]
}
```
<div id="execution-results-PUTv1-products--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTv1-products--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTv1-products--id-"></code></pre>
</div>
<div id="execution-error-PUTv1-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTv1-products--id-"></code></pre>
</div>
<form id="form-PUTv1-products--id-" data-method="PUT" data-path="v1/products/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTv1-products--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTv1-products--id-" onclick="tryItOut('PUTv1-products--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTv1-products--id-" onclick="cancelTryOut('PUTv1-products--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTv1-products--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>v1/products/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTv1-products--id-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>
<p>
<b><code>categoria_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="categoria_id" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
ID da categoria cadastrada e ativa do produto</p>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
Nome do produto</p>
<p>
<b><code>imagens</code></b>&nbsp;&nbsp;<small>array</small>     <i>optional</i> &nbsp;
<input type="text" name="imagens" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Array de fotos do produto. <i><small>Maximo: 5 fotos</i></small></p>
<p>
<b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slug" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
Slug do produto <br><i><small>Ex: calca_preta_jeans</i></small></p>
<p>
<b><code>sku</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sku" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
Sku do produto <br><i><small>Ex: CAMPM20211013</i></small></p>
<p>
<b><code>descricao_curta</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_curta" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Descrição simples do produto</p>
<p>
<b><code>descricao_completa</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_completa" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Descrição detalhada do produto</p>
<p>
<b><code>preco_custo</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="preco_custo" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Preço de custo do produto <br><i><small>Ex: 80.00</i></small></p>
<p>
<b><code>preco_venda</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="preco_venda" data-endpoint="PUTv1-products--id-" data-component="body" required  hidden>
<br>
Preço de venda do produto <br><i><small>Ex: 120.00</i></small></p>
<p>
<b><code>preco_promocional</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="preco_promocional" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Preço promocional do produto <br><i><small>Ex: 99.90</i></small></p>
<p>
<b><code>peso</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="peso" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Peso do produto em Gramas <br><i><small>Ex: 100</i></small></p>
<p>
<b><code>altura</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="altura" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Altura do produto em Cm <br><i><small>Ex: 80</i></small></p>
<p>
<b><code>largura</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="largura" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Largura do produto em Cm <br><i><small>Ex: 50</i></small></p>
<p>
<b><code>diametro</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="diametro" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Diametro do produto</p>
<p>
<b><code>comprimento</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="comprimento" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Comprimento do produto</p>
<p>
<b><code>titulo_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="titulo_seo" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Titiulo SEO do produto</p>
<p>
<b><code>tags_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags_seo" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Tags SEO do produto</p>
<p>
<b><code>descricao_seo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao_seo" data-endpoint="PUTv1-products--id-" data-component="body"  hidden>
<br>
Descrição SEO do produto</p>
<p>
<b><code>ativo</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="ativo" value="true" data-endpoint="PUTv1-products--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="ativo" value="false" data-endpoint="PUTv1-products--id-" data-component="body" ><code>false</code></label>
<br>
Status do produto <br><i><small>Ativo = 1, Desativado = 0. Default 1</i></small></p>
<p>
<b><code>destaque</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="destaque" value="true" data-endpoint="PUTv1-products--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="destaque" value="false" data-endpoint="PUTv1-products--id-" data-component="body" ><code>false</code></label>
<br>
Se o produto é destaque. <i><small>Default 0</i></small></p>
<p>
<b><code>variacao_preco_cor</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="variacao_preco_cor" value="true" data-endpoint="PUTv1-products--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="variacao_preco_cor" value="false" data-endpoint="PUTv1-products--id-" data-component="body" ><code>false</code></label>
<br>
Se o valor do produto varia de acordo com a cor. Default 0</p>
<p>
<b><code>variacao_preco_tamanho</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="variacao_preco_tamanho" value="true" data-endpoint="PUTv1-products--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTv1-products--id-" hidden><input type="radio" name="variacao_preco_tamanho" value="false" data-endpoint="PUTv1-products--id-" data-component="body" ><code>false</code></label>
<br>
Se o valor do produto varia de acordo com o tamanho. Default 0</p>

</form>


## Detalhes do produto


Retorna os detalhes de um produto

> Example request:

```bash
curl -X GET \
    -G "http://localhost/v1/products/10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/v1/products/10"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/v1/products/10',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "message": "Empresa não encontrada!"
}
```
<div id="execution-results-GETv1-products--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETv1-products--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETv1-products--id-"></code></pre>
</div>
<div id="execution-error-GETv1-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETv1-products--id-"></code></pre>
</div>
<form id="form-GETv1-products--id-" data-method="GET" data-path="v1/products/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETv1-products--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETv1-products--id-" onclick="tryItOut('GETv1-products--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETv1-products--id-" onclick="cancelTryOut('GETv1-products--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETv1-products--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>v1/products/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETv1-products--id-" data-component="url" required  hidden>
<br>
ID do produto</p>
</form>


## Deletar Produto

<small class="badge badge-darkred">requires authentication</small>

Deleta um produto com softDeletes

> Example request:

```bash
curl -X DELETE \
    "http://localhost/v1/products/14" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"api_token":"b1e04a93c85e3711b2d4972b4d81796c-eccbc87e4b5ce2fe28308fd9f2a7baf3"}'

```

```javascript
const url = new URL(
    "http://localhost/v1/products/14"
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
    'http://localhost/v1/products/14',
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


<div id="execution-results-DELETEv1-products--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEv1-products--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEv1-products--id-"></code></pre>
</div>
<div id="execution-error-DELETEv1-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEv1-products--id-"></code></pre>
</div>
<form id="form-DELETEv1-products--id-" data-method="DELETE" data-path="v1/products/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEv1-products--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEv1-products--id-" onclick="tryItOut('DELETEv1-products--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEv1-products--id-" onclick="cancelTryOut('DELETEv1-products--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEv1-products--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>v1/products/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEv1-products--id-" data-component="url" required  hidden>
<br>
ID do produto</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>api_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="api_token" data-endpoint="DELETEv1-products--id-" data-component="body" required  hidden>
<br>
Authentication key.</p>

</form>



