#  Mi API PHP con Docker y Kubernetes

Este proyecto consiste en una aplicación PHP estructurada para ser desplegada mediante contenedores y orquestada con Kubernetes.

## Estructura del Proyecto

* **`api-php/`**: Contiene el código fuente de la aplicación (lógica, rutas, conexión a BD).
* **`docker/`**: Archivos de configuración para construir las imágenes de contenedor (Dockerfile).
* **`k8s/`**: Manifiestos de Kubernetes para el despliegue (Deployments, Services, etc.).

---

##  Requisitos Previos

Antes de empezar, asegúrate de tener instalado:
* [Docker Desktop](https://www.docker.com/products/docker-desktop/)
* [Kubernetes](https://kubernetes.io/) (incluido en Docker Desktop o Minikube)

