## English Version

This documentation covers all API endpoints for the Prayerkids HR system.

### Summary
- The Base URL follows the backend environment configuration.
- All responses use a standard envelope: `meta`, `data` (success), and `errors` (failure).
- Most endpoints require Sanctum Bearer token authentication.

### Quick Start
1. Log in via `POST /api/login`.
2. Get `access_token` from the response.
3. Send header: `Authorization: Bearer {token}`.
4. Use the remaining endpoints based on user role and permission.

### Response Format
```json
{
  "meta": {
    "status": "success",
    "code": 200,
    "message": "Message"
  },
  "data": {}
}
```

```json
{
  "meta": {
    "status": "error",
    "code": 422,
    "message": "Request validation failed."
  },
  "errors": {
    "field": ["Error message"]
  }
}
```
