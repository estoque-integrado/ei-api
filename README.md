# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## Passos para a migração

Renomear tabela estoque para estoque2

rodar migration 2021_04_13_005544_stock_table.php

copiar Estoque.php e VaricaoPreco.php do projeto antigo

rodar endpoint v1/migrar-estoque

--- estoque migrado ---

- ver campos removidos da tabela produtos
    - remover tabelas variacao*

- Renomear campo valor para subtotal, tabela vendas
- Renomear campo valor_total para total, tabela vendas
- Renomear campo nome para cliente, tabela vendas
- Renomear campo valor_desconto para desconto_juros_valor, tabela vendas

- adicionar coluna valor_pago, tabela vendas_extrato
