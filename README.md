# TALL
Framework adaptado y basado [TALL](https://tallstack.dev/), que constan de las siguientes tecnologías:
- [**T**ailwindCSS](https://tailwindcss.com/) como framework de utilidad de CSS
  - Buenísimo tutorial de obligada lectura: [Manual de TailwindCSS](https://desarrolloweb.com/manuales/manual-de-tailwindcss)
  - Tematización con CSS custom properties: [Color Theming Tailwind](https://css-tricks.com/color-theming-with-css-custom-properties-and-tailwind)
  - Imprescindible cuando empiezas:
    - [Tailwind CHEATSHEET](https://nerdcave.com/tailwind-cheat-sheet)
    - [Tailwind Components CHEATSHEET](https://tailwindcomponents.com/cheatsheet/)
    - [Tailwind Components Repository](https://tailwindcomponents.com/)
- [**A**lpine.js](https://github.com/alpinejs/alpine) como framework de Javascript
  - Muy buen artículo: [Descubriendo Alpine.js, el framework liviano alternativa a jQuery](https://www.solucionex.com/blog/descubriendo-alpinejs-el-framework-liviano-alternativa-jquery)
  - Componentes Tailwind + Alpine: [Tailwind Components Alpine](https://tailwindcomponents.com/components/alpinejs)
- [**L**aravel](https://laravel.com/) como framework PHP
- [**L**ivewire](https://laravel-livewire.com/) como framework de componentes *Reactivos* y con *Data Binding*, basado en [Blade](https://laravel.com/docs/8.x/blade)
  - Mini-guía Livewire [Guía Livewire](https://desarrolloweb.com/home/livewire)

## Librerías indispensables
- [TailwindForms](https://github.com/tailwindlabs/tailwindcss-forms): Estilos básicos para elementos de formularios 
- [WireUI](https://livewire-wireui.com/): Componentes mínimos y básicos de Livewire

## Configuración xDebug para PHP Built-in WebServer
Configuración para IntelliJ IDEA / PHPStorm:
- Nueva configuración `Run/Debug Configurations`
- Crear configuración `PHP Built-in Web Server`
  - **Name:** El que se quiera
  - **Host:** `localhost`
  - **Port:** `8000`
  - **Document root:** Ruta al directorio `public` del proyecto
  - **Use router script:** Activar y establecer la ruta al archivo `server.php` del proyecto
  - El resto de opciones todas en blanco

Configuración para `php.ini`:
- Ir al [Installation Wizard](https://xdebug.org/wizard) y obtener la `DLL` correspondiente
- Instalar `DLL` en la carpeta `ext` de nuestra instalación de PHP
- Añadir al archivo `php.ini` las siguientes líneas al final del archivo
- Sustituir `zend_extension` del siguiente código por la instalada anteriormente
```
; XDEBUG Extension
zend_extension = D:\Devel\wamp64\bin\php\php7.4.9\ext\php_xdebug-3.0.4-7.4-vc15-x86_64.dll
xdebug.remote_enable = 1
xdebug.remote_autostart = 1
xdebug.client_port = 9000
xdebug.mode = debug
```

## Comandos
Servidor de aplicación:
```
php artisan serve
```

Watcher CSS:
```
npm run watch
```