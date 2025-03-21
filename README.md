# 📄 Reporte de Fallos en una Aplicación con Slim Framework y Dompdf

Este proyecto es una aplicación web desarrollada en **PHP** utilizando **Slim Framework 4** para generar reportes de fallos de una aplicación.  
Los reportes pueden visualizarse en **HTML** y descargarse en **PDF** con la biblioteca **Dompdf**.

📌 **Repositorio en GitHub**: [https://github.com/isacollazos18/reporte-php-slim.git]

---

## 🚀 Tecnologías utilizadas

| Tecnología         | Versión  |
|-------------------|---------|
| **PHP**          | 8.0.30  |
| **Docker**       | 28.0.1  |
| **Docker Compose** | 2.33.1 |
| **Composer**     | 2.5.8   |
| **Slim Framework** | 4.14.0  |
| **Dompdf**       | 3.1.0   |

---

## 📝 Requisitos previos

Para ejecutar este proyecto, necesitas tener **Docker** instalado en tu máquina.

- **Descargar Docker**: [Descargar Docker](https://www.docker.com/get-started).
- **Verificar la instalación de Docker**: Después de instalar Docker, ejecuta el siguiente comando para verificar que Docker esté funcionando correctamente:

  ```bash
  docker --version

## 1.Clonar el repositorio

git clone https://github.com/isacollazos18/reporte-php-slim.git
cd reporte-php-slim

## 2. Ejecutar el proyecto con Docker
docker-compose up --build

## 3.Acceder al reporte
Una vez que el contenedor esté corriendo, abre tu navegador y accede a las siguientes URLs:

- Reporte en HTML: http://localhost:8000/reporte
- Reporte en PDF: http://localhost:8000/reporte/pdf

