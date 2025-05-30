# Proyecto Videoblog Web

Este proyecto es una plataforma web para la creación y consumo de videoblogs, diseñada para ofrecer una experiencia moderna, intuitiva y funcional tanto para creadores de contenido como para visitantes.

---

## Características principales

- Autenticación y registro de usuarios
- Panel de administración para usuarios autenticados
- Subida, reproducción y gestión de videos
- Sistema de comentarios
- Interfaz responsiva basada en Tailwind CSS
- Backend robusto desarrollado en PHP
- Base de datos relacional en MySQL
- Seguridad básica en formularios y sesiones

---

## Tecnologías utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla), Tailwind CSS
- **Backend**: PHP 8.x
- **Base de datos**: MySQL 5.7+
- **Control de versiones**: Git
- **Servidor local recomendado**: XAMPP / Laragon / WAMP

---

## Requisitos mínimos

Antes de clonar o instalar este proyecto, asegúrate de contar con el siguiente entorno:

- PHP 8.0 o superior
- MySQL 5.7 o superior
- Servidor Apache
- Composer (opcional, si se requiere autoloading)
- Navegador actualizado (Chrome, Firefox, Edge)
- Entorno local **XAMPP**

---

## Instalación paso a paso

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/Genito919/MI-PROYECTO.git
   ```

2. **Mover el proyecto a la carpeta del servidor:**

   - En XAMPP, mover a: `C:/xampp/htdocs/`

3. **Crear la base de datos:**

   - Abrir **phpMyAdmin** o herramienta similar
   - Crear una base de datos, por ejemplo: `videoblog_db`
   - Importar el archivo `database.sql` ubicado en el proyecto

4. **Configurar la conexión a la base de datos:**

   Editar el archivo `db.php` o similar y colocar tus credenciales:

   ```php
   $host = 'localhost';
   $dbname = 'proyecto_bloger';
   $user = 'root';
   $password = '1920';
   ```

5. **Iniciar el servidor:**

   - Abrir XAMPP y activar **Apache** y **MySQL**
   - Acceder al proyecto en el navegador:
     ```
     http://localhost/PROYECTO/
     ```

6. **(Opcional) Configurar permisos de subida de archivos:**

   Asegúrate de que la carpeta `uploads/` tenga permisos de escritura.

---

## Licencia

Este proyecto está bajo una **Licencia Personalizada**.  
Los derechos de uso, modificación y distribución están restringidos al equipo de desarrollo autorizado o a quienes tengan permiso explícito del autor.

**Queda prohibido:**

- Distribuir el código con fines comerciales sin consentimiento.
- Eliminar esta cláusula de licencia del código fuente.

Para más información o solicitar un permiso de uso, contactar al autor del proyecto.

---

## Autor

- **Nombre:** Genito Andrade
- **Contacto:** [genito919@gmail.com]
- **Repositorio oficial:** [https://github.com/Genito919/MI-PROYECTO.git]

---

## Estado del proyecto

> **Versión estable y funcional.**  
> Aún se pueden incorporar mejoras avanzadas como integración de notificaciones en tiempo real, sistema de comentarios con moderación, búsqueda inteligente con autocompletado, sistema de recomendaciones basado en comportamiento del usuario, implementación de un panel administrativo completo y refuerzo de seguridad mediante validaciones más estrictas y control de acceso basado en roles.


---

## Agradecimientos

A todas las herramientas y tecnologías open source utilizadas para construir esta plataforma educativa y funcional.
