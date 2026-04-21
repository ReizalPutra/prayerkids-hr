# Prayerkids HR Backend Documentation

**Last Updated:** April 9, 2026  
**Framework:** Laravel 11  
**Database:** SQLite (Development) / PostgreSQL (Production)  
**Authentication:** Laravel Sanctum (API Token)  
**Authorization:** Spatie Permission (Role-based Access Control)

---

## 📋 Table of Contents

1. [Project Overview](#project-overview)
2. [Architecture & Folder Structure](#architecture--folder-structure)
3. [Database Design](#database-design)
4. [Authentication & Authorization](#authentication--authorization)
5. [API Response Format](#api-response-format)
6. [Naming Conventions](#naming-conventions)
7. [How to Add a New Resource](#how-to-add-a-new-resource)
8. [Available Resources & Endpoints](#available-resources--endpoints)
9. [Permission & Role Matrix](#permission--role-matrix)
10. [Development Workflow](#development-workflow)

---

## Project Overview

**Prayerkids HR** adalah sistem manajemen sumber daya manusia (HRMS) untuk mengelola:

- **Operasional:** Divisi, Posisi, Shift, Lokasi Kehadiran, Template Kontrak
- **Manajemen SDM:** Karyawan, Kehadiran, Cuti, Gaji, Review Performa
- **Rekrutmen:** Lowongan Kerja, Pelamar, Tahap Aplikasi

### Tech Stack

| Komponen        | Detail                |
| --------------- | --------------------- |
| **Backend**     | Laravel 11 (PHP 8.2+) |
| **API**         | RESTful (JSON)        |
| **Auth**        | Sanctum (Token-based) |
| **RBAC**        | Spatie Permission     |
| **ORM**         | Eloquent              |
| **DB**          | SQLite / PostgreSQL   |
| **ID Strategy** | UUID (Primary Key)    |

---

## Architecture & Folder Structure

```
backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # API Endpoints (13 Controllers)
│   │   ├── Requests/             # Form Validation (12 Requests)
│   │   ├── Middleware/           # Custom Middlewares
│   │   └── Resources/            # Optional: API Responses
│   │
│   ├── Models/                   # Eloquent Models (13 Models + 2 Custom Auth)
│   │   ├── User.php
│   │   ├── Division.php
│   │   ├── Employee.php
│   │   ├── Attendance.php
│   │   ├── LeaveRequest.php
│   │   ├── Payroll.php
│   │   ├── PerformanceReview.php
│   │   ├── JobVacancy.php
│   │   ├── Applicant.php
│   │   ├── Position.php
│   │   ├── Shift.php
│   │   ├── AttendanceLocation.php
│   │   ├── ContractTemplate.php
│   │   ├── Role.php              # Custom: UUID-backed Spatie Role
│   │   ├── Permission.php        # Custom: UUID-backed Spatie Permission
│   │   └── PersonalAccessToken.php # Custom: UUID-backed Sanctum Token
│   │
│   ├── Policies/                 # Authorization Policies (13 Policies)
│   ├── Traits/
│   │   └── UsesUuid.php          # UUID trait untuk semua models
│   │   └── ApiResponse.php       # Standardized API response
│   └── Providers/
│       ├── AuthServiceProvider.php # Policy registration
│       └── AppServiceProvider.php  # Sanctum config
│
├── database/
│   ├── migrations/               # Schema definitions
│   ├── seeders/                  # Data seeding
│   │   ├── RolePermissionSeeder.php
│   │   ├── UserSeeder.php
│   │   └── DatabaseSeeder.php
│   └── factories/                # Model factories
│
├── routes/
│   ├── api.php                   # API endpoints (v1)
│   ├── web.php                   # Web routes
│   └── console.php               # Artisan commands
│
├── config/
│   ├── permission.php            # Spatie Permission config
│   ├── auth.php                  # Authentication config
│   └── database.php
│
└── tests/                        # Unit & Feature Tests
```

---

## Database Design

### Key Principles

1. **UUID Primary Keys:** Semua model menggunakan `uuid` sebagai primary key (string, 36 char)
    - Menggunakan trait `UsesUuid` di setiap model
    - Otomatis generate via `Illuminate\Database\Eloquent\Concerns\HasUuids`

2. **Soft Deletes:** Model domain utama menggunakan soft delete
    - `Division`, `Position`, `Shift`, `AttendanceLocation`, `Employee`, `JobVacancy`, `LeaveRequest` (transactional data keep history)
    - `Attendance`, `Payroll`, `PerformanceReview`, `ContractTemplate` tidak soft delete (immutable records)

3. **Timestamps:** `created_at`, `updated_at` pada semua model

### Core Models & Relationships

```
User (uuid)
├── Employee (via user_id)
│   ├── Division (nullable)
│   ├── Position (nullable)
│   ├── Attendance
│   ├── LeaveRequest
│   ├── Payroll
│   └── PerformanceReview (as employee & reviewer)
│
Division (uuid)
├── Position
│
Position (uuid)
├── Employee
├── JobVacancy
│
Shift (uuid)
├── Attendance
│
AttendanceLocation (uuid)
├── Attendance
│
JobVacancy (uuid)
├── Applicant
│
LeaveRequest (uuid)
├── Employee
│
Payroll (uuid)
├── Employee
│
PerformanceReview (uuid)
├── Employee (reviewer)
├── Employee (reviewee)
│
ContractTemplate (uuid)
│
Applicant (uuid)
├── JobVacancy
```

---

## Authentication & Authorization

### Authentication Flow (Sanctum)

```
1. POST /api/login
   ├─ Input: { username, password }
   ├─ Validate credentials
   ├─ Generate token via createToken('auth_token')
   └─ Return: { access_token, user }

2. Subsequent Request
   ├─ Header: Authorization: Bearer {token}
   ├─ Sanctum verifies token
   └─ Attach $request->user()

3. POST /api/logout
   ├─ Revoke current token
   └─ Return 200 OK
```

### Authorization (Spatie Permission)

**Gate/Policy Check:**

- `$user->hasPermissionTo('view_divisions')` → Check permission
- `$this->authorize('view', $division)` → Check policy in controller
- **Policy Method:** `viewAny()`, `view()`, `create()`, `update()`, `delete()`

**Custom Traits:**

- `UseUuid` on Models → Auto-generate UUIDs
- Model & Role/Permission punya UUID primary key

**Permission Key Format:**

- View: `view_{resource}` (plural), `view_{resource}_all`, `view_{resource}_own`
- Manage: `manage_{resource}` atau `create/edit/delete_{resource}`

---

## API Response Format

### Success Response

```json
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Data divisi berhasil diambil"
    },
    "data": [
        /* array atau single object */
    ]
}
```

**Status Code:**

- `200` OK → GET, PUT (update)
- `201` Created → POST (store)
- `204` No Content → DELETE
- `400` Bad Request → Validation error
- `401` Unauthorized → Token invalid/expired
- `403` Forbidden → Authority check failed
- `404` Not Found → Resource tidak ada
- `422` Unprocessable Entity → Validation error detail

### Error Response

```json
{
    "meta": {
        "code": 422,
        "status": "error",
        "message": "Validasi gagal"
    },
    "errors": {
        "name": ["Name field is required"],
        "email": ["Email must be valid"]
    }
}
```

**Source:** `app/Traits/ApiResponse.php` (Used in base Controller)

---

## Error Handling & Validation

### Form Request Validation

All API requests use Laravel's **Form Request** classes (`app/Http/Requests/`) for centralized validation and authorization.

#### Basic Form Request Structure

```php
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); // or gate/policy check
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|uuid|exists:users,id',
            'nik' => 'required|string|max:50|unique:employees,nik',
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email',
            'division_id' => 'nullable|uuid|exists:divisions,id',
            'position_id' => 'nullable|uuid|exists:positions,id',
            'gender' => 'required|in:L,P',
            'join_date' => 'required|date',
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'User harus dipilih',
            'user_id.uuid' => 'Format user_id tidak valid (harus UUID)',
            'user_id.exists' => 'User dengan ID tersebut tidak ditemukan',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK sudah terdaftar di sistem',
            'full_name.required' => 'Nama lengkap harus diisi',
            'gender.in' => 'Jenis kelamin harus L atau P',
            'join_date.date' => 'Format tanggal tidak valid (YYYY-MM-DD)',
        ];
    }

    /**
     * Handle failed validation.
     * Format error response sesuai API standard.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'meta' => [
                    'code' => 422,
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                ],
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
```

### Validation Rules Cheat Sheet

| Rule         | Usage                         | Example                            |
| ------------ | ----------------------------- | ---------------------------------- |
| **Type**     | `required`, `nullable`        | `'name' => 'required\|string'`     |
| **String**   | `string`, `email`, `url`      | `'email' => 'email'`               |
| **UUID**     | `uuid`                        | `'id' => 'uuid'`                   |
| **Database** | `exists:table,column`         | `'user_id' => 'exists:users,id'`   |
|              | `unique:table,column`         | `'nik' => 'unique:employees,nik'`  |
| **Size**     | `min`, `max`, `between`       | `'age' => 'between:18,65'`         |
| **Enum**     | `in:value1,value2`            | `'status' => 'in:active,inactive'` |
| **Date**     | `date`, `date_format`         | `'date' => 'date_format:Y-m-d'`    |
| **Array**    | `array`, `array.*`            | `'items' => 'array\|array.*.uuid'` |
| **Numeric**  | `numeric`, `integer`, `float` | `'quantity' => 'integer\|min:1'`   |

### Conditional Validation

```php
public function rules(): array
{
    return [
        'type' => 'required|in:personal,corporate',
        'company_name' => 'required_if:type,corporate|string', // Required jika type = corporate
        'phone' => 'nullable|regex:/^[0-9\-\+]+$/', // Optional, tapi format harus number
        'age' => 'exclude_if:is_minor,true|min:18', // Exclude jika is_minor true
    ];
}
```

### Custom Validation Rules

**Create custom rule:**

```bash
php artisan make:rule ValidateUUID
```

**File:** `app/Rules/ValidateUUID.php`

```php
<?php
namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateUUID implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $value)) {
            $fail("The {$attribute} must be a valid UUID.");
        }
    }
}
```

**Usage in Request:**

```php
use App\Rules\ValidateUUID;

public function rules(): array
{
    return [
        'user_id' => ['required', new ValidateUUID()],
    ];
}
```

### Error Response Examples

**Validation Error (422):**

```json
{
    "meta": {
        "code": 422,
        "status": "error",
        "message": "Validasi gagal"
    },
    "errors": {
        "user_id": ["User dengan ID tersebut tidak ditemukan"],
        "nik": ["NIK sudah terdaftar di sistem", "Format NIK tidak valid"],
        "join_date": ["Format tanggal tidak valid (YYYY-MM-DD)"]
    }
}
```

**Authorization Error (403):**

```json
{
    "meta": {
        "code": 403,
        "status": "error",
        "message": "Anda tidak memiliki akses ke resource ini"
    },
    "data": null
}
```

**Resource Not Found (404):**

```json
{
    "meta": {
        "code": 404,
        "status": "error",
        "message": "Data tidak ditemukan"
    },
    "data": null
}
```

**Unauthenticated (401):**

```json
{
    "meta": {
        "code": 401,
        "status": "error",
        "message": "Token tidak valid atau telah kadaluarsa"
    },
    "data": null
}
```

### Exception Handling in Controller

```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class BaseController extends Controller
{
    /**
     * Try-catch pattern for safe operations
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $this->authorize('create', Employee::class);

            $employee = Employee::create($request->validated());

            return $this->success(
                $employee->load(['user', 'division', 'position']),
                'Karyawan berhasil ditambahkan',
                201
            );
        } catch (ModelNotFoundException $e) {
            return $this->error('Data tidak ditemukan', 404);
        } catch (\Exception $e) {
            \Log::error('Employee creation failed:', ['error' => $e->getMessage()]);
            return $this->error('Gagal menambahkan karyawan: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Centralized success response
     */
    protected function success($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'meta' => [
                'code' => $code,
                'status' => 'success',
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }

    /**
     * Centralized error response
     */
    protected function error($message, $code = 400, $errors = null)
    {
        return response()->json([
            'meta' => [
                'code' => $code,
                'status' => 'error',
                'message' => $message,
            ],
            'errors' => $errors,
        ], $code);
    }
}
```

### Global Exception Handler

**File:** `app/Exceptions/Handler.php`

```php
<?php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Handle JSON requests
        if ($request->expectsJson()) {

            // Model not found
            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'meta' => [
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Data tidak ditemukan',
                    ],
                    'data' => null,
                ], 404);
            }

            // Unauthenticated
            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'meta' => [
                        'code' => 401,
                        'status' => 'error',
                        'message' => 'Token tidak valid atau telah kadaluarsa',
                    ],
                    'data' => null,
                ], 401);
            }

            // Unauthorized (Authorization failed)
            if ($exception instanceof AuthorizationException) {
                return response()->json([
                    'meta' => [
                        'code' => 403,
                        'status' => 'error',
                        'message' => 'Anda tidak memiliki akses ke resource ini',
                    ],
                    'data' => null,
                ], 403);
            }

            // Route not found
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'meta' => [
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Endpoint tidak ditemukan',
                    ],
                    'data' => null,
                ], 404);
            }

            // Generic error (production)
            if (app()->isProduction()) {
                return response()->json([
                    'meta' => [
                        'code' => 500,
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan pada server',
                    ],
                    'data' => null,
                ], 500);
            }
        }

        return parent::render($request, $exception);
    }
}
```

### Best Practices

✅ **DO:**

- Always validate input in Form Request class
- Use custom messages for better UX
- Log errors for debugging
- Return consistent error format
- Validate UUID format before querying DB
- Check permission in controller + policy
- Use `try-catch` for external API calls

❌ **DON'T:**

- Validate in controller method (use Form Request)
- Return bare error messages without structure
- Expose sensitive info in error response
- Skip authorization checks
- Use same error code for different scenarios
- Log passwords or tokens

---

## Naming Conventions

### Controllers

- `{Resource}Controller` (singular noun)
- Contoh: `EmployeeController`, `AttendanceController`, `LeaveRequestController`
- Methods: `index()`, `store()`, `show()`, `update()`, `destroy()`

### Models

- `{Resource}` (singular noun)
- Contoh: `Employee`, `Attendance`, `LeaveRequest`
- Location: `app/Models/`
- Relationship: `hasMany()`, `belongsTo()`, `hasOne()`

### Requests (Form Validation)

- `Store{Resource}Request` (untuk create & update)
- Contoh: `StoreEmployeeRequest`, `StoreAttendanceRequest`
- Location: `app/Http/Requests/`
- Method: `rules()` (return array), `authorize()` (return bool)

### Policies

- `{Resource}Policy` (singular noun)
- Contoh: `EmployeePolicy`, `AttendancePolicy`
- Location: `app/Policies/`
- Methods: `viewAny()`, `view()`, `create()`, `update()`, `delete()`

### Migrations

- `YYYY_MM_DD_HHMMSS_create_{table_name}_table.php`
- Contoh: `2026_02_08_041020_create_employees_table.php`
- Use `uuid('id')->primary()` for main table PK
- Use `foreignUuid('parent_id')` for foreign keys

### Routes

- Resource: lowercase plural, snake_case
- Contoh: `/api/employees`, `/api/leaveRequests`, `/api/jobVacancies`
- Route::apiResource('resource', Controller::class)

### Permissions

- Format: `{action}_{resource}`
- Action: `view`, `create`, `edit`, `delete`, `manage`, `approve`
- Resource: lowercase plural
- Contoh: `view_employees`, `create_employees`, `manage_divisions`, `approve_leave_requests`

### Database Columns

- snake_case for column names
- Contoh: `user_id`, `division_id`, `created_at`, `is_active`
- Boolean: `is_{noun}` (is_active, is_locked)
- Foreign Key: `{model}_id` atau `{model}_uuid` (tapi karena PK=uuid, cukup `{model}_id`)

---

## How to Add a New Resource

### Step-by-Step Checklist

#### 1. Create Model + Migration

```bash
php artisan make:model {Resource} -m
```

**Model** (`app/Models/{Resource}.php`):

```php
<?php
namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // optional

class MyResource extends Model
{
    use UsesUuid; // Add UUID trait
    // use SoftDeletes; // if needed

    protected $fillable = ['field1', 'field2'];

    // Relationships
    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }
}
```

**Migration** (`database/migrations/YYYY_MM_DD_HHMMSS_create_my_resources_table.php`):

```php
public function up(): void
{
    Schema::create('my_resources', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->foreignUuid('parent_id')->constrained()->onDelete('cascade');
        $table->string('field1');
        $table->text('field2')->nullable();
        $table->timestamps();
        // $table->softDeletes(); if needed
    });
}
```

#### 2. Create Form Request

**File:** `app/Http/Requests/Store{Resource}Request.php`

```php
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMyResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // or gate check
    }

    public function rules(): array
    {
        return [
            'parent_id' => 'required|uuid|exists:parent_table,id',
            'field1' => 'required|string|max:255',
            'field2' => 'nullable|string',
        ];
    }
}
```

**Key Validation Rules:**

- `required` / `nullable`
- `uuid` (custom rule or just check exists)
- `exists:{table},{column}`
- `string|email|numeric|date|boolean|integer|in:val1,val2`
- `unique:{table},{column}` (with ->ignore() for updates)
- `min|max|between`

#### 3. Create Policy

**File:** `app/Policies/{Resource}Policy.php`

```php
<?php
namespace App\Policies;

use App\Models\MyResource;
use App\Models\User;

class MyResourcePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_my_resources');
    }

    public function view(User $user, MyResource $resource): bool
    {
        return $user->hasPermissionTo('view_my_resources');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_my_resources');
    }

    public function update(User $user, MyResource $resource): bool
    {
        return $user->hasPermissionTo('manage_my_resources');
    }

    public function delete(User $user, MyResource $resource): bool
    {
        return $user->hasPermissionTo('manage_my_resources');
    }
}
```

#### 4. Create Controller

**File:** `app/Http/Controllers/{Resource}Controller.php`

```php
<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreMyResourceRequest;
use App\Models\MyResource;

class MyResourceController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', MyResource::class);
        $resources = MyResource::with(['relations'])->get();
        return $this->success($resources, 'Data berhasil diambil');
    }

    public function store(StoreMyResourceRequest $request)
    {
        $this->authorize('create', MyResource::class);
        $resource = MyResource::create($request->validated());
        return $this->success($resource->load(['relations']), 'Data berhasil ditambahkan', 201);
    }

    public function show(MyResource $resource)
    {
        $this->authorize('view', $resource);
        return $this->success($resource->load(['relations']), 'Detail ditemukan');
    }

    public function update(StoreMyResourceRequest $request, MyResource $resource)
    {
        $this->authorize('update', $resource);
        $resource->update($request->validated());
        $resource->refresh();
        return $this->success($resource->load(['relations']), 'Data berhasil diperbarui');
    }

    public function destroy(MyResource $resource)
    {
        $this->authorize('delete', $resource);
        $resource->delete();
        return $this->success(null, 'Data berhasil dihapus');
    }
}
```

#### 5. Register Policy in AuthServiceProvider

**File:** `app/Providers/AuthServiceProvider.php`

```php
protected $policies = [
    // ... existing
    MyResource::class => MyResourcePolicy::class,
];
```

#### 6. Add Route

**File:** `routes/api.php`

```php
Route::apiResource('myResources', MyResourceController::class);
```

**Route akan auto-generate:**

- `GET /api/myResources` → index
- `POST /api/myResources` → store
- `GET /api/myResources/{id}` → show
- `PUT /api/myResources/{id}` → update
- `DELETE /api/myResources/{id}` → destroy

#### 7. Create Permissions & Assign to Roles (Seeder)

**File:** `database/seeders/RolePermissionSeeder.php`

Add ke `$permissions` array:

```php
'view_my_resources',
'manage_my_resources',
```

Kemudian assign ke role sesuai kebutuhan:

```php
'view_my_resources',
'manage_my_resources',
```

#### 8. Run Migration & Seed

```bash
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder
```

---

## Available Resources & Endpoints

### 📍 Operational Resources

| Resource               | Endpoint               | Methods | Soft Delete |
| ---------------------- | ---------------------- | ------- | ----------- |
| **Division**           | `/divisions`           | CRUD    | Yes         |
| **Position**           | `/positions`           | CRUD    | Yes         |
| **Shift**              | `/shifts`              | CRUD    | Yes         |
| **AttendanceLocation** | `/attendanceLocations` | CRUD    | Yes         |
| **ContractTemplate**   | `/contractTemplates`   | CRUD    | No          |

### 👥 HR Management Resources

| Resource              | Endpoint              | Methods | Soft Delete | Notes                             |
| --------------------- | --------------------- | ------- | ----------- | --------------------------------- |
| **Employee**          | `/employees`          | CRUD    | Yes         | Relasi: user, division, position  |
| **Attendance**        | `/attendances`        | CRUD    | No          | Relasi: employee, shift, location |
| **LeaveRequest**      | `/leaveRequests`      | CRUD    | Yes         | Relasi: employee                  |
| **Payroll**           | `/payrolls`           | CRUD    | No          | Relasi: employee                  |
| **PerformanceReview** | `/performanceReviews` | CRUD    | No          | Relasi: employee, reviewer        |

### 🎯 Recruitment Resources

| Resource       | Endpoint        | Methods | Soft Delete | Notes                          |
| -------------- | --------------- | ------- | ----------- | ------------------------------ |
| **JobVacancy** | `/jobVacancies` | CRUD    | Yes         | Relasi: position               |
| **Applicant**  | `/applicants`   | CRUD    | No          | Relasi: jobVacancy, stage enum |

### 🔐 Authentication Endpoints

| Method | Endpoint  | Data               | Response               |
| ------ | --------- | ------------------ | ---------------------- |
| POST   | `/login`  | username, password | { access_token, user } |
| GET    | `/me`     | (token in header)  | { user }               |
| POST   | `/logout` | (token in header)  | null                   |

---

## Permission & Role Matrix

### Complete Permission List (44 total)

**Operational (10):**

- `manage_divisions`, `view_divisions`
- `manage_positions`, `view_positions`
- `manage_shifts`, `view_shifts`
- `manage_attendance_locations`, `view_attendance_locations`
- `manage_contract_templates`, `view_contract_templates`

**HR Management (18):**

- `view_employees`, `create_employees`, `edit_employees`, `delete_employees`
- `view_attendance_all`, `view_attendance_own`, `create_attendance`, `edit_attendance`, `delete_attendance`
- `view_leave_requests`, `create_leave_requests`, `edit_leave_requests`, `delete_leave_requests`, `approve_leave_requests`
- `view_payrolls`, `manage_payrolls`
- `view_performance_reviews`, `manage_performance_reviews`

**Recruitment (8):**

- `view_job_vacancies`, `manage_job_vacancies`
- `view_applicants`, `manage_applicants`

### Role Assignment

#### 🔴 Admin Role

**Permission:** ALL (44/44)

- Full access to semua resource

#### 🟠 HR Role

**Permission:** 33/44

```
view_divisions, manage_divisions
view_positions, manage_positions
view_shifts
view_attendance_locations, manage_attendance_locations
view_employees, create_employees, edit_employees, delete_employees
view_attendance_all, create_attendance, edit_attendance, delete_attendance
view_leave_requests, create_leave_requests, edit_leave_requests, approve_leave_requests
view_payrolls, manage_payrolls
view_performance_reviews, manage_performance_reviews
view_job_vacancies, manage_job_vacancies
view_applicants, manage_applicants
view_contract_templates, manage_contract_templates
```

#### 🟡 Employee Role

**Permission:** 9/44

```
view_divisions
view_positions
view_shifts
view_attendance_locations
view_attendance_own, create_attendance
view_leave_requests, create_leave_requests
view_job_vacancies
```

---

## Development Workflow

### Setup & Installation

```bash
# Clone & install
git clone <repo>
cd backend
composer install
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Start server
php artisan serve
```

### Creating a Feature

```bash
# 1. Create branch
git checkout -b feature/resource-name

# 2. Create model, migration, request, policy, controller
php artisan make:model ResourceName -m
# ... manual create request, policy, controller (see step-by-step above)

# 3. Update routes, policies, permissions

# 4. Run tests
php artisan test

# 5. Commit & push
git add .
git commit -m "feat: add resource-name CRUD"
git push origin feature/resource-name

# 6. Create PR
# ... review -> merge to main
```

### Common Artisan Commands

```bash
# Model, Controller, Request, Policy
php artisan make:model ResourceName -crmp    # Create all at once
php artisan make:controller Api/ResourceNameController --api
php artisan make:request StoreResourceNameRequest
php artisan make:policy ResourceNamePolicy --model=ResourceName

# Migration
php artisan make:migration create_resource_names_table
php artisan migrate
php artisan migrate:rollback

# Seed
php artisan db:seed
php artisan db:seed --class=RolePermissionSeeder

# Test
php artisan test
php artisan test --filter EmployeeControllerTest

# Clear cache
php artisan cache:clear
php artisan config:clear
```

### Environment Variables

**`.env` Development:**

```
APP_NAME=PrayerkidsHR
APP_ENV=local
APP_DEBUG=true
API_DEBUG=true

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

SANCTUM_STATEFUL_DOMAINS=localhost:3000
```

### Debugging Tips

- Enable query logging: `DB::enableQueryLog()` → `dd(DB::getQueryLog())`
- Check token: `php artisan tinker` → `auth()->user()`
- Permission cache: `php artisan cache:clear`
- Policy check: Add `logger()->debug()` in policy method

---

## Testing

### Sample Test Cases

```php
// tests/Feature/EmployeeControllerTest.php
class EmployeeControllerTest extends TestCase
{
    public function test_unauthorized_user_cannot_view_employees()
    {
        $response = $this->getJson('/api/employees');
        $response->assertUnauthorized();
    }

    public function test_authorized_user_can_view_employees()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->actingAs($user)->getJson('/api/employees');
        $response->assertOk();
    }
}
```

---

## Deployment Checklist

- [ ] `.env` production config set
- [ ] Database migration on staging/prod
- [ ] Role & permission seeded
- [ ] Cache cleared
- [ ] API tested in Postman/Insomnia
- [ ] Error logging setup (Sentry/Bugsnag optional)
- [ ] CORS configured if frontend on different domain
- [ ] Rate limiting enabled

---

## Quick Reference: Model Structure

```php
<?php
namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceName extends Model
{
    use UsesUuid;
    // use SoftDeletes;

    protected $fillable = ['field1', 'field2'];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
    ];

    // Relationships
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ParentModel::class);
    }
}
```

---

## Questions or Issues?

- **API 503 Error?** Check if tables migrated: `php artisan migrate:status`
- **Permission Denied?** Verify role assigned: `$user->getRoleNames()`
- **Token Expired?** Re-login, Sanctum TTL config in `config/sanctum.php`
- **Soft Delete Issue?** Use `withTrashed()`, `onlyTrashed()` in queries

---

**Document Version:** 1.0  
**Last Updated:** 9 April 2026
