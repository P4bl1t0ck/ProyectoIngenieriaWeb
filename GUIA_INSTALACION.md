# 🎯 GUÍA DE INSTALACIÓN Y USO - Gestor de Tareas del Hogar

## 📝 ¿Qué hemos creado?

Un sistema completo de **Login + CRUD de Tareas del Hogar** basado en MVC usando Laravel.

### Estructura MVC explicada:

**M (Modelos):**
- `User.php` - Modelo de usuario con relación a tareas
- `HomeTask.php` - Modelo de tarea del hogar

**V (Vistas):**
- `auth/login.blade.php` - Formulario de login
- `auth/register.blade.php` - Formulario de registro
- `tasks/index.blade.php` - Lista de tareas
- `tasks/create.blade.php` - Crear nueva tarea
- `tasks/edit.blade.php` - Editar tarea

**C (Controladores):**
- `AuthController.php` - Maneja login, registro, logout
- `HomeTaskController.php` - Maneja CRUD completo de tareas

## 🚀 PASOS PARA EJECUTAR

### 1️⃣ Instalar dependencias
```bash
composer install
npm install
```

### 2️⃣ Crear archivo .env
```bash
cp .env.example .env
```

### 3️⃣ Generar APP_KEY
```bash
php artisan key:generate
```

### 4️⃣ Crear base de datos
Crea una base de datos MySQL/SQLite:
```sql
CREATE DATABASE prototipo02;
```

### 5️⃣ Configurar .env
Edita `.env` y configura tu BD:
```
DB_CONNECTION=mysql (o sqlite)
DB_DATABASE=prototipo02
DB_USERNAME=root
DB_PASSWORD=
```

Si usas SQLite:
```
DB_CONNECTION=sqlite
DB_DATABASE=/ruta/absoluta/database/database.sqlite
```

### 6️⃣ Ejecutar migraciones
```bash
php artisan migrate
```

Esto creará las tablas: `users`, `cache`, `jobs` y **`home_tasks`** (nueva)

### 7️⃣ Iniciar servidor
```bash
php artisan serve
```

Abre: http://localhost:8000

## 🎮 CÓMO USAR

### Primera vez:
1. Click en "Crear Cuenta" en la página principal
2. Rellena nombre, email, contraseña
3. ¡Voilà! Estás logeado

### Usar el CRUD:
1. **Crear**: Click "Nueva Tarea"
2. **Leer**: Ves la lista de tareas
3. **Actualizar**: Click "Editar" en cualquier tarea
4. **Eliminar**: Click "Eliminar" (pide confirmación)
5. **Bonus**: "Completar" marca tareas como hechas

## 📚 EXPLICACIÓN DEL FLUJO MVC

### Ejemplo: Crear una tarea

1. **RUTA** → `POST /tasks` (in `routes/web.php`)
2. **CONTROLADOR** → `HomeTaskController@store()` recibe los datos
3. **MODELO** → `HomeTask::create()` guarda en BD
4. **VISTA** → `tasks.index` muestra la lista actualizada

### Seguridad:

- Las tareas usan **Policy** (`HomeTaskPolicy.php`) 
- Solo el dueño puede ver/editar/eliminar sus tareas
- Sessions y CSRF protection activadas

## 🔑 USUARIOS DE PRUEBA

Crea las que quieras en el registro, pero aquí hay un ejemplo:

**Email:** test@example.com  
**Contraseña:** password123

## 🐛 SOLUCIÓN DE PROBLEMAS

### Error: "No such table: home_tasks"
```bash
php artisan migrate
```

### Error: CSRF token mismatch
Asegúrate de usar `@csrf` en todos los formularios (ya está hecho)

### Base de datos no funciona
Verifica la configuración en `.env`

## 📁 ESTRUCTURA DE ARCHIVOS NUEVA

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php (NEW)
│       └── HomeTaskController.php (NEW)
├── Models/
│   ├── User.php (MODIFICADO)
│   └── HomeTask.php (NEW)
├── Policies/
│   └── HomeTaskPolicy.php (NEW)

database/
└── migrations/
    └── 0001_01_01_000003_create_home_tasks_table.php (NEW)

resources/views/
├── auth/ (NEW)
│   ├── login.blade.php
│   └── register.blade.php
└── tasks/ (NEW)
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php
```

## 🎓 QUÉ APRENDISTE

✅ Modelos y Eloquent ORM  
✅ Migraciones de base de datos  
✅ Controladores y acciones  
✅ Vistas Blade  
✅ Rutas y grupos de rutas  
✅ Middleware (guest, auth)  
✅ Validación de datos  
✅ Políticas de autorización  
✅ Hashing de contraseñas  
✅ Autenticación de sesiones  

## 💡 PRÓXIMOS PASOS (Opcional)

1. **API REST**: Convierte el CRUD a API con rutas `/api`
2. **Validación avanzada**: Agrega más reglas de validación
3. **Búsqueda**: Filtra tareas por estado
4. **Prioridades**: Añade nivel de prioridad a tareas
5. **Notificaciones**: Email cuando alguien te invita

¡Éxito en tu aprendizaje! 🚀
