# Harryes Appointment

Implementacion: Appointment CRUD


Descripcion
Este proyecto implementa el paquete harryes/crudpackage para generar automaticamente operaciones CRUD completas sobre el modelo Appointment (citas medicas). El paquete genera models, migrations, controllers, resources y routes con un solo comando Artisan.
La implementacion utiliza modificadores de columna avanzados: nullable (?) para campos opcionales y valores por defecto (*valor) para campos con estado inicial predefinido.


Requisitos
PHP >= 8.2
Composer instalado globalmente
Laravel 11 (proyecto nuevo o existente)
MySQL o base de datos compatible
Laravel Herd (opcional, recomendado en macOS/Windows)


Instalacion
1. Crear el proyecto
cd ~/Herd
composer create-project laravel/laravel harryes-appointment
cd harryes-appointment
2. Configurar la base de datos
Edita el archivo .env con los datos de tu base de datos:
DB_DATABASE=harryes_appointment
DB_USERNAME=root
DB_PASSWORD=
3. Instalar el paquete
composer require harryes/crudpackage
4. Registrar la ruta API
En bootstrap/app.php, agregar la linea de API dentro del bloque withRouting:
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',  // agregar esta linea
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
5. Crear routes/api.php si no existe
En Laravel 11, este archivo no se genera automaticamente. Crearlo manualmente:
echo "<?php" > routes/api.php
O ejecutar el comando oficial:
php artisan install:api


Generacion del CRUD
Ejecutar el siguiente comando para generar el modelo Appointment con todas sus columnas:

php artisan crud:generate Appointment \
  --columns=patient_name:string,doctor:string,date:string,
           notes:string?,confirmed:boolean*false,duration:integer*30

Modificadores utilizados
Columna
Modificador
Descripcion
patient_name
string
Nombre del paciente, requerido
doctor
string
Nombre del doctor, requerido
date
string
Fecha de la cita, requerido
notes
string?
Notas adicionales, nullable (opcional)
confirmed
boolean*false
Estado de confirmacion, default: false
duration
integer*30
Duracion en minutos, default: 30



Migracion y servidor
php artisan migrate

Con Laravel Herd no es necesario correr php artisan serve. El proyecto queda disponible automaticamente en:
http://harryes-appointment.test


Endpoints disponibles

Metodo
URL
Descripcion
GET
/api/appointments
Listar todas las citas
POST
/api/appointments
Crear nueva cita
GET
/api/appointments/{id}
Obtener cita por ID
PUT
/api/appointments/{id}
Actualizar cita existente
DELETE
/api/appointments/{id}
Eliminar cita


Ejemplo de body para POST
{
  "patient_name": "Ana Torres",
  "doctor": "Dr. Ramirez",
  "date": "2026-04-20",
  "notes": "Primera consulta",
  "confirmed": false,
  "duration": 45
}


Archivos generados por el paquete
app/Models/Appointment.php
app/Http/Controllers/Api/AppointmentController.php
app/Http/Resources/AppointmentResource.php
database/migrations/xxxx_create_appointments_table.php
routes/api.php  (ruta apiResource agregada automaticamente)

A diferencia del ejemplo original enfocado en usuarios, este proyecto implementa un sistema de gestión de citas médicas, con atributos y lógica propios del dominio como duración, confirmación y fechas de consulta.


Nota importante
Si despues de instalar el paquete el archivo routes/api.php no existe (Laravel 11 no lo genera por defecto), crearlo manualmente con <?php al inicio o ejecutar php artisan install:api antes de correr la migracion.
