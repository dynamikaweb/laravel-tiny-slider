dynamikasolucoesweb/laravel-tiny-slider
=========================
![php version](https://img.shields.io/packagist/php-v/dynamikasolucoesweb/laravel-tiny-slider)
![pkg version](https://img.shields.io/packagist/v/dynamikasolucoesweb/laravel-tiny-slider)
![license](https://img.shields.io/packagist/l/dynamikasolucoesweb/laravel-tiny-slider)
![quality](https://img.shields.io/scrutinizer/quality/g/dynamikaweb/laravel-tiny-slider)
![build](https://img.shields.io/scrutinizer/build/g/dynamikaweb/laravel-tiny-slider)

Um componente Blade robusto e flexível para integração do Tiny Slider em aplicações Laravel.

Instalação
------------
A maneira preferida de instalar esta extensão é através do [composer] [composer](http://getcomposer.org/download/).

Ou corre

```SHELL
$ composer require dynamikasolucoesweb/laravel-tiny-slider "*"
```

ou adicione

```JSON
"dynamikasolucoesweb/laravel-tiny-slider": "*"
```

à seção `require` do seu arquivo `composer.json`.

Requisitos do Layout
------------
Para que os assets (CSS e JS) sejam injetados corretamente, certifique-se de que seu arquivo de layout principal (ex: layouts/app.blade.php) contenha as pilhas (@stack) correspondentes: @stack('styles') @stack('scripts')

```html
<head>
    @stack('styles')
</head>
<body>
    {{ $slot }}

    @stack('scripts')
</body>
```

Opções de Assets
------------
Você pode usar o :cdn="true" no componente para começar a utiliza-lo. Ele utiliza o Cloudflare para entregar o CSS e o JS do Tiny Slider. Graças ao uso de @pushonce, esses arquivos são carregados apenas uma vez, mesmo que você utilize múltiplos sliders na mesma página.


Usando Assets Locais (Vite/NPM)
------------
Se preferir gerenciar os assets localmente:

1. Instale a biblioteca:

```SHELL
npm install tiny-slider
```

2. No seu resources/js/app.js: 

```SHELL
import { tns } from 'tiny-slider';
window.tns = tns;
```

3. No seu resources/css/app.css:

```SHELL
@import 'tiny-slider/dist/tiny-slider.css';
```

Uso Básico
------------
Você pode carregar os assets via CDN, permitindo o uso imediato sem configurações adicionais de compilação.

```html
<x-tiny-slider :options="['items' => 1, 'autoplay' => true]" :cdn="true">
    <div class="banner">
        <img src="banner1.jpg" alt="Slide 1">
    </div>
    <div class="banner">
        <img src="banner2.jpg" alt="Slide 2">
    </div>
</x-tiny-slider>
```

Opções do Componente
------------

| Atributo | Tipo | Descrição |
| :------- | :--: | :---------- |
| options | array | Opções nativas do Tiny Slider (items, speed, mode, etc). |
| container | string | Tag HTML do container `default: div` |
| cdn | boolean | Se true, carrega assets via Cloudflare. |
| id | string | ID HTML customizado. Se omitido, um ID aleatório é gerado. |
| exportName | string | Nome da variável JS para acessar a instância do slider. |
| clientScript | string\JsExpression | Função JS callback executada após o init.<br/>`example: slider => console.log(slider)`<br/>`example: console.log(my_export)` |

Exemplo Avançado
------------
Simulando um carrossel de banners dinâmicos com scripts customizados:

```html
<x-tiny-slider 
    :options="[
        'autoplay' => true,
        'controls' => false,
        'mouseDrag' => true,
        'items' => 1
    ]"
    exportName="meuSlider"
    clientScript="function(slider) { console.log('Slider ID:', slider.getInfo().container.id); }"
>
    @foreach($banners as $banner)
        <div class="item">
            <a href="{{ $banner->link }}">
                <img src="{{ $banner->image_url }}" alt="">
            </a>
        </div>
    @endforeach
</x-tiny-slider>
```

Authors
------------
Giordani da Silveira dos Santos - giordani@dynamika.com.br

--------------------------------------------------------------------------------------------------------------
[![dynamika soluções web](https://avatars.githubusercontent.com/dynamikaweb?size=12)](https://dynamika.com.br)
This project is under [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause) license.