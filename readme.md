# appvuephp

- Observações:

Depois do Git clone neste branch, então rode o comando: **npm install && npm run dev**

Atualize o composer: **composer update**

Crie um database e gere as tabelas com o comando: **php artisan migrate**

## Sobre o JWT

**Testes de login com o token:**

    { "access_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ", "token_type": "bearer", "expires_in": 3600 }

Postman: Get e Post: 127.0.0.1:8000/api/auth/login

#### Versões utilizadas:

**JWT**: 1.0.0-rc.4.1

**Laravel**: 5.8
