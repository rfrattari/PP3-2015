##Instructivo, de trabajo con Git-Hub.

###Advertencias:

- El repositorio es compartido con todos los alumnos de la materia, por ende deben tener cuidado de no modificar nada que este fuera de su directorio personal, para seguridad de todos los cambios que hagan están siendo monitoreados.

- El fin de este proyecto es poner en practica sistemas de almacenamiento de código fuente, y su uso compartido, esto no implica que se pueda plagiar trabajos de otros compañeros, ante la mínima sospecha de plagio el alumno quedara libre.

- Las entregas fuera de termino no serán contempladas. Fecha limite en la que se clonara el proyecto al servidor de hosting es el día (16/06/2015).

- Sumado a la entrega se harán practico en clases evaluable que completara la nota del cuatrimestre.

###Instructivo:

####Requisitos
- Deberán tener las librerías de git instaladas para permitir ejecutar los comandos mencionados a continuación.

- Usuarios de linux:
```sh
$ sudo aptitude install git-all 
```
- Usuarios de Windows (sin soporte), hay varios complementos para instalar, algunos gráficos otros por consola (investigar).

####Repositorio local

- Ubicarse en donde vamos a almacenar la copia local, el ejemplo se hará sobre el la carpeta “home/santiago/spalacios/pp3-2015”

```sh
home/santiago/spalacios$ git clone https://github.com/spalacios/PP3-2015.git pp3-2015/
Cloning into 'pp3-2015'...
remote: Counting objects: 119, done.
remote: Compressing objects: 100% (51/51), done.
remote: Total 119 (delta 33), reused 108 (delta 27), pack-reused 0
Receiving objects: 100% (119/119), 40.21 KiB, done.
Resolving deltas: 100% (33/33), done.
```
-Esto ya les ha generado su repositorio local ya vinculado con github.

-Ubique su carpeta personal para empezar a trabajar sobre ella.

####Enviar cambios y recibir actualizaciones.

- Proceso de envío de cambios.

```sh
home/santiago/spalacios/pp3-2015$ git add .
home/santiago/spalacios/pp3-2015$ git commit -m "Mensaje identificativo de los cambios a enviar"
home/santiago/spalacios/pp3-2015$ git pull origin master
Username for 'https://github.com': [nombre_usuario]
Password for 'https://nombre_usuario@github.com':[contraseña_usuario]
home/santiago/spalacios/pp3-2015$ git push origin master
```
- Proceso de actualización del repositorio.

```sh
home/santiago/spalacios/pp3-2015$ git pull origin master
```
