# Harryes Appointment

#  Implementación: Appointment CRUD

##  Descripción
Este proyecto implementa el paquete **harryes/crudpackage** para generar automáticamente operaciones CRUD completas sobre el modelo `Appointment` (citas médicas).

El paquete permite generar **models, migrations, controllers, resources y routes** con un solo comando Artisan, acelerando el desarrollo backend en Laravel.

La implementación utiliza modificadores de columna avanzados:
- `?` → campos opcionales (`nullable`)
- `*valor` → valores por defecto

---

##  Diferencia con el proyecto original
A diferencia del ejemplo original enfocado en la gestión de usuarios, este proyecto implementa un sistema de **gestión de citas médicas**, incorporando atributos y lógica propios del dominio como:

- Duración de la consulta  
- Estado de confirmación (`confirmed`)  
- Fecha de la cita  
- Notas médicas opcionales  

Esto representa un caso de uso distinto enfocado en servicios de salud.

---

##  Requisitos
- PHP >= 8.2  
- Composer  
- Laravel 11  
- MySQL o base de datos compatible  
- Laravel Herd (opcional)

---

##  Instalación

### 1. Crear el proyecto
```bash
cd ~/Herd
composer create-project laravel/laravel harryes-appointment
cd harryes-appointment
```

### 2. Configurar base de datos

Editar `.env`:

```env
DB_DATABASE=harryes_appointment
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Instalar el paquete
```bash
composer require harryes/crudpackage
```

### 4. Registrar rutas API

En `bootstrap/app.php`:

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

### 5. Crear archivo API (si no existe)
```bash
php artisan install:api
```

### 6. Generar CRUD
```bash
php artisan crud:generate Appointment \
--columns=patient_name:string,doctor:string,date:string,notes:string?,confirmed:boolean*false,duration:integer*30
```

---

##  Estructura de datos

| Campo         | Tipo            | Descripción                     |
|--------------|-----------------|---------------------------------|
| patient_name | string          | Nombre del paciente             |
| doctor       | string          | Nombre del doctor               |
| date         | string          | Fecha de la cita                |
| notes        | string?         | Opcional                        |
| confirmed    | boolean*false   | Estado de confirmación          |
| duration     | integer*30      | Duración en minutos             |

---

##  Migración
```bash
php artisan migrate
```

---

##  URL del proyecto
```
http://harryes-appointment.test
```

---

##  Endpoints

| Método | Endpoint                          | Descripción              |
|--------|----------------------------------|--------------------------|
| GET    | /api/appointments                | Listar citas             |
| POST   | /api/appointments                | Crear cita               |
| GET    | /api/appointments/{id}           | Obtener cita             |
| PUT    | /api/appointments/{id}           | Actualizar cita          |
| DELETE | /api/appointments/{id}           | Eliminar cita            |

---

##  Ejemplo POST

```json
{
  "patient_name": "Ana Torres",
  "doctor": "Dr. Ramirez",
  "date": "2026-04-20",
  "notes": "Primera consulta",
  "confirmed": false,
  "duration": 45
}
```

---

##  Archivos generados

- `app/Models/Appointment.php`
- `app/Http/Controllers/Api/AppointmentController.php`
- `app/Http/Resources/AppointmentResource.php`
- `database/migrations/*appointments_table.php`
- `routes/api.php`

---

##  Notas

- Herd ejecuta el proyecto automáticamente  
- Respuestas JSON estructuradas con Resources  
- Validaciones implementadas con Form Requests  
- Errores 422 en validación  
- Logs en `storage/logs/laravel.log`

##  Validaciones implementadas

- `patient_name`: requerido  
- `doctor`: requerido  
- `date`: requerido  
- `duration`: debe ser mayor a 0  
- `confirmed`: booleano  

Esto asegura la integridad de los datos al crear o actualizar citas.

---

##  Autor
**Tabata Carolina Salinas Valdez     A01770901**


## Nota importante
Si despues de instalar el paquete el archivo routes/api.php no existe (Laravel 11 no lo genera por defecto), crearlo manualmente con <?php al inicio o ejecutar php artisan install:api antes de correr la migracion.
