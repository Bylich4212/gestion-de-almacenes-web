# Proyecto PHP: Sistema Trifásico Final

Este es un sistema web desarrollado en PHP que utiliza una base de datos MySQL. Todo el código fuente del proyecto está dentro de la carpeta:

```
vistas-materiales/vistas-materiales
```

---

## 📦 Requisitos

- PHP >= 7.4
- MySQL / MariaDB
- XAMPP (recomendado para entorno local)
- Navegador web (Chrome, Firefox, etc.)

---

## 🚀 Instalación y Configuración

### 1. Clonar o descargar el repositorio

```bash
git clone https://github.com/usuario/proyecto-trifasico.git
```

O descarga el ZIP del repositorio y colócalo en:

```
C:\xampp\htdocs\vistas-materiales
```

De modo que el path completo sea:

```
C:\xampp\htdocs\vistas-materiales\vistas-materiales
```

### 2. Importar la base de datos

1. Abre **phpMyAdmin** en tu navegador desde `http://localhost/phpmyadmin`
2. Crea una nueva base de datos llamada: `trifasica_final`
3. Importa el archivo SQL que se encuentra en el proyecto:

```
/sql/trifasica_final_solo_usuarios.sql
```

Este archivo incluye **solo los datos de la tabla `usuarios`** y la estructura del resto de las tablas.

---

## ⚙️ Configurar conexión a la base de datos

Edita el archivo:

```
vistas-materiales/vistas-materiales/modelos/conexion.modelo.php
```

Y reemplaza por tu configuración local (por defecto en XAMPP):

```php
$con = new PDO("mysql:host=localhost;dbname=trifasica_final", "root", "");
```

---

## 🔐 Usuario de acceso

Para ingresar al sistema, usa estas credenciales:

- **Usuario:** `admin`
- **Contraseña:** `admin`

---

## ▶️ Cómo correr el proyecto

1. Inicia **Apache** y **MySQL** desde el panel de XAMPP.
2. Abre tu navegador y accede a:

```
http://localhost/vistas-materiales/vistas-materiales
```

---

## 📁 Estructura del proyecto (resumen)

```
vistas-materiales/
└── vistas-materiales/
    ├── modelos/
    │   └── conexion.modelo.php
    ├── controladores/
    ├── vistas/
    ├── sql/
    │   └── trifasica_final_solo_usuarios.sql
    ├── index.php
    └── ...
```

---

## 🛠️ Notas

- El sistema fue probado con PHP 8.1 y MariaDB 10.4
- No se incluyen archivos de configuración confidenciales ni contraseñas reales.

---

## 📌 Autor

Proyecto desarrollado por [Sebastian Lichtenstein]
