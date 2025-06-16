# Trabajar con git

## 1. Instalar GIT

Ir al [siguiente enlace](https://github.com/git-for-windows/git/releases/download/v2.49.0.windows.1/Git-2.49.0-64-bit.exe) y ejecutar el archivo

## Crear par de claves privadas/publicas

Lanzar el siguiente comando en GitBash:

```
ssh-keygen -t ed25519 -C "drozdangelok@gmail.com"
```

y despues hacer:

```
cat [nombre_archivo].pub
```

y copiar el contenido del resultado en github.

## Comandos de GIT

1. git status
2. git add .
   1. git add ruta/archivo/1 ruta/archivo/2
3. git commit -m "Descriptcion del cambio"
4. git push
